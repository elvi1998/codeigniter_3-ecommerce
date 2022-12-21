<?php

class Orders_model extends CI_Model {
    public $user_id;
    public $payments_method;
    public $delivery_method;
    public $total_amount;
    public $status;
    public $payment_json;
    public $status_id;
    protected $table = 'orders';
    protected $table1 = 'users';
    protected $table2 = 'payment_methods';
    protected $table3 = 'delivery_methods';
    protected $table4 = 'order_status';


    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }
    public function getActiveUsers(){
        $query = $this->db->get($this->table1);

        return $query->result();
    }
    public function getActivePayment_methods(){
        $query = $this->db->get($this->table2);

        return $query->result();
    }
    public function getActiveDelivery_methods(){
        $query = $this->db->get($this->table3);

        return $query->result();
    }
    public function getActiveOrder_status(){
        $query = $this->db->get($this->table4);

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
        if($this->db->delete('orders', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}