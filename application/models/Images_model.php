<?php

class Images_model extends CI_Model {
    public $product_id;
    public $path;
    public $main;
    public $status;

    protected $table = 'images';
    protected $table2 = 'products';

    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){
        $this->db->where('status',1);
        $query = $this->db->get($this->table);

        return $query->result();
    }
    public function getActiveProducts(){
        $query = $this->db->get($this->table2);

        return $query->result();

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
        if($this->db->delete('images', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}