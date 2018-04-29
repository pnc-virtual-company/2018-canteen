
<?php 
Class calender extends CI_Controller{
	function get_calender(){
		$data['title'] = 'Calender';
		$data['page'] = 'calender/calender';
		$this->load->view('layout', $data);
	}	
}
 ?>