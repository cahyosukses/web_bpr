<?php

class Promo extends DataMapper {

    public $table = "promos";
    public $validation = array(
        'title' => array(
            'label' => 'Title',
            'rules' => array('required'))
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