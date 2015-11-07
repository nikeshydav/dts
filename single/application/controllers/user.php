<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->library('table');
        $this->load->database();
    }

    /**
     * Check if the user is logged in, if he's not,
     * send him to the login page
     * @return void
     */
    function index() {
        if ($this->session->userdata('is_logged_in')) {
            redirect('dashboard');
        } else {
            $data['message'] = '<p></p>';
            $this->load->view('login', $data);
        }
    }

    /**
     * encript the password
     * @return mixed
     */
    function __encrip_password($password) {
        return md5($password);
    }

    /**
     * check the username and the password with the database
     * @return void
     */
    function validate_credentials() {
        $this->load->model('Users_model');

        $user_name = $this->input->post('user_name');
        $password = $this->__encrip_password($this->input->post('password'));

        $is_valid = $this->Users_model->validate($user_name, $password);

        if ($is_valid) {
            $data = $this->Users_model->getDetails($user_name);
            $this->session->set_userdata($data);
            redirect('#/dashboard');
        } else { // incorrect username or password
            $data['message'] = '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Enter a valid email address and Password!
</div>';
            $this->load->view('login', $data);
        }
    }

    /**
     * The method just loads the signup view
     * @return void
     */
    function signup() {
        $this->load->view('header');
        $this->load->view('signup_form');
        $this->load->view('footer');
    }

    function edit($id) {
        $this->load->view('header');
        $this->load->view('signup_form');
        $this->load->view('footer');
    }

    /**
     * This method  will list all User
     */
    function user_list() {
        $this->load->view('header');
        $this->load->model('Users_model');
        $data = $this->Users_model->list_users();
        $this->load->view('list', $data);
        $this->load->view('footer');
    }

    /**
     * Create new user and store it in the database
     * @return void
     */
    function create_member() {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('signup_form');
            $this->load->view('footer');
        } else {
            $this->load->model('Users_model');

            if ($query = $this->Users_model->create_member()) {
                $this->load->view('header');
                $data = array('message' => 'New account has now been created.');
                $this->load->view('successful', $data);
                $this->load->view('footer');
            } else {
                $this->load->view('header');
                $this->load->view('signup_form');
                $this->load->view('footer');
            }
        }
    }

    /**
     * Destroy the session, and logout the user.
     * @return void
     */
    function logout() {
        $this->session->sess_destroy();
        redirect('');
    }

    /**
     * Change Password
     */
    function change_password() {
        $data = array('error' => '');
        $this->load->view('header', $data);

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|alpha_numeric');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('change_password');
        } else {
            $this->load->model('Users_model');

            if ($query = $this->Users_model->change_password()) {
                $data = array('message' => 'Password has been updated.');
                $this->load->view('successful', $data);
            } else {
                $this->load->view('signup_form');
            }
        }
        $this->load->view('footer');
    }

}
