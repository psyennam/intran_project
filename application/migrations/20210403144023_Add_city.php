<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_city extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE,
                                                ),
                                                'country_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>false,
                                                ),
                                                'state_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>false,
                                                ),
                                                'city_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'unique'=>true,
                                                        'NULL'=>false,
                                                ),
                                                'org_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>false,
                                                ),
                                                'branch_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>true,
                                                ),
                                                'city'=>array(
                                                        'type' =>'VARCHAR',
                                                        'constraint'=>'50', 
                                                        'NULL'=>false,
                                                ),
                                                'created_at' => array(
                                                        'type' => 'DATETIME',
                                                        'default'=>date('Y-m-d H:i:s'), 

                                                ),
                                                'ip_address' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                        'NULL'=>false,
                                                ),
                                                'status' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '15',
                                                        'default'=>0,
                                                ),
                                                
                                        ));       
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('city');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('city');
                                }
                        }?>