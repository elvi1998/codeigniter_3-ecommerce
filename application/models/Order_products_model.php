<?php

class Order_products_model extends CI_Model {
    public $order_id;
    public $product_id;
    public $price;
    public $quantity;
    public $amount;

    protected $table = 'order_products';
    protected $table2 = 'orders';
    protected $table3 = 'products';

    public function insert($data){
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }
    public function getActiveOrders(){
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
        if($this->db->delete('order_products', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}