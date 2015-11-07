<?php

class Users_model extends CI_Model {

    /**
     * Validate the login's data with the database
     * @param string $user_name
     * @param string $password
     * @return void
     */
    function validate($user_name, $password) {
        $this->db->where('user_name', $user_name);
        $this->db->where('pass_word', $password);
        $this->db->select('COUNT(*)');
        $query = $this->db->get('membership');
        //print_r($password);die();
        $result = $query->row_array();
        $count = $result['COUNT(*)'];
        if ($count == 1) {
            return true;
        }
    }

    /**
     * Validate the login's data with the database
     * @param string $user_name
     * @param string $password
     * @return void
     */
    function getDetails($user_name) {
        $this->db->where('user_name', $user_name);
        $query = $this->db->get('membership');
        foreach ($query->result() as $row) {
            $user['id'] = $row->id;
            $user['role'] = $row->role;
            $user['email_addres'] = $row->email_addres;
            $user['first_name'] = $row->first_name;
            $user['last_name'] = $row->last_name;
            $user['user_name'] = $user_name;
            $user['is_logged_in'] = true;
            $user['common_campaign'] = $row->common_campaign;
            $user['campaign'] = $row->campaign;
        }
        return $user;
    }

    /**
     * Serialize the session data stored in the database,
     * store it in a new array and return it to the controller
     * @return array
     */
    function get_db_session_data() {
        $query = $this->db->select('user_data')->get('ci_sessions');
        $user = array(); /* array to store the user data we fetch */
        foreach ($query->result() as $row) {
            $udata = unserialize($row->user_data);
            /* put data in array using username as key */
            $user['user_name'] = $udata['user_name'];
            $user['is_logged_in'] = $udata['is_logged_in'];
        }
        return $user;
    }

    /**
     * Store the new user's data into the database
     * @return boolean - check the insert
     */
    function create_member() {

        $this->db->where('user_name', $this->input->post('username'));
        $query = $this->db->get('membership');

        if ($query->num_rows > 0) {
            echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
            echo "Username already taken";
            echo '</strong></div>';
        } else {
            //$user_password = $this->generatePassword();
            $user_password = $this->input->post('password');

            $new_member_insert_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_addres' => 'no@email.id',//$this->input->post('email_address'),
                'user_name' => $this->input->post('username'),
                'pass_word' => md5($user_password),
                'role' => $this->input->post('role')
            );
            $insert = $this->db->insert('membership', $new_member_insert_data);
            
            /*
             * Send mail you new user.
             
            $this->load->library('email');

            $this->email->from('ashwani.balayan@algindia.com', 'DTS Admin');
            $this->email->to($this->input->post('email_address'));
            $this->email->cc('ashwani.balayan@algindia.com');
            $this->email->bcc('me@nikeshyadav.com');

            $this->email->subject('User Registration : DTS Alert ');
            $body ='Hi '.$this->input->post('first_name').' '.$this->input->post('last_name') .",\n\n";
            $body .="Your account has been created on http://dts.algindia.in/dts/single/ \n\n";
            $body .="Username:".$this->input->post('username')."\n";
            $body .="Password:".$user_password ;
            $body .="\n\n\nThanks\nDTS admin.";
            $this->email->message($body);

            $this->email->send();
             */
            
            return $insert;
        }
    }

    /*
     * Get List of users
     * @return string
     */

    function list_users() {
        $tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1" id="datatable">');

        $this->table->set_template($tmpl);
        $this->table->set_heading('S. No.', 'First Name', 'Last Name',  'Username');
        $query = $this->db->query("SELECT `id`, `first_name`, `last_name`, `email_addres`, `user_name` FROM `membership`");
        $result = $query->result();
        $i = 1;
        if ($query->num_rows() > 0) {
            foreach ($result as $row) {
                $edit = anchor('user/edit/' . $row->id, 'Edit');
                $this->table->add_row($i, $row->first_name, $row->last_name, $row->user_name); //Add each result row into table
                $i++;
            }
        } else {
            $this->table->add_row('No results found', '', '', '');
        }
        $user_list_table = $this->table->generate();
        return array('output' => $user_list_table);
    }

    /*
     * Change Password
     */

    function change_password() {
        $this->db->where('user_name', $this->session->userdata('user_name'));
        $data = array(
            'pass_word' => md5($this->input->post('password'))
        );
        $insert = $this->db->update('membership', $data);
        redirect(base_url() . index_page() . "/logout");
        return $insert;
    }

    /*
     * Generate Password
     */

    function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

}
