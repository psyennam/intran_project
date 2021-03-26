<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_organization extends CI_Migration {
        public function up(){
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'auto_increment' => TRUE
                        ),
                        'org_code' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'10',
                                'unique'=>TRUE,
                        ),
                        'org_name' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'50',
                                
                        ),
                        'address' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'50',
                        ),
                        'client_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'client_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'client_mobileno' => array(
                                'type' => 'bigint',
                                'constraint' => '10',
                        ),
                        'emergency_contact' => array(
                                'type' => 'bigint',
                                'constraint' => '10',
                        ),
                        'no_branch' => array(
                                'type' => 'int',
                        ),
                        'status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '15',
                                'default'=>"Panding"
                        ),
                        'ip_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ),
                        'regdate' => array(
                                'type' => 'date',
                                'default' => date('Y-m-d'),
                        ),
                        'validity' => array(
                                'type' => 'date',
                        ),
                        'logo' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'300',
                        ),
                        'url' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'300',
                        ),
                        'created_at' => array(
                                'type' => 'DATETIME',
                                'default'=>date('Y-m-d H:i:s'),
                        ),
                        
                ));     
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('organization');
        }

        public function down(){
                $this->dbforge->drop_table('organization');
        }
}?>