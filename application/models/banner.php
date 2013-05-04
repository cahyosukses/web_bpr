<?php

class Banner extends DataMapper {

    public $table = "banners";
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