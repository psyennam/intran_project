<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
	class Migration_Add_department extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'auto_increment' => TRUE
                        ),
                        'departmentname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'departmentcode' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                 'unique'=>TRUE
                        ),
                        'clientid' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'branchid' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'ipaddress' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ),
                        'status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'createddate' => array(
                                'type' => 'DATETIME',
                                'default'=>date('Y-m-d H:i:s'),
<<<<<<< HEAD:application/migrations/004_add_department.php
                                
                        ),
                        
                        
=======
                        ),                 
>>>>>>> e4b6f2b9a5edf11abd4b60d1c13f303285e56150:application/migrations/003_add_department.php
                ));     
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('department');
        }

        public function down()
        {
                $this->dbforge->drop_table('department');
        }       
}

?>
