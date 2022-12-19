<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Change_json extends CI_Migration {

    public function up()
    {
        $fields = array(
                'payment_json' => array(
                        'type' => 'TEXT',
                ),
        );
        $this->dbforge->modify_column('orders', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_table('orders');
    }
}
?>