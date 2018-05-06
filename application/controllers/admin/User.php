<?php
/**
 * This controller serves the user management pages and tools.
 * @copyright  Copyright (c) 2018-2019 hok khai
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This controller serves the user management pages and tools.
 * The difference with HR Controller is that operations are technical (CRUD, etc.).
 */
class User extends CI_Controller {

	public function listUsers(){
    $data['users'] = $this->Users_model->getListUsers();
    $data['title'] = 'List of Users';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/admin_dasboard', $data);
    $this->load->view('admin/users/listUsers', $data);
    $this->load->view('templates/footer', $data);
	}
	public function updateUser(){
    $data['users'] = $this->Users_model->updateUsers();
    $data['title'] = 'List of Users';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/admin_dasboard', $data);
    $this->load->view('admin/users/UpdateUsers', $data);
    $this->load->view('templates/footer', $data);
	}
	public function createUser(){
   
    $data['title'] = 'Create Users';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/admin_dasboard', $data);
    $this->load->view('admin/users/view_add_user', $data);
    $this->load->view('templates/footer', $data);

        // upload image config
                $config['upload_path']          = './assets/images/user_uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                //Condition to know the if image insert or not
                if ( ! $this->upload->do_upload('userimage'))
                {
                    echo $this->upload->display_errors();  // show error message
                }
                else
                {   
                    $this->load->model('Users_model');
                    $data['users'] = $this->Users_model->insertUser(); //load model
                    if($data){
                            redirect('admin/user/listUsers');
                        }
                
                }
        }
	
	public function deleteUser(){

        $id = $this->uri->segment(4);
        $this->Users_model->deleteUsers($id);
        $this->listUsers();

		
	}

    ////

    ///

}