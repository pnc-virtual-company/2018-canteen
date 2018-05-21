<?php 
	class c_users extends CI_Controller {

		public function addUsers(){
      
         $config['upload_path']          = './assets/images/user_uploads';
         $config['allowed_types']        = 'gif|jpg|png';
         $config['max_size']             = 10000;
         $config['max_width']            = 1024;
         $config['max_height']           = 768;
         $this->load->library('upload', $config);
         //Condition to know the if image insert or not
         if ( ! $this->upload->do_upload('image'))
         {
          $data['error_msg'] = $this->upload->display_errors();    
         }
         else
         {
            $data['add_users'] = $this->Users_model->addUsers(); //load model
            if($data){
              $this->session->set_flashdata('msg', 'Your account has been created.');
               redirect('c_users/addUsers');
            }
                
         }
          $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
          $this->load->view('templates/header');
          $this->load->view('users/register',$data);
          $this->load->view('templates/footer');
		}
	}
 ?>