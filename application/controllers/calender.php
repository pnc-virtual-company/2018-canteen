
<?php 
Class calender extends CI_Controller{
	function getCalender(){
		$data['title'] = 'Calender';
		$data['page'] = 'calender/calender';
		$this->load->view('layout', $data);
	}	
}
 ?>