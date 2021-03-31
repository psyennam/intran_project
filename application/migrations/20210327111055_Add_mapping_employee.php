<?php defined('BASEPATH') OR exit('No direct script access allowed');
        class Migration_Add_mapping_employee extends CI_Migration {

        public function up(){
                $this->dbforge->add_field(array(
                        'employee_id' => array(
                                'type' => 'INT',
                        ),
                        'role_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'department_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'designation_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),                        
                ));     
                $this->dbforge->create_table('mapping_employee');
        }

        public function down(){
                $this->dbforge->drop_table('mapping_employee');
        }
}?>