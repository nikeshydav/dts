<?php

Class Newalert extends CI_Controller {

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

    function index() {
        $data= array('message'=>'');
        if ($this->input->post('alg_ref') != '') {
            $this->db = $this->load->database($this->input->post('dts'), true);

            $alg_ref =$this->input->post('alg_ref');
            $query = $this->db->query("SELECT alg_app_id FROM year_serialno where all_alg_data='" . $alg_ref . "'");
            foreach ($query->result() as $row) {
                $fid = $row->alg_app_id;

                $alert = $this->input->post('alert');
                $toa = $this->input->post('toa');
                $data = array(
                    'fid' => $fid,
                    'alert' => $alert,
                    'toa' => $toa
                );
                $this->db->insert('alert', $data);
            }
            $this->db->close();
            
            $data = array('message'=>'<p class="bg-success">Data Has been update successfully. </p>');
        }
        $this->load->view('newalert', $data);
    }

    
    function calendar() {        
        $data= array('message'=>'', 'calendar_alert'=>true);
        if ($this->input->post('alert') != '') {
            $this->db = $this->load->database($this->input->post('dts'), true);
            
                $fid = 0;
                $alert = $this->input->post('alert');
                $toa = $this->input->post('toa');
                $data = array(
                    'fid' => $fid,
                    'alert' => $alert,
                    'toa' => $toa
                );
                $this->db->insert('alert', $data);
            
            $this->db->close();
            
            $data = array('message'=>'<p class="bg-success">Data Has been update successfully. </p>');
        }
        $this->load->view('newalert', $data);
                
    }
}
