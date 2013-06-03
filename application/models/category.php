<?php

class Category extends DataMapper {

    public $db_params = 'gammu';
    public $table = "categories";
    public $validation = array(
        'name' => array(
            'label' => 'Root Name',
            'rules' => array('required')
        )
    );

    function __construct() {
        parent::__construct();
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function exists_record($field, $nilai) {
        $query = $this->db->get_where($this->table, array($field => $nilai))->row();

        if ($query)
            return $query;
        else
            return false;
    }

}

?>