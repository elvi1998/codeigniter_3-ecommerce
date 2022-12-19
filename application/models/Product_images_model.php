<?php

class Product_images_model extends CI_Model {
    public $products_id;
    public $images_id;

    protected $table = 'product_images';
    protected $table3 = 'products';
    protected $table2= 'images';

    public function insert($data){
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }
    public function getActiveImages(){
        $query = $this->db->get($this->table2);

        return $query->result();
    }
    public function getActiveProducts(){
        $query = $this->db->get($this->table3);

        return $query->result();
    }


    public function select_all(){

        $query = $this->db->get($this->table);

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
        if($this->db->delete('product_images', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}