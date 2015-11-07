<?php

class Queries_model extends CI_Model {
    /*
     * Get List of users
     * @return string
     */

    function allqueries() {
        $tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1" id="datatable"  >');

        $this->table->set_template($tmpl);
        $this->table->set_heading('S. No.', 'Subject Line', 'ALG Ref No.', 'Date of Creation', 'DTS', 'Next Action', 'Next Alert', 'Alert Date', 'Name');//, 'Deletion'
        $query = $this->db->query("SELECT * FROM `query`");
        $result = $query->result();
        $i = 1;
        if ($query->num_rows() > 0) {
            foreach ($result as $row) {
                $this->table->add_row($i, $row->subject, $row->alg_ref, $row->date_creation, $row->dts, $row->next_action, $row->next_alert, $row->alert_date, $row->manager); //Add each result row into table, $edit
                $i++;
            }
        } else {
            $this->table->add_row('No results found', '', '', '');
        }
        
        $user_list_table = $this->table->generate();
        return array('table' => $user_list_table);
    }

}

?>

