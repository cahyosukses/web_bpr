<?php

class Contact extends DataMapper {

    public $table = "contacts";
    public $validation = array(
        'name' => array(
            'label' => 'Config Name',
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