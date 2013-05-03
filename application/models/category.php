<?php

class Category extends DataMapper {

    public $table = "categories";
    public $validation = array(
        'nama' => array(
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

}

?>