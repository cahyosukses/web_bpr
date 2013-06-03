<?php

class Gallery extends DataMapper {

    public $db_params = 'gammu';
    public $table = "galleries";
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