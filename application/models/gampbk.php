<?php

class Gampbk extends DataMapper {

    public $db_params = 'gammu';
    public $table = "pbk";

    function __construct() {
        parent::__construct();
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function check_status_pin($number, $no_rek, $pin) {
        $pin_encrypt = md5($pin);
        $this->where('Number', $number)
                ->where('no_rek_tabungan', $no_rek)
                ->where('PIN', $pin_encrypt)
                ->get();

        if ($this->exists())
            return true;
        else
            return false;
    }

}

?>