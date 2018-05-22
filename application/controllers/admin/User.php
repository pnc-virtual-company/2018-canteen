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

       public function __construct() {
        parent::__construct();
        log_message('debug', 'URI=' . $this->uri->uri_string());
        $this->session->set_userdata('last_page', $this->uri->uri_string());
        if($this->session->loggedIn === TRUE) {
           // Allowed methods
           if ($this->session->isAdmin || $this->session->isSuperAdmin) {
             //User management is reserved to admins and super admins
           } else {
             redirect('errors/privileges');
           }
         } else {
           redirect('connection/login');
         }
        $this->load->model('users_model');
    }

    public function index(){
        $this->load->model('Users_model');
        $data['users'] = $this->Users_model->getListUsers();
        $data['title'] = 'List of Users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('admin/users/listUsers', $data);
        $this->load->view('templates/footer', $data);

    }

    protected function getRandomBytes($length) {
        if(function_exists('openssl_random_pseudo_bytes')) {
          $rnd = openssl_random_pseudo_bytes($length, $strong);
          if ($strong === TRUE)
            return $rnd;
        }
        $sha =''; $rnd ='';
        if (file_exists('/dev/urandom')) {
          $fp = fopen('/dev/urandom', 'rb');
          if ($fp) {
              if (function_exists('stream_set_read_buffer')) {
                  stream_set_read_buffer($fp, 0);
              }
              $sha = fread($fp, $length);
              fclose($fp);
          }
        }
        for ($i=0; $i<$length; $i++) {
          $sha  = hash('sha256',$sha.mt_rand());
          $char = mt_rand(0,62);
          $rnd .= chr(hexdec($sha[$char].$sha[$char+1]));
        }
        return $rnd;
    }
    
    public function listUsers(){
    $this->load->model('Users_model');
    $data['users'] = $this->Users_model->getListUsers();
    $data['title'] = 'List of Users';
    $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
    $this->load->view('templates/header', $data);
    $this->load->view('menu/admin_dasboard', $data);
    $this->load->view('admin/users/listUsers', $data);
    $this->load->view('templates/footer', $data);
    }
    public function updateUser(){
        $id = $this->uri->segment(4);
        $data['getUsersUpdate'] = $this->Users_model->getUsersUpdate($id);
        // var_dump($data['getUsersUpdate']);die();
        $data['roles'] = $this->users_model->selectRole();
        $data['users'] = $this->Users_model->getListUsers();
        $data['title'] = 'Update Users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('templates/footer', $data);
          // upload User image configuaration
                $config['upload_path']          = './assets/images/user_uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                //Condition to know the if image insert or not
                if ( !$this->upload->do_upload('image'))
                {
                    $data['error_msg'] = $this->upload->display_errors();  // show error message

                }
                else
                {
                  $oldPassword = "";
                  $password = "";
                  $newPassword = $this->input->post('password');
                  foreach ($data['getUsersUpdate'] as $user) {
                        $oldPassword = $user->password;    
                     if ($newPassword == "") {
                        $password = $oldPassword;
                        $data['users'] = $this->Users_model->updateUsers($password); //load model
                        if($data){
                          $this->session->set_flashdata('msg', 'The user has been updated.');
                            redirect('admin/User/listUsers');
                        }
                     }else{
                        $password = $newPassword;
                        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
                        $hash = crypt($password, $salt);
                        $data['users'] = $this->Users_model->updateUsers($hash); //load model
                        if($data){
                          $this->session->set_flashdata('msg', 'The user has been updated.');
                            redirect('admin/User/listUsers');
                        }
                     }
                  }
                }
                        $this->load->view('admin/users/UpdateUsers', $data);

	}
	public function createUser(){
        $data['title'] = 'Create Users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
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
                    $data['error_msg'] = $this->upload->display_errors();   // show error message
                }
                else
                {   
                    $this->load->model('Users_model');
                    $data['users'] = $this->Users_model->insertUser(); //load model
                    if($data){
                          $this->session->set_flashdata('msg', 'User has been created.');
                            redirect('admin/user/listUsers');
                        }
                }
                $data['roles'] = $this->users_model->selectRole();
                $this->load->view('admin/users/view_add_user', $data);
        }
	
	public function deleteUser(){

        $id = $this->uri->segment(4);
        $this->Users_model->deleteUsers($id);
         $this->session->set_flashdata('msg', 'User has been deleted.');
        $this->listUsers();

		
	}
}