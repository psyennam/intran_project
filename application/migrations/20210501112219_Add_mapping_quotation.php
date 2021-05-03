<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_mapping_quotation extends CI_Migration {
                                
                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'lead_code' => array(
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
                                                'quantity' => array(
                                                        'type' => 'INT',
                                                ),
                                                'price' => array(
                                                        'type' => 'INT',
                                                ),
                                                'approved_price' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'rate' => array(
                                                        'type' => 'INT',
                                                ),
                                                'discount_type' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'discount' => array(
                                                        'type' => 'INT',
                                                ),
                                                'total' => array(
                                                        'type' => 'INT',
                                                ),
                                                'quotation_status' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '15',
                                                        'default'=>0,
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('mapping_quotation');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('mapping_quotation');
                                }
                        }?>