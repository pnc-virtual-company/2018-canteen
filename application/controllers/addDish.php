
<?php 

Class addDish extends CI_Controller{

	function view_dish(){
		$data['title'] = 'dishes';
		$data['page'] = 'dishes/add_new_dish';
      
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
		$this->load->view('dishes/add_new_dish', $data);
        $this->load->view('templates/footer', $data);

	}	

	// insert student
	function insert_dish()
	{

		$config = array(
		'upload_path' => "<?php echo base_url();?>./assets./uploads",
		'allowed_types' => "gif|jpg|png|jpeg",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
		);

		$this->load->library('upload', $config);
		$this->load->helper(array('form', 'url'));	
		// $data = array('upload_data' => $this->upload->data());         
		// $imageName = $this->upload->data()['file_name'];
		
		$data['upload_data'] = $this->upload->data();
        $this->resize($data['upload_data']['upload_path'], $data['upload_data']['file_name']);
        $imageName = $data['upload_data']['file_name'];


		$dishDate = $this->input->post("dishdate");
		$dishDescription = $this->input->post("dishdescription");
		$dishName = $this->input->post("dishname");
        $this->load->model('addDishs');
		$is_insert_data = $this->addDishs->m_insert_dish(
        $dishName,$imageName,$dishDate,$dishDescription);

			if($is_insert_data)
			{
				$data['title'] = 'dishes';
				$data['page'] = 'dishes/add_new_dish';
		      
		        $this->load->view('templates/header', $data);
		        $this->load->view('menu/admin_dasboard', $data);
				$this->load->view('dishes/add_dihs_success', $data);
		        $this->load->view('templates/footer', $data);
			}else{
				$data['title'] = 'dishes';
				$data['page'] = 'dishes/add_new_dish';
		      
		        $this->load->view('templates/header', $data);
		        $this->load->view('menu/admin_dasboard', $data);
				$this->load->view('dishes/add_dihs_fail', $data);
		        $this->load->view('templates/footer', $data);
			}
        }
	}
?>

       