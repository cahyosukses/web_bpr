<?php

class MOutbox extends DataMapper {

    public $table = "outbox";   

    function __construct() {
        parent::__construct();
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}

?>