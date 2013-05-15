<?php

class Setting extends DataMapper {

    public $table = "settings";
    public $validation = array(
        'name' => array(
            'label' => 'Config Name',
            'rules' => array('required')
        )
    );

    function __construct() {
        parent::__construct();
    }

    function _update($k, $v) {
        $this->db->like('name', $k);
        $this->db->from($this->table);
        $count = $this->db->count_all_results();
        if ($count == 0) {
            $this->db->insert($this->table, array("name" => $k, "value" => $v));
        } else {
            $this->db->update($this->table, array("name" => $k, "value" => $v), array("name" => $k));
        }
    }

    function get_val($key) {
        $setting = new Setting();
        $result = $setting->where("name", $key)->get();
        return $result->value;
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function exists_record($field, $nilai) {
        $query = $this->db->get_where($this->table, array($field => $nilai))->row();

        if ($query)
            return $query;
        else
            return false;
    }

}

?>