<?php

class Products_model extends CI_Model {
    public $title;
    public $description;
    public $brand_id;
    public $quantity;
    public $price;
    public $sales_prices;

    protected $table = 'products';
    protected $table2 = 'brands';

    public function insert($data){
    
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){
        $this->db->where('status',1);
        $query = $this->db->get($this->table);

        return $query->result();
    }
    public function getActiveBrands(){
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
        if($this->db->delete('products', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}