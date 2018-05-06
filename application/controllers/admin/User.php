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
    // $data['users'] = $this->Users_model->createUsers();
    $data['title'] = 'Create Users';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/admin_dasboard', $data);
    // $this->load->view('admin/users/createUsers', $data);
    $this->load->view('templates/footer', $data);
	}
	public function deleteUser(){
		$this->Users_model->deleteUsers();
	}

}