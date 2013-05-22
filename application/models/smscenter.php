<?php

class Smscenter extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function send_message() {
        $data = array(
            'UpdatedInDB' => 'NOW()',
            'InsertIntoDB' => 'NOW()',
            'Class' => '-1',
            'DestinationNumber' => $this->input->post('phone_number'),
            'TextDecoded' => $this->input->post('textmessage'),
            'CreatorID' => '1',
            'DeliveryReport' => 'no',
            'Coding' => 'Default_No_Compression'
        );

        $this->db->insert('outbox', $data);
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function read_inbox($limit, $uri) {
        $query = $this->db->get('inbox', $limit, $uri);
        return $query;
    }

    function read_sentitems($limit, $uri) {
        $query = $this->db->get('sentitems', $limit, $uri);
        return $query;
    }

    function run_gammu_service($status) {
        //Script untuk menjalankan Service Gammu
        switch ($status) {
            case 'install':
                passthru("C:\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -i");
                break;
            case 'uninstall':
                passthru("C:\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -u");
                break;
            case 'start':
                passthru("C:\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -s");
                break;
            case 'stop':
                passthru("C:\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -k");
                break;
            default: 
                return 'Status not failed'; 
        }
    }

    function checking_gammu_service() {
        passthru("net start > service.log");
        $handle = fopen("service.log", "r");
        $status = 0;
        while (!feof($handle)) {
            $baristeks = fgets($handle);
            if (substr_count($baristeks, 'Gammu SMSD Service (GammuSMSD)') > 0) {
                $status = 1;
            }
        }
        fclose($handle);
        if ($status == 1)
            $return_msg = '<div class="alert alert-success">Gammu service running..</div>';
        else if ($status == 0)
            $return_msg = '<div class="alert alert-error"><strong>Ups!</strong> Gammu Service Stopped!</div>';

        return $return_msg;
    }

    function checking_debit_modem($number) {
        exec("C:\Gammu-1.32.0\bin\gammu -c C:\Gammu-1.32.0\bin\gammurc getussd " . $number, $hasil);
        for ($i = 0; $i <= count($hasil) - 1; $i++) {
            if (substr_count($hasil[$i], 'Service reply') > 0)
                $index = $i;
        }
        return $hasil[$index];
    }

}

?>