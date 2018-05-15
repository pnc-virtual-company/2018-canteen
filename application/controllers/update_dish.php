<?php 
/**
     * Display a for that allows updating a given user
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function edit($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Edit a user';
        $data['activeLink'] = 'dishes';

        $this->form_validation->set_rules('firstname', 'Firstname', 'required|strip_tags');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required|strip_tags');
        $this->form_validation->set_rules('login', 'Login', 'required|strip_tags');
        $this->form_validation->set_rules('email', 'Email', 'required|strip_tags');
        $this->form_validation->set_rules('role[]', 'Role', 'required');

        $data['users_item'] = $this->users_model->getUsers($id);
        if (empty($data['users_item'])) {
            redirect('notfound');
        }

        if ($this->form_validation->run() === FALSE) {
            $data['roles'] = $this->users_model->getRoles();
            $this->load->view('templates/header', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->users_model->updateUsers();
            $this->session->set_flashdata('msg', 'The user was successfully modified.');
            if (isset($_GET['source'])) {
                redirect($_GET['source']);
            } else {
                redirect('users');
            }
        }
    }

 ?>