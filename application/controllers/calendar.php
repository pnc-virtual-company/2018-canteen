
<?php 

/**
 * CRUD that related to Calendar and sending email in the database.
 * @return int number of affected rows
 * @author sun MEAS <sun.meas@gmail.com>
 */
Class calendar extends CI_Controller{
	// stuff calendar
	function getJoinDinnerEvent(){
		$this->load->model('getUserActive');
        		$data['user'] = $this->getUserActive->getActive();
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/userJoinCalendar';
		$this->load->view('layout', $data);
	}

	// admin calendar
	function getAdminCalendar(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}	
	function getDinnerEvent(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Calendar/dinnerEvent', $data);
	        	$this->load->view('templates/footer', $data);
	}

	/*Get all staff lunch Events */

	Public function getLunchEvents()
	{
		$result=$this->Calendar_model->getLunchEvents();
		echo json_encode($result);
	}
	/*Add new event */
	Public function addLunchEvent()
	{
		$result=$this->Calendar_model->addLunchEvent();
		echo $result;

		// Sending email to invitation to staff
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'pnc.temporary.vc2018@passerellesnumeriques.org',
			'smtp_pass' => 'Pnc!Wep2018?'
		);
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org','Admin & Finance');
		$this->email->to('sun.meas@student.passerellesnumeriques.org');
		$this->email->subject('This is an email testing');
		$this->email->message('It is working . Greate!');
		
	}
	/*Update Event */
	Public function updateLunchEvent()
	{
		$result=$this->Calendar_model->updateLunchEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteLunchEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{	
		$result=$this->Calendar_model->dragUpdateLunchEvent();
		echo $result;
	}

	/*Get all  dinner Events */

	Public function getDinnerEvents()
	{
   		 $Dinner_ID = $this->uri->segment(4); 
		$result=$this->Calendar_model->getDinnerEvents($Dinner_ID);
		echo json_encode($result);
	}
	/*Add new event */
	Public function addDinnerEvent()
	{
		$result=$this->Calendar_model->addDinnerEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateDinnerEvent()
	{
		$result=$this->Calendar_model->updateDinnerEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteDinnerEvent()
	{
		$result=$this->Calendar_model->deleteDinnerEvent();
		echo $result;
	}
	Public function dragUpdateDinnerEvent()
	{	
		$result=$this->Calendar_model->dragUpdateLunchEvent();
		echo $result;
	}

	/*Add new event user for join event */
	Public function userJoinEvent()
	{
		$result=$this->Calendar_model->userJoinEvent();
		echo $result;
	}
}
 ?>