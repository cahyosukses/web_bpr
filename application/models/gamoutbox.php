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

    function send_long_message($nohp, $pesan, $modem) {
        $pesan = str_replace("'", "\'", $pesan);
        if (strlen($pesan) <= 160) {
            // jika panjang pesan maks 160 karakter
            $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID)
		          VALUES ('$nohp', '$pesan', '$modem', 'Gammu')";
            $hasil = mysql_query($query);
        } else {
            // jika panjang pesan > 160 karakter

            $jmlSMS = ceil(strlen($pesan) / 153);
            $pecah = str_split($pesan, 153);

            $query = "SHOW TABLE STATUS LIKE 'outbox'";
            $hasil = mysql_query($query);
            $data = mysql_fetch_array($hasil);
            $newID = $data['Auto_increment'];

            $random = rand(1, 255);
            $headerUDH = sprintf("%02s", strtoupper(dechex($random)));

            for ($i = 1; $i <= $jmlSMS; $i++) {
                $udh = "050003" . $headerUDH . sprintf("%02s", $jmlSMS) . sprintf("%02s", $i);
                $msg = $pecah[$i - 1];
                if ($i == 1) {
                    $query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, SenderID, CreatorID)
						  VALUES ('$nohp', '$udh', '$msg', '$newID', 'true', '$modem', 'Gammu')";
                }
                else
                    $query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
						   VALUES ('$udh', '$msg', '$newID', '$i')";
                mysql_query($query);
            }
        }

        return 'SMS sedang dikirim...';
    }

}

?>