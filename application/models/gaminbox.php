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
        $phonebook = new Gampbk();
        /*
         * FORMAT SMS BANKING / PIN : 8 DIGIT         
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

        switch ($parts[0]) {
            case 'REG':
                // REG#<NAMA>#<NOREKENING>#<PIN1>                         
                $count_string = substr_count($sms, '#');
                if ($count_string == '3') {
                    $parts = explode('#', strtoupper($sms));
                    $nama = $parts[1];
                    $no_rek = $parts[2];
                    $pin = $parts[3];

                    if ($nama != '' && $no_rek != '' && $pin != '') {
                        $phonebook->GroupID = "1";
                        $phonebook->Name = $parts[1];
                        $phonebook->no_rek_tabungan = $parts[2];
                        $phonebook->PIN = md5($parts[3]);
                        $phonebook->Number = $sender_number;

                        if ($phonebook->save()) {
                            //kirim konfirmasi/balas pesan
                            $msg = "Debitur YTH, Terimakasih sudah melakukan registrasi SMS Banking pada BPR KAB BANDUNG atas Nama : " . $nama . " PIN : " . $pin . " (do-not-reply)";
                            $outbox->send_message_confirmation($sender_number, $msg);

                            //update pesan jika sudah terkirim
                            $this->where('ID', $ID)
                                    ->update(
                                            array(
                                                'Processed' => 'true'
                                            )
                            );
                        } else {
                            //kirim konfirmasi jika gagal/format salah
                            $msg = "Maaf, format salah. Silahkan di ulangi lagi dengan format KETIK : REG#NAMA#NOREKENING#PIN . Terimakasih BPR KAB BANDUNG";
                            $outbox->send_message_confirmation($sender_number, $msg);
                        }
                    } else {
                        //kirim konfirmasi jika gagal/format salah
                        $msg = "Maaf, format salah. Silahkan di ulangi lagi dengan 
                            format KETIK : REG#NAMA#NOREKENING#PIN . Terimakasih BPR KAB BANDUNG";
                        $outbox->send_message_confirmation($sender_number, $msg);
                    }
                } else {
                    //kirim konfirmasi jika gagal/format salah
                    $msg = "Maaf, format salah. Silahkan di ulangi lagi dengan 
                            format KETIK : REG#NAMA#NOREKENING#PIN . Terimakasih BPR KAB BANDUNG";
                    $outbox->send_message_confirmation($sender_number, $msg);
                }

                break;
            case 'TAB':
                // TAB#<NOREKENING>#<PIN>
                $count_string = substr_count($sms, '#');
                if ($count_string == '2') {
                    $parts = explode('#', strtoupper($sms));
                    $no_rek = $parts[1];
                    $pin = $parts[2];

                    // PERIKSA NOMOR, REKENING, PIN
                    if ($phonebook->check_status_pin($sender_number, $no_rek, $pin)) {
                        $balance = number_format($ussi_tab->get_balance_record($no_rek), 2, ",", ".");
                        $outbox->outo_send_message($sender_number, $balance);
                        $this->where('ID', $ID)
                                ->update(
                                        array(
                                            'Processed' => 'true'
                                        )
                        );
                    } else {
                        //kirim konfirmasi jika gagal/format salah
                        $msg = "Maaf, format atau PIN yang anda masukan salah. Silahkan di ulangi lagi dengan 
                            format KETIK : REG#NOREKENING#PIN . Terimakasih BPR KAB BANDUNG";
                        $outbox->send_message_confirmation($sender_number, $msg);
                    }
                } else {
                    //kirim konfirmasi jika gagal/format salah
                    $msg = "Maaf, format atau PIN yang anda masukan salah. Silahkan di ulangi lagi dengan 
                            format KETIK : REG#NOREKENING#PIN . Terimakasih BPR KAB BANDUNG";
                    $outbox->send_message_confirmation($sender_number, $msg);
                }
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
            case 'INFO':
                $msg = "Debitur YTH, untuk Registrasi dan info tabungan. REG#NAMA#NO_REK#PIN, TAB#NO_REK#PIN. Terimakasih BPR KAB BANDUNG (do-not-reply)";
                $outbox->send_message_confirmation($sender_number, $msg);
                break;
            default:
                $msg = "Debitur YTH, format pesan anda salah. Ketik INFO untuk informasi. Terimakasih BPR KAB BANDUNG (do-not-reply)";
                $outbox->send_message_confirmation($sender_number, $msg);
        }
    }

    function check_offset($offset) {
        try {
            if (isset($offset))
                $b = $offset;
            else
                throw new Exception("Notice: Undefined offset: " . $offset);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>