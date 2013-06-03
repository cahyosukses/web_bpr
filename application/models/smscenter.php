<?php

class Smscenter extends DataMapper {

    public $db_params = 'gammu';
    private $gammu;
    private $ussi;

    function __construct() {
        parent::__construct();
        $this->gammu = $this->load->database('gammu', TRUE);
        $this->ussi = $this->load->database('ussi', TRUE);
    }

    function _delete($id, $model, $table) {
        $this->$model->where('id', $id);
        $this->$model->delete($table);
    }

    function read_sentitems($limit, $uri) {
        $query = $this->gammu->get('sentitems', $limit, $uri);
        return $query;
    }

    function exists_record($table, $field, $nilai) {
        $query = $this->ussi->get_where($table, array($field => $nilai))->row();

        if ($query)
            return true;
        else
            return false;
    }

}

?>