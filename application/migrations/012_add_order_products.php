<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_order_products extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'order_id' => array(
                'type' => 'INT',
                'constraint' => '12',
            ),
            'product_id' => array(
                'type' => 'INT',
                'constraint' => '12',
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => FALSE,
                'default' => 0.00,
            ),
            'quantity' => array(
                'type' => 'INT',
                'constraint' => '15',
            ),
            'amount' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => FALSE,
                'default' => 0.00,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order_products');
    }

    public function down()
    {
        $this->dbforge->drop_table('order_products');
    }
}
?>

