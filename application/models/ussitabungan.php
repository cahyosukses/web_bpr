<?php

class Ussitabungan extends DataMapper {

    public $db_params = 'ussi';
    public $table = "tabung";

    function __construct() {
        parent::__construct();
    }

    function exists_record($val) {
        $query = $this->where('NO_REKENING', $val)->get();

        if ($this->exists())
            return true;
        else
            return false;
    }
    
    function get_balance_record($val) {
        $query = $this->where('NO_REKENING', $val)->get();

        if ($this->exists())
            return $query->SALDO_AKHIR;
        else
            return false;
    }

}

?>
