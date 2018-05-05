<?php 
  // $data['title'] = 'List of users';
  $data['activeLink'] = 'users';
  $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
  $this->load->view('templates/header', $data);
  $this->load->view('menu/index', $data);
  // $this->load->view('templates/left_menu', $data);
  $this->load->view('templates/right_menu', $data);
  $this->load->view($page);
  $this->load->view('templates/footer', $data);
 ?>