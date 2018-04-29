
<?php 
Class even extends CI_controller{
	public function getRegisterList(){
		 $data['title'] = 'Registered List';
		$data['page'] = 'even/staff_register_list'; //load content
		$this->load->view('layout', $data);
	}
}
 ?>