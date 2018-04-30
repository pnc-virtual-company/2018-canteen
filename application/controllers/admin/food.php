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
class food extends CI_Controller {

    /**
     * Display the list of all dry food
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function dryFood() {
        $this->load->helper('form');
        // $data['users'] = $this->users_model->getUsersAndRoles();
        $data['title'] = 'List of users';
        $data['activeLink'] = 'users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('admin/food/dryFood', $data);
        $this->load->view('templates/footer', $data);
    }

    /**
     * Display the list of all water food
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function waterFood() {
        $this->load->helper('form');
        // $data['users'] = $this->users_model->getUsersAndRoles();
        $data['title'] = 'List of users';
        $data['activeLink'] = 'users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('admin/food/waterFood', $data);
        $this->load->view('templates/footer', $data);
    }
}
