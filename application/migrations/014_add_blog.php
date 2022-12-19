<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_blog extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'description' => array(
                'type' => 'TEXT',
                'constraint' => '255',
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'cat_id' => array(
                'type' => 'INT',
                'constraint' => '12',
            ),
            'content' => array(
                'type' => 'TEXT',
                'constraint' => '10',
            ),
            'is_monset' => array(
                'type' => 'TINYINT',
                'constraint' => 3,
                'default'=>1,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'status' => array(
                'type' => 'TINYINT',
                'constraint' => 3,
                'default'=>1,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('blog');
    }

    public function down()
    {
        $this->dbforge->drop_table('blog');
    }
}
?>