<?php

class Settings_model extends CI_Model {
    public $_key;
    public $value;
    public $status;

    protected $table = 'settings';

    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){
        $this->db->where('status',1);
        $query = $this->db->get($this->table);

        return $query->result();
    }
    public function select_data($_key)
    {
        $this->db->select('value');
        $this->db->where('status', 1);
        $this->db->where('_key', $_key);
        $query = $this->db->get($this->table);
        return $query->row('_key');
    }

    public function selectDataById($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function update($id,$data){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    public function delete($id)
    {
        if($this->db->delete('settings', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}