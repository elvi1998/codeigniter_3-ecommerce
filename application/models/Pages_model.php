<?php

class Pages_model extends CI_Model {
    public $title;
    public $description;
    public $content;
    public $is_menu;
    public $status;

    protected $table = 'pages';

    public function insert($data){
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
        if($this->db->delete('pages', array('id' => $id))){
            return true;
        } else {
            return false;
        }
    }

}