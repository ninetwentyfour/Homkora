<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view','add','addTime');
	}
	
	
	function index() {
		$projects = $this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
		return $projects;

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
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
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->delete($id)) {
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function addTime(){

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
				$this->Session->setFlash(__('Total time for the project has been updated.', true));
		}
		$this->redirect(array('action' => 'view',$this->data['Project']['id']));

	}
}
?>