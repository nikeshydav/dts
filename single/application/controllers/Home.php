<?php

class home extends CI_Controller {

    function index() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->library('table');
        //$this->load->database();
        $this->load->view('index');
    }

}
