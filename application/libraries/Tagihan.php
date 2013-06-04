<?php

class Tagihan {

    public function kirim_id_pelanggan_pln($idpel) {
        $url = "http://infobillingpln.msibali.com/info-billing/";        
        $result = "http://www.pln.co.id/info-rekening/?idpel=$idpel&mod=tagihan.bulan&action=search&fst=on";
        
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "idpel=$idpel&mod=tagihan.bulan&action=search&fst=on");
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_exec($curlHandle);
        curl_close($curlHandle);
    }

}
?>
