<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_complaint extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'complaint_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'unique'=>true,
                                                ),
                                                'customer_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'quotation_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'product_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'org_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'email' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '50',
                                                ),
                                                'mobile_no' => array(
                                                        'type' => 'BIGINT',
                                                        'constraint' => '10',
                                                ),
                                                'subject' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '50',
                                                ), 
                                                'description' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '100',
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
                                        $this->dbforge->create_table('complaint');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('complaint');
                                }
                        }?>