<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
	class Migration_Add_filed extends CI_Migration {

        public function up()
        {
               $fields=array('blogname'=>array('type'=>'varchar(100)'));
               $this->dbforge->add_column('blog', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('blog','blogname');
        }
}

?>
