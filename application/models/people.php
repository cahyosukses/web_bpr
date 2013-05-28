<?php

class People extends DataMapper {

    public $table = "peoples";

    function __construct() {
        parent::__construct();
    }

    function exists_record($field, $nilai) {
        $query = $this->db->get_where($this->table, array($field => $nilai))->row();

        if ($query)
            return $query;
        else
            return false;
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}

?>