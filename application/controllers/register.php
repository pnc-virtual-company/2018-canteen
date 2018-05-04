<?php 
	class register extends CI_Controller {

		public function formRegister(){
			$this->load->view('templates/header');
			$this->load->view('users/register');
			$this->load->view('templates/footer');
		}
		public function createUser(){
			  $config['upload_path']          = './assets/dish_uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                //Condition to know the if image insert or not
                if ( ! $this->upload->do_upload('dishImage'))
                {
                    echo $this->upload->display_errors();  // show error message
                }
                else
                {
                        $data['dishes'] = $this->Dishes_model->addUser(); //load model
                    if($data){
                            redirect('admin/food/listDish');
                        }
                
                }
			$data['addUsers']= $this->Users_model->addUser();
		}

	}
 ?>