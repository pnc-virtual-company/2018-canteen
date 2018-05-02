
<?php 
Class createEvent extends CI_Controller{

	function getEventCalendar(){
		$data['title'] = 'Calender';
		$data['page'] = 'calender/createEventCalendar';
      
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
		$this->load->view('calender/createEventCalendar', $data);
        $this->load->view('templates/footer', $data);
	}	
}
 ?>