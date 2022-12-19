<?php

class Categories_model extends CI_Model {
    public $title_c;
    public $is_menu;
    public $status;

    protected $table = 'categories';

    public function insert($data){
        // $data = array(
        //         'fullname' => $this->fullname,
        //         'password' => $this->password,
        //         'email' => $this->email,
        //         'status' => $this->status
        // );
    
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){
        $this->db->where('status',1);
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
        if($this->db->delete('category', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}