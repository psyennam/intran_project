<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_organization extends CI_Migration {
        public function up(){
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'auto_increment' => TRUE
                        ),
                        'organization_id' => array(
                                'type' => 'INT',
                                'constraint'=>'10',
                                'unique'=>TRUE,
                        ),
                        'clientname' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'50',
                                
                        ),
                        'address' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'50',
                        ),
                        'contactpersonname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'contactpersonemailid' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'contactpersonmobileno' => array(
                                'type' => 'bigint',
                                'constraint' => '10',
                        ),
                        'contactpersonemergencycontactno' => array(
                                'type' => 'bigint',
                                'constraint' => '10',
                        ),
                        'noofbranches' => array(
                                'type' => 'int',
                        ),
                        'status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '15',
                                'default'=>"Active"
                        ),
                        'ipaddress' => array(
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
                        'createddate' => array(
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