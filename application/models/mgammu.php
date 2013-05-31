<?php

class MGammu extends CI_Model {

    public $DB2;

    function __construct() {
        parent::__construct();
        $this->DB2 = $this->load->database('ussi', TRUE);
    }
    
    function get_record_nasabah($id){
        $this->DB2->db_select();
        $query = $this->DB2->get_where('nasabah', array('NASABAH_ID' => $id))->result();
        return $query;
    }
}
?>