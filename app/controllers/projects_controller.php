<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $components = array('Random');
	var $paginate = array('limit' => 10);
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view','add','edit','addTime');
	}
	
	
	function index() {
		//$this->layout = 'projects';
		//$projects = $this->Project->recursive = 0;
		$projects = $this->Project->find('all');
		foreach($projects as $project){
			//print_r($project);
			$data = array('id'=>$project['Project']['id'],'title'=>$project['Project']['title'],'user_id'=>$project['Project']['user_id'],'description'=>$project['Project']['description']);
			//print_r($data);
			$this->addTime2($data);
		}
		$projects = $this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
		return $projects;

	}

	function view($id = null) {
		$this->layout = 'projects';
		if (!$id) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
		$userProject = $this->Project->read(null, $id);
		if($userProject['Project']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
	}

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
		$userProject = $this->Project->read(null, $id);
		if($userProject['Project']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project', true));
			$this->redirect(array('action'=>'index'));
		}
		$userProject = $this->Project->read(null, $id);
		if($userProject['Project']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Project->delete($id)) {
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
		
		$timers = $this->Project->Timer->find('all', array('fields' => array('id', 'time'), 'conditions' => array('Timer.project_id = '.$this->data['id'])));
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
	
	function exportcsvProjects(){
	    $value = $this->Project->find('all', array('fields' => array('title','description','created','modified', 'total_time'),'conditions' => array('Project.user_id = '.$_SESSION['Auth']['User']['id'])));
	    $randStrg = $this->Random->randomString();
	    $file =  WWW_ROOT . '/csv_export/All_Projects_Export_'.$randStrg.'.csv';
	    for ($i = 0; $i < count($value); $i++) {
		$tempStr = $value[$i]['Project']['title'] . ',' . $value[$i]['Project']['description'] .',' . $value[$i]['Project']['total_time'] . ',' .$value[$i]['Project']['created'] .',' .$value[$i]['Project']['modified'] ;
		$finalStrArr[$i] = $tempStr;
		//counts through the array and creates an array for each order with comma serperated order information
	    }
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
	function exportcsvTimers($id = null){
	    $value = $this->Project->Timer->find('all', array('fields' => array('title','description','created','modified', 'time'),'conditions' => array('Timer.project_id = '.$id)));
	    $randStrg = $this->Random->randomString();
	    $file =  WWW_ROOT . '/csv_export/Timers_For_Project_'.$id.'_'.$randStrg.'.csv';
	    for ($i = 0; $i < count($value); $i++) {
		$tempStr = $value[$i]['Timer']['title'] . ',' . $value[$i]['Timer']['description'] .',' . $value[$i]['Timer']['time'] . ',' .$value[$i]['Timer']['created'] .',' .$value[$i]['Timer']['modified'] ;
		$finalStrArr[$i] = $tempStr;
		//counts through the array and creates an array for each order with comma serperated order information
	    }
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
	
	function addTime2($data){

		
		$timers = $this->Project->Timer->find('all', array('fields' => array('id', 'time'), 'conditions' => array('Timer.project_id = '.$data['id'])));
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

		$this->data['Project']['id'] = $data['id'];
		$this->data['Project']['user_id'] = $data['user_id'];
		$this->data['Project']['title'] = $data['title'];
		$this->data['Project']['description'] = $data['description'];
		$this->data['Project']['total_time'] = utf8_encode($final);

		
		if ($this->Project->save($this->data)) {
			//$this->Session->setFlash(__('Total time for the project has been updated.', true));

		}else{
			//$response['data'] = 'There was a problem.';
		}
		//$this->redirect(array('action' => 'view',$this->data['Project']['id']));
		

		

	}
}
?>