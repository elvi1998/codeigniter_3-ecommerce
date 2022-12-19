<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_products extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'description' => array(
                'type' => 'TEXT',
                'constraint' => '255',
            ),
            'brand_id' => array(
                'type' => 'INT',
                'constraint' => '10',
            ),
            'quantity' => array(
                'type' => 'INT',
                'constraint' => '12',
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => FALSE,
                'default' => 0.00
            ),
            'sales_prices' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => FALSE,
                'default' => 0.00
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
        $this->dbforge->create_table('products');
    }

    public function down()
    {
        $this->dbforge->drop_table('products');
    }
}
?>
