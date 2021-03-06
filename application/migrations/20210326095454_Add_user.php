<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_user extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'org_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'branch_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'role' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'default'=>'Admin',
                                                ),
                                                'username' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'password' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'ip_address' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                ),
                                                'created_at' => array(
                                                        'type' => 'DATETIME',
                                                        'default'=>date('Y-m-d H:i:s'),        
                                                ),
                                                'status' => array(
                                                        'type' => 'BOOLEAN',
                                                        'default'=>'0',
                                                ),
                                                'password_flag'=> array(
                                                        'type'=>'BOOLEAN',
                                                        'default'=>'0',
                                                ),
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('user');
                                }
                                public function down(){
                                        $this->dbforge->drop_table('user');
                                }
                        }?>