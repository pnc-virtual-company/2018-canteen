<?php 
Class userActive extends CI_Controller{
	function getActiveUser(){

		$data['userActives']=$this->getUserActive->getActive();

		$data['title'] = 'left_menu';
		$data['page'] = 'templates/left_menu';
	        $this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		    $this->load->view('templates/left_menu', $data);
	        $this->load->view('templates/footer', $data);
	
	}
}
?>