<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_approved_price extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'product_id'=>array(
                                                        'type' => 'INT',
                                                        
                                                ),
                                                'company_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'price'=> array(
                                                        'type' => 'INT',
                                                ),
                                                
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('approved_price');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('approved_price');
                                }
                        }?>