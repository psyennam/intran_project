<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_pincode extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'pin_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'unique'=>true,
                                                ),
                                                'zip_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>false,
                                                ),
                                              'city_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
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
                                                'created_at' => array(
                                                        'type' => 'DATETIME',
                                                        'default'=>date('Y-m-d H:i:s'),  
                                                        'NULL'=>false,      
                                                ),
                                                'ip_address' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                        'NULL'=>false,
                                                ),
                                                'status' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '15',
                                                        'default'=>0
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('pincode');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('pincode');
                                }
                        }?>