
<?php 
Class calender extends CI_Controller{
	function getCalender(){
		$data['title'] = 'Calender';
		$data['page'] = 'calender/calender';
      
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
		$this->load->view('admin/calender/calender', $data);
        $this->load->view('templates/footer', $data);
	}	
}
 ?>