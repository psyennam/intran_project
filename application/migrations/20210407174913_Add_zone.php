<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_zone extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'zone_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'unique'=>true,
                                                ),
                                                'zone' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                        'unique'=>true,
                                                ),
                                                'state_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'employee' => array(
                                                        'type'=>'VARCHAR',
                                                        'constraint'=>'20'
                                                ),
                                                'parent' => array(
                                                        'type'=>'INT',
                                                        'constraint'=>'20',
                                                        'default'=>NULL,
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
                                                'created_at' => array(
                                                        'type' => 'DATETIME',
                                                        'default'=>date('Y-m-d H:i:s'),        
                                                ),
                                                'ip_address' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                ),
                                                'status' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '15',
                                                        'default'=>0,
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('zone');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('zone');
                                }
                        }?>