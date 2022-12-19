<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Drop_column extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_column('blog', 'cat_id');
        $this->dbforge->drop_column('blog', 'is_monset');
    }

    public function down()
    {
        $this->dbforge->drop_table('blog');
    }
}
?>