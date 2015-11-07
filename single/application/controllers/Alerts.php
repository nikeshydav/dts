<?php

Class Alerts extends CI_Controller {

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

    function _save_alert($primary_key, $row) {
        return 'save_alert/' . $primary_key;
    }

    function _column_bonus_right_align($value, $row) {
        $value = ($value == '') ? 'Click Here to Assign' : $value;
        return "<span id='" . $row->id . "'><p class='editable'>" . $value . "</p></span>";
    }

    function _column_next_action($value, $row) {
        $text = 'Select Action';
        return "<p class='editable_action' rel='" . $row->id . "'>" . $text . "</p>";
    }

    function _column_alert_date_action($value, $row) {
        return "<input  id='date_" . $row->id . "' class='datepicker-input' style='display:none;'>";
    }

    function _column_next_alert_action($value, $row) {
        return "<input  id='alert_" . $row->id . "' style='display:none;'>";
    }

    public function get_user_list() {
        $query = $this->db->query("SELECT id,user_name FROM membership");
        $result = $query->result();
        foreach ($result as $row) {
            $user[$row->id] = $row->user_name;
        }
        print json_encode($user);
    }

    public function update_assign_users() {
        $data = array(
            'alert_name' => $_POST['user_id']
        );
        $this->db = $this->load->database($_POST['db_group'], true);
        $this->db->where('id', $_POST['alert_id']);
        $this->db->update('alert', $data);
        print 'done';
    }

    public function save_alert($alert_id) {
        //print_r($_POST);
        $db = $_POST['db'];
        $this->db = $this->load->database($db, true);
        //$sqlAlert = "INSERT INTO alert (fid,alert,alert_name,toa) VALUES ('$id', '$alert','" . $_POST['alert_name'][$i] . "','" . $_POST['alertdate'][$i] . "');";
        $query = $this->db->query("SELECT fid FROM alert where id=" . $alert_id);
        foreach ($query->result() as $row) {
            $fid = $row->fid;

            $data = array(
                'del' => date('Y-m-d'),
                'status' => $_POST['alert_type']
            );
            $this->db->where('id', $alert_id);
            $this->db->update('alert', $data);

            if (isset($_POST['alert']) && $_POST['alert']!='') {
                $alert = $_POST['alert'];
                $toa = $_POST['date'];
                $data = array(
                    'fid' => $fid,
                    'alert' => $alert,
                    'toa' => $toa
                );
                $this->db->insert('alert', $data);
            }
        }
        echo 'done';
    }

    function _full_text($value, $row) {
        return $value = wordwrap($row->alert, 50, "<br>", true);
    }

    function _full_text1($value, $row) {
        return $value = wordwrap($row->all_alg_file_data, 50, "<br>", true);
    }

    public function createtable($db) {
        $this->db = $this->load->database($db, true);
        $crud = new grocery_CRUD();

        $crud->where('toa<=', date('Y-m-d'));
        if ($this->session->userdata('role') != 1) {
            $crud->where('alert_name', $this->session->userdata('user_name'));
        }
        $crud->set_table('alert_view');
        $crud->set_primary_key('id');
        if ($this->session->userdata('role') != 1) {
            $crud->columns('alert', 'all_alg_data', 'all_alg_file_data', 'toa', 'next_action', 'next_alert', 'alert_date');
        } else {
            $crud->columns('alert', 'all_alg_data', 'all_alg_file_data', 'toa', 'alert_name', 'next_action', 'next_alert', 'alert_date');
        }

        $crud->display_as('alert', 'Alert')
                ->display_as('all_alg_file_data', 'ALG File.')
                ->display_as('all_alg_data', 'ALG Ref.')
                ->display_as('toa', 'Date')
                ->display_as('alert_name', 'Name');

        $crud->callback_column('alert', array($this, '_full_text'));
        $crud->callback_column('all_alg_file_data', array($this, '_full_text1'));

        $crud->callback_column('alert_name', array($this, '_column_bonus_right_align'));
        $crud->callback_column('next_action', array($this, '_column_next_action'));
        $crud->callback_column('next_alert', array($this, '_column_next_alert_action'));
        $crud->callback_column('alert_date', array($this, '_column_alert_date_action'));

        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();

        if ($this->session->userdata('role') == 1) {
            $crud->add_action('Save', '', '', 'save-icon save-alert hidden', array($this, '_save_alert'));
        } else {
            $crud->add_action('Completed', '', '', 'success-icon save-alert  hidden', array($this, '_save_alert'));
        }

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
