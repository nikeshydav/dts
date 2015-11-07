<?php

Class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->library('table');
        $this->load->database();
    }

    public function index() {
        $this->load->view('dashboard');
    }

}
