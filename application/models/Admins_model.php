<?php

class Admins_model extends CI_Model {
    public $fullname;
    public $password;
    public $email;
    public $status;

    protected $table = 'admins';

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
    public function loggedin($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    public function delete($id)
    {
        if($this->db->delete('admins', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}