<?php

class Branch extends DataMapper {

    public $table = "branches";
    public $validation = array(
        'name' => array(
            'label' => 'Name of Branch',
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