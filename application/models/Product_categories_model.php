<?php

class Product_categories_model extends CI_Model {
    public $products_id;
    public $categories_id;

    protected $table = 'product_categories';
    protected $table2 = 'products';
    protected $table3= 'categories';

    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }
    public function getActiveProducts(){
        $query = $this->db->get($this->table2);

        return $query->result();
    }
    public function getActiveCategories(){
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
        if($this->db->delete('product_categories', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}