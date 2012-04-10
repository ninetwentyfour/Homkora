<?php
App::import('Vendor', 'indextank_client');
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $components = array('Random');
	var $helpers = array('Text');
	var $paginate = array('limit' => 6);
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    //$this->Auth->allowedActions = array('*');
	}
	
	/**
	* Get projects for index view.
	* 
	* Pulls all projects - updates all projects total time - then fetches updated projects
	*
	* @return $projects array
	*/
	function index() {
		if ($this->RequestHandler->isXml()){
			$projects = $this->Project->find('all');
			$this->set('projects', $projects);
		}else{
			$this->layout = 'projects';
			$projects = $this->paginate('Project');
			foreach($projects as $project){
				//update thr total time before the page loads.
				$data = array('_id'=>$project['Project']['_id'],'title'=>$project['Project']['title'],'user_id'=>$project['Project']['user_id'],'description'=>$project['Project']['description']);
				$this->addTime2($data);
			}
			//now grab all the updated proejct data for display
			$projects = $this->Project->find('all', array('fields' => array('title','description','total_time')));
			$projects = $this->paginate('Project');
			$this->set('projects', $projects);
			return $projects;
		}

	}
	
	/**
	* Reads Single project for display in view
	*
	* @return $projects array for view
	*/
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid project', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		//get the project
		$params = array(
			'conditions' => array('_id' => $id)
		);
		$project = $this->Project->find('all',$params);
		$this->set('project', $project);
		//get the timers associated with the project
		$this->loadModel('Timer');
		$params = array(
			'conditions' => array('project_id' => $id)
		);
		$timers = $this->Timer->find('all',$params);
		$this->set('timers', $timers);
		//check that project belongs to user or is an admin
		if($project[0]['Project']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash('Invalid project', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
	}
	/**
	* Add new project
	*
	* @return $saved is for testing only - sets flash 'The project has been saved'
	*/
	function add() {
		if ($this->RequestHandler->isXml()){
			$this->data['Project']['user_id'] = $_SESSION['Auth']['User']['_id'];
			$this->data['Project']['title'] = $this->params['url']['title'];
			$this->data['Project']['description'] = $this->params['url']['description'];
			$this->Project->create();
			if($this->Project->save($this->data)){
				//send project to index tank
				//$indexData = array('id'=>$this->Project->id,'title'=>$this->data['Project']['title'],'description'=>$this->data['Project']['description']);
				$indexData = array('text'=>$this->data['Project']['title'],'title'=>$this->data['Project']['title'],'description'=>$this->data['Project']['description'],'user_id'=>$_SESSION['Auth']['User']['_id']);
				$id = $this->Project->id;
				$this->addIndextank("HomkoraProjects",$id,$indexData);
				$result = array('success'=>'1');
			}else{
				$result = array('success'=>'0');
			}
			$this->set(compact('result'));
			return $result;
		}
		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				//send project to index tank
				//$indexData = array('id'=>$this->Project->id,'title'=>$this->data['Project']['title'],'description'=>$this->data['Project']['description']);
				$indexData = array('text'=>$this->data['Project']['title'],'title'=>$this->data['Project']['title'],'description'=>$this->data['Project']['description'],'user_id'=>$_SESSION['Auth']['User']['_id']);
				$id = $this->Project->id;
				$this->addIndextank("HomkoraProjects",$id,$indexData);
				$this->Session->setFlash('The project has been saved', 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'index'));
				//return for testing
				$saved = 'true';
				return $saved;
			} else {
				$this->Session->setFlash('The project could not be saved. Please, try again.', 'default', array('class' => 'flash_bad'));
			}
		}
		$this->loadModel('User');
		$users = $this->User->find('list');
		$this->set(compact('users'));
	}
	/**
	* Edit project
	*
	* @return sets flash 'The project has been saved'
	*/
	function edit($id = null) {
		if ($this->RequestHandler->isXml()){
			$this->data['Project']['_id'] = $id;
			$this->data['Project']['user_id'] = $_SESSION['Auth']['User']['_id'];
			if(isset($this->params['url']['title'])){
				$this->data['Project']['title'] = $this->params['url']['title'];
			}
			if(isset($this->params['url']['description'])){
				$this->data['Project']['description'] = $this->params['url']['description'];
			}
			if($this->Project->save($this->data)){
				$result = array('success'=>'1');
				$this->set(compact('result'));
				return $result;
			}else{
				$result = array('success'=>'0');
				$this->set(compact('result'));
				return $result;
			}
		}
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid project', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				//send project to index tank
				$indexData = array('text'=>$this->data['Project']['title'],'title'=>$this->data['Project']['title'],'description'=>$this->data['Project']['description'],'user_id'=>$_SESSION['Auth']['User']['_id']);
				$id = $id;
				$this->addIndextank("HomkoraProjects",$id,$indexData);
				$this->Session->setFlash('The project has been saved', 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The project could not be saved. Please, try again.', 'default', array('class' => 'flash_bad'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
			//check project belongs to user or is admin
			if($this->data['Project']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
				$this->Session->setFlash('Invalid project', 'default', array('class' => 'flash_bad'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	/**
	* Delete project
	*
	* @return sets flash 'Project deleted'
	*/
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for project', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		//check if project belongs to user or is admin
		$userProject = $this->Project->read(null, $id);
		if($userProject['Project']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash('Invalid project', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Project->delete($id)) {
    		//get the timers for deletion
			$this->loadModel('Timer');
			$params = array(
				'conditions' => array('project_id' => $id)

			);
			$timers = $this->Timer->find('all',$params);
			foreach($timers as $timer){
     			//delete the timer
				$this->Timer->delete($timer['Timer']['_id']);
				$this->deleteIndextank("HomkoraTimers",$timer['Timer']['_id']);
			}
			//delete index tank document
			$this->deleteIndextank("HomkoraProjects",$id);
			
			$this->Session->setFlash('Project deleted', 'default', array('class' => 'flash_good'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Project was not deleted', 'default', array('class' => 'flash_bad'));
		$this->redirect(array('action' => 'index'));
	}
	/**
	* Export a CSV of Projects
	*
	* @param $value array All the projects that belong to the user
	*
	* @param $tempStr string Create a string of each CSV
	* 
	* @param $finalStrArr array Array of each $tempStr string
	* 
	* @return sends $finalStrArr to function exportcsv
	*/
	function exportcsvProjects(){
		$params = array(
			'conditions' => array('user_id' => (string)$_SESSION['Auth']['User']['_id'])
		);
	    $value = $this->Project->find('all', $params);
	    for ($i = 0; $i < count($value); $i++) {
			$tempStr = $value[$i]['Project']['title'] . ',' . $value[$i]['Project']['description'] .',' . $value[$i]['Project']['total_time'] . ',' .$value[$i]['Project']['created'] .',' .$value[$i]['Project']['modified'] ;
			$finalStrArr[$i] = $tempStr;
			//counts through the array and creates an array for each order with comma serperated order information
	    }
		$this->exportcsv($finalStrArr,'Projects');
	}
	/**
	* Export a CSV of Timers that belong to a Project
	*
	* @param $value array All the timers that belong to project and the user
	*
	* @param $tempStr string Create a string of each CSV
	* 
	* @param $finalStrArr array Array of each $tempStr string
	* 
	* @return sends $finalStrArr to function exportcsv
	*/
	function exportcsvTimers($id = null){
		$this->loadModel('Timer');
		$params = array(
			'conditions' => array('project_id' => $id)
		);
	    $value = $this->Timer->find('all',$params);
	    for ($i = 0; $i < count($value); $i++) {
		$tempStr = $value[$i]['Timer']['title'] . ',' . $value[$i]['Timer']['description'] .',' . $value[$i]['Timer']['time'] . ',' .$value[$i]['Timer']['created'] .',' .$value[$i]['Timer']['modified'] ;
		$finalStrArr[$i] = $tempStr;
		//counts through the array and creates an array for each order with comma serperated order information
	    }
	    $this->exportcsv($finalStrArr,'Timers');
	}
	/**
	* Export a CSV
	* 
	* @param $finalStrArr array Array of csv items that comes into this function
	* 
	* @param $file string Path to save tmp file
	* 
	* @param $fp creates the actual csv file
	* 
	* @return sends $file as download
	*/
	function exportcsv($finalStrArr,$type){
		$randStrg = $this->Random->randomString();
	    $file =  WWW_ROOT . 'csv_export/Homkora_'.$type.'_Export_'.$randStrg.'.csv';
		$fp = fopen($file, 'w') or die("can't open file");//create the csv file and tell it we are writing to it
	    foreach ($finalStrArr as $line) {
			fputcsv($fp, split(',', $line));//foreach array split csv and put in csv file
	    }
	    fclose($fp);
	    if (file_exists($file)) {//prompts for .csv download. After download deletes the file.
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			unlink($file);
			exit;
	    }
	}
	/**
	* Add the total time for a Project
	*
	* @param $data array The Project information array
	*
	* @param $timers array All timers for a project
	* 
	* @param $pieces array Time digits split into separate arrays Hour Min Sec
	* 
	* @param $things array Create a CSV of each time type Hour Min Sec
	* 
	* @return sends $finalStrArr to function exportcsv
	*/
	function addTime2($data){
		$this->loadModel('Timer');
		//get all the timers for a project
		$params = array(
			'fields' => array('_id', 'time'),
			'conditions' => array('project_id' => $data['_id'])
		);
		$timers = $this->Timer->find('all', $params);
		//define the $things array for later user. this prevents an error message
		$things[0] = '';
		$things[1] = '';
		$things[2] = '';
		foreach($timers as $timer){
			if(!empty($timer)){
				//explode the times into arrays for each type Hour Min Sec
				$pieces = explode(":", $timer['Timer']['time']);
				$things[0] .= $pieces[0].',';
				$things[1] .= $pieces[1].',';
				$things[2] .= $pieces[2].',';
			}
		}
		//explode csv and create array of results
		$seconds = explode(",", $things[2]);
		//add all of the seconds in the array together
		$secondsTotal = array_sum($seconds);
		if($secondsTotal>=60){
			//get the whole number to carry over ie 1, 2, 3, etc
			$carry = $secondsTotal / 60;
			list($whole, $decimal) = split('[/.-]', $carry);
			$wholeMin = $whole * 60;
			//subtract the extra seconds from the seconds total, ie subtract 60 if total is 64, so you leave 4 sec in sec total
			$secondsTotal = $secondsTotal - $wholeMin;
			//get the total minutes
			$minutes = explode(",", $things[1]);
			$minutesTotal = array_sum($minutes);
			//add however many minutes
			$minutesTotal = $minutesTotal + $whole;
		}else{
			//if seconds under 60 explode csv and create array of results
			$minutes = explode(",", $things[1]);
			//add all of the minutes in array together
			$minutesTotal = array_sum($minutes);
		}
		if($minutesTotal>=60){
			//get the whole number to carry over ie 1, 2, 3, etc
			$carry = $minutesTotal / 60;
			list($whole, $decimal) = split('[/.-]', $carry);
			//subtract the extra minutes from the minutes total, ie subtract 60 if total is 64, so you leave 4 min in min total
			$wholeHour = $whole * 60;
			$minutesTotal = $minutesTotal - $wholeHour;
			//get the total hours
			$hours = explode(",", $things[0]);
			$hoursTotal = array_sum($hours);
			//add however many hours
			$hoursTotal = $hoursTotal + $whole;
		}else{
			//if minutes under 60 explode csv and create array of results
			$hours = explode(",", $things[0]);
			//add all of the hours in array together
			$hoursTotal = array_sum($hours);
		}
		//pad all strings so they are in 00:00:00 format
		$hoursTotal = str_pad($hoursTotal, 2, "0", STR_PAD_LEFT);
		$minutesTotal = str_pad($minutesTotal, 2, "0", STR_PAD_LEFT);
		$secondsTotal = str_pad($secondsTotal, 2, "0", STR_PAD_LEFT);
		$timeString = "$hoursTotal:$minutesTotal:$secondsTotal";
		//double check is string
		$final = (string)$timeString;
		//orgainze the data of the project for saving
		$this->data['Project']['_id'] = $data['_id'];
		//$this->data['Project']['user_id'] = $data['user_id'];
		//$this->data['Project']['title'] = $data['title'];
		//$this->data['Project']['description'] = $data['description'];
		$this->data['Project']['total_time'] = utf8_encode($final);

		if ($this->Project->save($this->data)) {
			//project is saved
		}else{
			//there is an error
		}
	}
	
	function search(){
		print_r($_SESSION['Auth']['User']['_id']);
		$query = $this->data['Project']['search'];
		$res = $this->searchIndextank("HomkoraProjects",$query);
		$i = 0;
		foreach($res->results as $doc_id){
			$params = array(
				'conditions' => array('_id' => $doc_id->docid,'user_id'=>$_SESSION['Auth']['User']['_id'])
			);
			$projects[$i++] = $this->Project->find('first',$params);
		}
		$this->set('projects', $projects);
	}
}
?>
