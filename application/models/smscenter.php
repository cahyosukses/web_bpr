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
        switch ($status) {
            case 'identify':
                passthru("./Gammu-1.32.0/bin/ammu-smsd -c smsdrc -i > service.log");
                $handle = fopen("service.log", "r");
                $status = 0;
                while (!feof($handle)) {
                    $baristeks = fgets($handle);
                    if (substr_count($baristeks, 'Service GammuSMSD installed sucessfully') > 0) {
                        $status = 1;
                    }
                }
                fclose($handle);
                if ($status == 1)
                    $return_msg = '<div class="alert alert-success"><strong>Yups!</strong> Service GammuSMSD Installed Sucessfully.</div>';
                else if ($status == 0)
                    $return_msg = '<div class="alert alert-error"><strong>Ups!</strong> Error Installing GammuSMSD Service.</div>';

                return $return_msg;
                break;
            case 'install':
                passthru("./Gammu-1.32.0/bin/gammu-smsd -c smsdrc -i > service.log");
                $handle = fopen("service.log", "r");
                $status = 0;
                while (!feof($handle)) {
                    $baristeks = fgets($handle);
                    if (substr_count($baristeks, 'Service GammuSMSD installed sucessfully') > 0) {
                        $status = 1;
                    }
                }
                fclose($handle);
                if ($status == 1)
                    $return_msg = '<div class="alert alert-success"><strong>Yups!</strong> Service GammuSMSD Installed Sucessfully.</div>';
                else if ($status == 0)
                    $return_msg = '<div class="alert alert-error"><strong>Ups!</strong> Error Installing GammuSMSD Service.</div>';

                return $return_msg;
                break;
            case 'uninstall':
                passthru("./Gammu-1.32.0/bin/gammu-smsd -c smsdrc -u > service.log");
                $handle = fopen("service.log", "r");
                $status = 0;
                while (!feof($handle)) {
                    $baristeks = fgets($handle);
                    if (substr_count($baristeks, 'Service GammuSMSD uninstalled sucessfully') > 0) {
                        $status = 1;
                    }
                }
                fclose($handle);
                if ($status == 1)
                    $return_msg = '<div class="alert alert-success"><strong>Yups!</strong> Service GammuSMSD uninstalled sucessfully.</div>';
                else if ($status == 0)
                    $return_msg = '<div class="alert alert-error"><strong>Ups!</strong> Error Uninstalling GammuSMSD Service.</div>';

                return $return_msg;
                break;
            case 'start':
                passthru("./Gammu-1.32.0/bin/gammu-smsd -c smsdrc -s > service.log");
                $handle = fopen("service.log", "r");
                $status = 0;
                while (!feof($handle)) {
                    $baristeks = fgets($handle);
                    if (substr_count($baristeks, 'Service GammuSMSD started sucessfully') > 0) {
                        $status = 1;
                    }
                }
                fclose($handle);
                if ($status == 1)
                    $return_msg = '<div class="alert alert-success"><strong>Yups!</strong> Service GammuSMSD started sucessfully.</div>';
                else if ($status == 0)
                    $return_msg = '<div class="alert alert-error"><strong>Ups!</strong> Error starting GammuSMSD Service.</div>';

                return $return_msg;
                break;
            case 'stop':
                passthru("./Gammu-1.32.0/bin/gammu-smsd -c smsdrc -k > service.log");
                $handle = fopen("service.log", "r");
                $status = 0;
                while (!feof($handle)) {
                    $baristeks = fgets($handle);
                    if (substr_count($baristeks, 'Service GammuSMSD stopped sucessfully') > 0) {
                        $status = 1;
                    }
                }
                fclose($handle);
                if ($status == 1)
                    $return_msg = '<div class="alert alert-success"><strong>Yups!</strong> Service GammuSMSD stopped sucessfully.</div>';
                else if ($status == 0)
                    $return_msg = '<div class="alert alert-error"><strong>Ups!</strong> Error stopping GammuSMSD Service.</div>';

                return $return_msg;
                break;
            default:
                $msg_gammu = 'Status not failed';
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
            $return_msg = '<div class="alert alert-success"><strong>Yups!</strong> Gammu Service Running.</div>';
        else if ($status == 0)
            $return_msg = '<div class="alert alert-error"><strong>Ups!</strong> Gammu Service Stopped.</div>';

        return $return_msg;
    }

    function checking_debit_modem($number) {
        exec("./Gammu-1.32.0/bin/gammu -c ./Gammu-1.32.0/bin/gammurc getussd " . $number, $hasil);
        for ($i = 0; $i <= count($hasil) - 1; $i++) {
            if (substr_count($hasil[$i], 'Service reply') > 0)
                $index = $i;
        }
        return $hasil[$index];
    }

}

?>