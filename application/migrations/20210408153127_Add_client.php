<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_client extends CI_Migration {

        public function up(){
                $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'auto_increment' => TRUE
                ),
                'client' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                ),
                'client_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                        'unique'=>true,
                ),
                'org_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                ),
                'email' => array(
                        'type' => 'VARCHAR',
                        'constraint'=>'20',
                        'NULL'=>false,        
                ),                
                'dob' => array(
                        'type' => 'DATE',
                ),
                'Address' => array(
                        'type' => 'VARCHAR',
                        'constraint'=>'20',
                        'NULL'=>false,
                ),
                'contact'=> array(
                        'type'=>'BIGINT',
                        'constraint'=>'10',
                        'NULL'=>false,
                ),
                'branch_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                ),
                'zone_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                ),
                'state_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                ),
                'city_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                ),
                'zip_code' => array(
                        'type' => 'INT',
                        'constraint' => '10',
                ),
                'created_at' => array(
                        'type' => 'DATETIME',
                        'default'=>date('Y-m-d H:i:s'),        
                ),
                'ip_address' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                ),
                'status' => array(
                        'type' => 'BOOLEAN',
                        'default'=>'0',
                ),
                
        ));     
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('client');
        }

        public function down(){
                $this->dbforge->drop_table('client');
        }
}?>