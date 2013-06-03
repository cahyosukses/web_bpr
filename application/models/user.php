<?php

class User extends DataMapper {

    public $db_params = 'gammu';
    public $table = "users";
    public $validation = array(
        'username' => array(
            'label' => 'Username',
            'rules' => array('required')
        ),
        'password' => array(
            'label' => 'Password',
            'rules' => array('required')
        )
    );

    function __construct() {
        parent::__construct();
    }

    function check_user($username, $password) {
        $query = $this->db->get_where($this->table, array(
                    'username' => $username,
                    'password' => md5($password)
                ))->row();

        return $query;
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}

?>