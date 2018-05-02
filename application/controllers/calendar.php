
<?php 
Class calendar extends CI_Controller{
	function getCalendar(){
		$data['title'] = 'Calendar';
		$data['page'] = 'calender/calender';
		$this->load->view('layout', $data);
	}

}
 ?>