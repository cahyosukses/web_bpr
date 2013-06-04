<?php

class Gaminbox extends DataMapper {

    public $db_params = 'gammu';
    public $table = "inbox";

    function __construct() {
        parent::__construct();
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function auto_replay_message($sms, $sender_number, $ID) {
        $ussi_tab = new Ussitabungan();
        $outbox = new Gamoutbox();

        /*
         * FORMAT SMS BANKING / PIN : 8 DIGIT
         * REG#<NAMA>#<NOREKENING>#<PIN1>#<PIN2>
         * TAB#<NOREKENING>#<PIN>
         * KRE#<NOREKENING>#<PIN>
         * TRS#<NOREKENING>#<NOREKENING TUJUAN>#<PIN>
         * 
         * PEMBELIAN PULSA
         * ISI#<NOREKENING>#<NOMINAL>#<NOHP>#<PIN>
         * 
         * PEMBAYARAN  LISTRIK/TLP/PDAM          
         * BYR#PLN#<NOREKENING>#<NOPELANGGAN>#<PIN>
         * BYR#TLK#<NOREKENING>#<NOPELANGGAN>#<PIN>
         * BYR#PDAM#<NOREKENING>#<NOPELANGGAN>#<PIN>
         */
        $parts = explode('#', $sms);
        switch ($parts[0]) {
            case 'REG':
                $nama = $parts[1];
                $no_rek = $parts[2];
                $pin1 = $parts[3];
                $pin2 = $parts[4];

                //cek pin1 harus sama dengan pin2
                if ($pin1 == $pin2) {
                    //cek no rekening tabungan
                    if ($ussi_tab->exists_record('SALDO_AKHIR', $no_rek)) {
                        echo "REGISTER BERHASIL";
                    }
                }

                break;
            case 'TAB':
                //cek pin
                $no_rek = $parts[1];
                $balance = number_format($ussi_tab->get_balance_record($no_rek), 2, ",", ".");
                $outbox->outo_send_message($sender_number, $balance);
                $this->where('ID', $ID)
                        ->update(
                                array(
                                    'Processed' => 'true'
                                )
                );

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