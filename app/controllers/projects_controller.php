<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $components = array('Random');
	var $paginate = array('limit' => 10);
	
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
		//contain projects for performance
		$projects = $this->Project->find('all', array('contain' => true));
		foreach($projects as $project){
			//update thr total time before the page loads.
			$data = array('id'=>$project['Project']['id'],'title'=>$project['Project']['title'],'user_id'=>$project['Project']['user_id'],'description'=>$project['Project']['description']);
			$this->addTime2($data);
		}
		//now grab all the updated proejct data for display
		$projects = $this->Project->find('all', array('fields' => array('title','description','total_time')));
		$this->set('projects', $this->paginate());
		return $projects;

	}
	/**
	* Reads Single project for display in view
	*
	* @return $projects array for view
	*/
	function view($id = null) {
		$this->layout = 'projects';
		if (!$id) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		$project = $this->Project->read(null, $id);
		$this->set('project', $project);
		//check that project belongs to user or is an admin
		if($project['Project']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	/**
	* Add new project
	*
	* @return $saved is for testing only - sets flash 'The project has been saved'
	*/
	function add() {
		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
				$saved = 'true';
				return $saved;
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}
	/**
	* Edit project
	*
	* @return sets flash 'The project has been saved'
	*/
	function edit($id = null) {
		$this->Acl->allow('user', 'edit');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
			//check project belongs to user or is admin
			if($this->data['Project']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
				$this->Session->setFlash(__('Invalid project', true));
				$this->redirect(array('action' => 'index'));
			}
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}
	/**
	* Delete project
	*
	* @return sets flash 'Project deleted'
	*/
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project', true));
			$this->redirect(array('action'=>'index'));
		}
		//check if project belongs to user or is admin
		$userProject = $this->Project->read(null, $id);
		if($userProject['Project']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Project->delete($id)) {
			foreach($userProject['Timer'] as $timer){
				$this->Project->Timer->delete($timer['id']);
			}
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function addTime(){
		$this->layout = 'ajax'; // Or $this->RequestHandler->ajaxLayout, Only use for HTML
		$this->autoLayout = false;
		$this->autoRender = false;
		$response = array('success' => false);
		
		$timers = $this->Project->Timer->find('all', array('fields' => array('id', 'time'), 'conditions' => array('Timer.project_id'=> $this->data['id'])));
		$things[0] = '';
		$things[1] = '';
		$things[2] = '';
		foreach($timers as $timer){
			if(!empty($timer)){
				$pieces = explode(":", $timer['Timer']['time']);
				$things[0] .= $pieces[0].',';
				$things[1] .= $pieces[1].',';
				$things[2] .= $pieces[2].',';
			}
		}
		$seconds = explode(",", $things[2]);
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
			$minutes = explode(",", $things[1]);
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
			$hours = explode(",", $things[0]);
			$hoursTotal = array_sum($hours);
		}

		$hoursTotal = str_pad($hoursTotal, 2, "0", STR_PAD_LEFT);
		$minutesTotal = str_pad($minutesTotal, 2, "0", STR_PAD_LEFT);
		$secondsTotal = str_pad($secondsTotal, 2, "0", STR_PAD_LEFT);
		$timeString = "$hoursTotal:$minutesTotal:$secondsTotal";

		$final = (string)$timeString;

		$this->data['Project']['id'] = $this->data['id'];
		$this->data['Project']['user_id'] = $this->data['user_id'];
		$this->data['Project']['title'] = $this->data['title'];
		$this->data['Project']['description'] = $this->data['description'];
		$this->data['Project']['total_time'] = utf8_encode($final);

		
		if ($this->Project->save($this->data)) {
			//$this->Session->setFlash(__('Total time for the project has been updated.', true));
			
			$response['success'] = true;
			$response['data'] = 'Total time for the project has been updated.';
			$response['time'] = $final;
			
		}else{
			$response['data'] = 'There was a problem.';
		}
		//$this->redirect(array('action' => 'view',$this->data['Project']['id']));
		
		$this->header('Content-Type: application/json');
		echo json_encode($response);
		return;
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
	    $value = $this->Project->find('all', array('fields' => array('title','description','created','modified', 'total_time'), array('contain' => true),'conditions' => array('Project.user_id = '.$_SESSION['Auth']['User']['id'])));
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
	    $value = $this->Project->Timer->find('all', array('fields' => array('title','description','created','modified', 'time'), array('contain' => true),'conditions' => array('Timer.project_id = '.$id)));
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
	    $file =  WWW_ROOT . '/csv_export/Homkora_'.$type.'_Export_'.$randStrg.'.csv';
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
		//get all the timers for a project
		$timers = $this->Project->Timer->find('all', array('fields' => array('id', 'time'), 'conditions' => array('Timer.project_id' => $data['id'])));
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
		$this->data['Project']['id'] = $data['id'];
		$this->data['Project']['user_id'] = $data['user_id'];
		$this->data['Project']['title'] = $data['title'];
		$this->data['Project']['description'] = $data['description'];
		$this->data['Project']['total_time'] = utf8_encode($final);

		if ($this->Project->save($this->data)) {
			//project is saved
		}else{
			//there is an error
		}
	}
}
?>