<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_user extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment'=>TRUE,
                                                ),
                                                'organizationid' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'username' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'password' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                ),
                                                'role' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                ),
                                                'createddate' => array(
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
                                                        'default'=>'Active',
                                                ),
                                                'password_flag'=>array(
                                                        'type'=>'BOOLEAN',
                                                        'default'=>'0',
                                                ),
                                                'branch_code'=>array(
                                                        'type'=>'VARCHAR',
                                                        'constraint' => '10',
                                                        'Null'=>TRUE,
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('user');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('user');
                                }
                        }?>