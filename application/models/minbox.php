<?php

class MInbox extends DataMapper {

    public $table = "inbox";

    function __construct() {
        parent::__construct();
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function get_status_replay($sms) {
        /*
         * FORMAT SMS BANKING
         * TAB <NOREKENING> <PIN>
         * KRE <NOREKENING> <PIN>
         * TRS <NOREKENING> <NOREKENING TUJUAN> <PIN>
         * 
         * PEMBELIAN PULSA
         * ISI <NOREKENING> <NOMINAL> <NOHP> <PIN>
         * 
         * PEMBAYARAN  LISTRIK/TLP/PDAM          
         * BYR PLN <NOREKENING> <NOPELANGGAN> <PIN>
         * BYR TLK <NOREKENING> <NOPELANGGAN> <PIN>
         * BYR PDAM <NOREKENING> <NOPELANGGAN> <PIN>
         */
        $parts = explode(' ', $string);
        switch ($parts[0]) {
            case 'TAB': '';
                break;
            case 'KRE': '';
                break;
            case 'TRS': '';
                break;
            case 'ISI': '';
                break;
            case 'BYR': '';
                switch ($parts[1]) {
                    case 'PLN':
                        break;
                    case 'TLK':
                        break;
                    case 'PDAM':
                        break;
                    default:
                        echo 'FORMAT YANG ANDA MASUKAN SALAH.';
                }
                break;
            default:
                echo 'FORMAT YANG ANDA MASUKAN SALAH.';
        }
    }

}

?>