<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gammu {

    public function save_gammu_config($gammuurc, $gammusmsdrc) {
        if ($gammuurc) {
            if (!write_file('.\Gammu-1.32.0\bin\gammurc', $gammuurc)) {
                $msg_gammu = 'Unable to write the file gammuurc';
            } else {
                $msg_gammu = 'File written!';
            }
        }
        if ($gammusmsdrc) {
            if (!write_file('.\Gammu-1.32.0\bin\smsdrc', $gammusmsdrc)) {
                $msg_gammu = 'Unable to write the file smsdrc';
            } else {
                $msg_gammu = 'File written!';
            }
        }
        return $msg_gammu;
    }

    public function checking_gammu_service() {
        exec("net start > service.log");
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

    public function checking_debit_modem($number) {
        exec("./Gammu-1.32.0/bin/gammu -c ./Gammu-1.32.0/bin/gammurc getussd " . $number, $hasil);
        for ($i = 0; $i <= count($hasil) - 1; $i++) {
            if (substr_count($hasil[$i], 'Service reply') > 0)
                $index = $i;
        }
        return $hasil[$index];
    }

    public function run_gammu_service($status) {
        switch ($status) {
            case 'identify':
                passthru(".\Gammu-1.32.0\bin\gammu --identify > service.log");
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
                passthru(".\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -i > service.log");
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
                passthru(".\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -u > service.log");
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
                passthru(".\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -s > service.log");
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
                passthru(".\Gammu-1.32.0\bin\gammu-smsd -c smsdrc -k > service.log");
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

}

/* End of file Someclass.php */