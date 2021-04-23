<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_mapping_lead extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'lead_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'person_name' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                'designation' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'mobile_no' => array(
                                                        'type'=>'BIGINT',
                                                        'constraint' => '10',
                                                ),
                                                'email' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                
                                                
                                        ));     
                                        $this->dbforge->create_table('mapping_lead');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('mapping_lead');
                                }
                        }?>