<?php

Class Queries extends CI_Controller {

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

    public function update_assign_users() {
        $data = array('alert_assign_to' => $_POST['user_id']);
        $this->db = $this->load->database('default', true);
        $this->db->where('id', $_POST['alert_id']);
        $this->db->update('query', $data);
        print 'done';
    }

    function Completed($primary_key, $row) {
        return 'queries/completed/' . $primary_key;
    }

    function _completed($primary_key, $row) {
        return 'save/' . $primary_key;
    }

    function _save($primary_key, $row) {
        return 'save/' . $primary_key;
    }

    function _column_edit_manager($value, $row) {
        $value = ($value == '') ? 'Click Here to Assign' : $value;
        return "<span id='" . $row->id . "'><p class='editable_query'>" . $value . "</p></span>";
    }
    
    function _column_edit_manager1($value, $row) {
        return  ($value == '') ? 'No one Assign' : $value;
    }
    

    function _column_dts($value, $row) {
        return "<span id='dts_" . $row->id . "'>" . $value . "</span>";
    }

    function _column_next_action($value, $row) {
        $text = 'Select Action';
        return "<p class='editable_action_query' rel='" . $row->id . "'>" . $text . "</p>";
    }

    function _column_alert_date_action($value, $row) {
        return "<input  id='date_" . $row->id . "' class='datepicker-input' style='display:none;'>";
    }

    function _column_next_alert_action($value, $row) {
        return "<input  id='alert_" . $row->id . "' style='display:none;'>";
    }

    function _modify_alg_ref($value, $row) {
        $value = ($value == "") ? "<p class='editable_dts' id='ref_" . $row->id . "' rel='" . $row->id . "'>......</p>" : $value;
        return $value;
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
                function unique_field_name($field_name) {
        return 's' . substr(md5($field_name), 0, 8); //This s is because is better for a string to begin with a letter and not with a number
    }

    function _full_text($value, $row) {
        return $value = wordwrap($row->subject, 50, "<br>", true);
    }

    public function index() {
        $crud = new grocery_CRUD();

        $crud->where('status', '0');
        $crud->where('date_creation<=', date('Y-m-d'));
        if ($this->session->userdata('role') > 1) {
            $where = "(alert_assign_to='" . $this->session->userdata('user_name') . "' or alert_assign_to='" . $this->session->userdata('id') . "' )";
            $crud->where($where);
        }

        $crud->set_table('query');
        $crud->columns('id', 'subject', 'dts', 'alg_ref', 'date_creation', 'alert_assign_to', 'next_action', 'next_alert', 'alert_date');
        $crud->unset_fields('status', 'dateofdeleteion');
        $crud->display_as('id', 'Sno.')
                ->display_as('subject', 'Subject Line')
                ->display_as('alg_ref', 'ALG Ref No.')
                ->display_as('date_creation', 'Date')
                ->display_as('dts', 'Practice Account')
                ->display_as('next_action', 'Next Action')
                ->display_as('next_alert', 'Next Alert')
                ->display_as('alert_date', 'Alert Date')
                ->display_as('alert_assign_to', 'Name');
        $crud->set_subject('Query');

        $crud->callback_column($this->unique_field_name('dts'), array($this, '_column_dts'));
        $crud->set_relation('dts', 'DTS', 'name');


        $crud->callback_column($this->unique_field_name('alert_assign_to'), array($this, '_column_edit_manager'));
        $crud->set_relation('alert_assign_to', 'membership', 'user_name');

        $crud->callback_column('subject', array($this, '_full_text'));
        $crud->callback_column('alg_ref', array($this, '_modify_alg_ref'));

        $crud->callback_column('next_action', array($this, '_column_next_action'));
        $crud->callback_column('next_alert', array($this, '_column_next_alert_action'));
        $crud->callback_column('alert_date', array($this, '_column_alert_date_action'));

        $crud->required_fields('dts');

        if ($this->session->userdata('role') != 1) {
            $crud->unset_add();
        }
        $crud->unset_edit();
        $crud->unset_delete();

        if ($this->session->userdata('role') == 1) {
            $crud->add_action('Save', '', '', 'save-icon query-save hidden', array($this, '_save'));
        } else {
            $crud->add_action('Completed', '', '', 'delete-icon  query-save  hidden', array($this, '_completed'));
        }

        $output = $crud->render();
        $this->_example_output($output);
    }

    public function save($alert_id) {
        $this->db = $this->load->database('default', true);
        $query = $this->db->query("SELECT alg_ref, dts FROM query where id=" . $alert_id);
        foreach ($query->result() as $row) {
            $alg_ref = $row->alg_ref;
            $dts = $row->dts;

            $data = array(
                'dateofdeleteion' => date('Y-m-d'),
                'status' => $_POST['alert_type']
            );
            $this->db->where('id', $alert_id);
            $this->db->update('query', $data);

            /* if (isset($_POST['alert'])) {
              $alert = $_POST['alert'];
              $toa = $_POST['date'];
              $data = array(
              'alg_ref' => $alg_ref,
              'subject' => $alert,
              'date_creation' => $toa,
              'dts' => $dts
              );
              $this->db->insert('query', $data);
              } */
        }
        $this->db->close();


        //Check wheather it is "create alert" or "no action"
        if (isset($_POST['alert'])) {
            //print_r($_POST);
            $db = $_POST['dts'];
            $this->db = $this->load->database('default', true);
            $query = $this->db->query("SELECT db FROM DTS where name='" . $db . "'");
            foreach ($query->result() as $row) {
                $db = $row->db;
            }
            $this->db->close();


            $this->db = $this->load->database($db, true);
            $fid = 0;
            $query = $this->db->query("SELECT alg_app_id FROM year_serialno where all_alg_data='" . $alg_ref . "'");
            foreach ($query->result() as $row) {
                $fid = $row->alg_app_id;
            }

            $alert = $_POST['alert'];
            $toa = $_POST['date'];
            $data = array(
                'fid' => $fid,
                'alert' => $alert,
                'toa' => $toa
            );
            //print_r($data);
            $this->db->insert('alert', $data);
            $this->db->close();
        }

        echo 'done';
    }

    function logger() {
        $crud = new grocery_CRUD();

        $crud->order_by('dateofdeleteion', 'DESC');
        $crud->where('status<>', '0');
        $crud->where('dateofdeleteion<=', date('Y-m-d'));
        if ($this->session->userdata('role') > 1) {
            $crud->where('alert_name', $this->session->userdata('user_name'));
        }
        $crud->set_table('query', 0, 50);
        $crud->columns('subject', 'dts', 'alg_ref', 'date_creation', 'alert_assign_to', 'status','dateofdeleteion');
        $crud->unset_fields('status', 'dateofdeleteion');
        $crud->display_as('subject', 'Subject Line')
                ->display_as('alg_ref', 'ALG Ref No.')
                ->display_as('dts', 'Practice Account')
                ->display_as('date_creation', 'Date creation')
                ->display_as('dateofdeleteion', 'Date Deletion')
                ->display_as('alert_assign_to', 'Name');
        $crud->set_subject('Query');

        $crud->set_relation('dts', 'DTS', 'name');
        $crud->callback_column('status', array($this, '_column_status'));
        $crud->callback_column($this->unique_field_name('alert_assign_to'), array($this, '_column_edit_manager1'));
        $crud->set_relation('alert_assign_to', 'membership', 'user_name');

        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();

        $output = $crud->render();
        $this->_example_output($output);
    }

    function assign_ref() {
        $ok = false;
        //print_r($_POST);
        $db = $_POST['db'];
        $this->db = $this->load->database('default', true);
        $query = $this->db->query("SELECT db FROM DTS where name='" . $db . "'");
        foreach ($query->result() as $row) {
            $db = $row->db;
        }
        $this->db->close();

        $alg_ref = $_POST['ref'];
        $this->db = $this->load->database($db, true);
        $query = $this->db->query("SELECT alg_app_id FROM year_serialno where all_alg_data='" . $alg_ref . "'");
        foreach ($query->result() as $row) {
            $ok = true;
        }
        $this->db->close();

        $this->db = $this->load->database('default', true);
        if ($ok) {
            $data = array('alg_ref' => $alg_ref);
            $this->db->where('id', $_POST['id']);
            $this->db->update('query', $data);
            echo 'done';
        } else {
            echo 'err';
        }
        $this->db->close();
    }

}
