<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_orders extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => '12',
            ),
            'payments_method' => array(
                'type' => 'INT',
                'constraint' => '5',
            ),
            'delivery_method' => array(
                'type' => 'INT',
                'constraint' => '5',
            ),
            'total_amount' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => FALSE,
                'default' => 0.00
            ),
            'payment_json' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->dbforge->create_table('orders');
    }

    public function down()
    {
        $this->dbforge->drop_table('orders');
    }
}
?>

