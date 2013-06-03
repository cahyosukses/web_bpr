<?php

class Gampbk extends DataMapper {
    public $db_params = 'gammu';
    public $table = "pbk";

    function __construct() {
        parent::__construct();
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}

?>