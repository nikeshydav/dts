<?php

Class Logger extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata('is_logged_in')) {
            $data['message'] = '<p></p>';
            $this->load->view('index', $data);
        }
    }

    public function _example_output($output = null) {
        $this->load->view('queries.php', $output);
    }
    
    function _column_status($value, $row){
        $new_val ='No Action';
        switch ($value){
         case 1:
             $new_val ='No Action';
             break;
         
         case 2:
             $new_val ='Create File Alert';
             break;
         
         case 3:
             $new_val ='Create Calender Alert';
             break;
            
        }        
        return $new_val;
    }

    public function createtable($db) {
        $this->db = $this->load->database($db, true);
        $crud = new grocery_CRUD();

        $crud->set_table('alert_logger');
        $crud->set_primary_key('id');

        $crud->columns('alert', 'all_alg_data', 'all_alg_file_data', 'toa', 'alert_name', 'status','del');
        $crud->display_as('alert', 'Alert')
                ->display_as('all_alg_file_data', 'ALG File.')
                ->display_as('all_alg_data', 'ALG Ref.')
                ->display_as('toa', 'Date')
                ->display_as('alert_name', 'Name')
                ->display_as('del', 'Deletion date');

        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->callback_column('status', array($this, '_column_status'));

        $output = $crud->render();
        $this->db->close();

        $this->_example_output($output);
    }

    public function index() {
        $this->createtable('maintenance');
    }

    public function maintenance() {
        $this->createtable('maintenance');        
    }
    
    public function patents() {
        $this->createtable('patents');
    }

    public function prosecution() {
        $this->createtable('prosecution');
    }

    public function opposition() {
        $this->createtable('opposition');
    }

    public function enforcement() {
        $this->createtable('enforcement');
    }

    public function counseling() {
        $this->createtable('counseling');
    }

    public function domain() {
        $this->createtable('domain');
    }
    
    public function design() {
        $this->createtable('design');        
    }
    
    public function iplitigation() {
        $this->createtable('iplitigation');        
    }
    public function litigation() {
        $this->createtable('litigation');        
    }

}
