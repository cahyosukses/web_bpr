<?php

class Gamoutbox extends DataMapper {

    public $db_params = 'gammu';
    public $table = "outbox";

    function __construct() {
        parent::__construct();
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function send_message($number, $balance) {
        $date = date('d/m/y');
        $text_msg = "Saldo Tabungan Pada Tanggal " . $date . " Sebesar Rp. " . $balance;
        $data = array(
            'DestinationNumber' => $number,
            'TextDecoded' => $text_msg,
            'DeliveryReport' => 'no'
        );

        $this->db->insert($this->table, $data);
    }

}

?>