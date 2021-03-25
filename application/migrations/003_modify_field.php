<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
	class Migration_modify_field extends CI_Migration {

        public function up()
        {
             $fields = array(
                'blogname' => array(
                'name' => 'bname',
                'type' => 'varchar(100)',
                  ),
              );
                $this->dbforge->modify_column('blog', $fields);
                // gives ALTER TABLE table_name CHANGE old_name new_name TEXT
        }

        public function down()
        {
                $this->dbforge->drop_column('blog','blogname');
        }
}

?>
