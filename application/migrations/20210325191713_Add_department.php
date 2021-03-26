<?php defined('BASEPATH') OR exit('No direct script access allowed');
        class Migration_add_department extends CI_Migration {

        public function up(){
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'auto_increment' => TRUE
                        ),
                        'department_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'department_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                 'unique'=>TRUE
                        ),
                        'org_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'branch_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'ip_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ),
                        'status' => array(
                                'type' => 'BOOLEAN',
                                'default'=>'0',
                        ),
                        'created_at' => array(
                                'type' => 'DATETIME',
                                'default'=>date('Y-m-d H:i:s'),
                        ),
                        
                ));     
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('department');
        }

        public function down(){
                $this->dbforge->drop_table('department');
        }
}?>