<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_discussion_with_customer extends CI_Migration {

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
                                                'concerned_person' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'quotation_require' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'remark' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '100',
                                                ),
                                                'additional_remark' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '100',
                                                ),
                                                'created_at' => array(
                                                        'type' => 'DATETIME',
                                                        'default'=>date('Y-m-d H:i:s'),        
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('discussion_with_customer');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('discussion_with_customer');
                                }
                        }?>