<?php

class Hit extends DataMapper {

    public $db_params = 'gammu';
    public $table = "hits";

    function __construct() {
        parent::__construct();
    }

    function ip_counter() {
        // Grab client IP
        $ip = $_SERVER['REMOTE_ADDR'];

        // Check for previous visits
        $query = $this->db->get_where($this->table, array('ip' => $ip), 0, 1);
        $query = $query->row_array();

        if (count($query) < 1) {
            // Never visited - add
//            $this->db->insert('hits', array('ip' => $ip));
        }
    }

}

$hit = new Hit();
$hit->ip_counter();
?>