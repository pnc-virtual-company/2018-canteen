<?php
/**
 * This controller serves the user management pages and tools.
 * @copyright  Copyright (c) 2017-2018 Khai HOK
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
/**
 * This controller serves the user management pages and tools.
 * The difference with HR Controller is that operations are technical (CRUD, etc.).
 */
class Dishes extends CI_Controller {

    /**
     * Default constructor
     * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
     */
    public function __construct() {
        parent::__construct();
        log_message('debug', 'URI=' . $this->uri->uri_string());
        $this->session->set_userdata('last_page', $this->uri->uri_string());
        if($this->session->loggedIn === TRUE) {
           // Allowed methods
           if ($this->session->isAdmin || $this->session->isSuperAdmin) {
             //User management is reserved to admins and super admins
           }else {
             redirect(base_url());
           }
         } else {
           redirect('connection/login');
         }
        $this->load->model('users_model');
    }

    /**
     * Display the list of all users
     * @author Khai HOK <khai.hok@student.passerellesnumeriques.org>
     */
    public function index() {
        $this->load->helper('form');
        $data['users'] = $this->users_model->getUsersAndRoles();
        $data['title'] = 'List of users';
        $data['activeLink'] = 'users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer', $data);
    }

     /**
     * Display the list of all favorte dishes as pie chart
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function favouriteFood(){
         $this->load->model('foodFavorite');
        $data['dishes'] = $this->foodFavorite->dishesFavorite();
        $data['page'] = 'dishes/favouriteFoods';
        $this->load->model('getUserActive');
        $data['user'] = $this->getUserActive->getActive();
        $this->load->view('layout', $data);
    }

    /**
     * Form validation callback : prevent from login duplication
     * @param string $login Login
     * @return boolean TRUE if the field is valid, FALSE otherwise
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function checkLogin($login) {
        if (!$this->users_model->isLoginAvailable($login)) {
            $this->form_validation->set_message('checkLogin', lang('users_create_checkLogin'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Ajax endpoint : check login duplication
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function checkLoginByAjax() {
        $this->output->set_content_type('text/plain');
        if ($this->users_model->isLoginAvailable($this->input->post('login'))) {
            $this->output->set_output('true');
        } else {
            $this->output->set_output('false');
        }
    }
}
