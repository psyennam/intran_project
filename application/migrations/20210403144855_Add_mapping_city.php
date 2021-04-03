<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_mapping_city extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'city_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>false,
                                                ),
                                                'state_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>false,
                                                ),
                                                'country_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'NULL'=>false,
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('mapping_city');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('mapping_city');
                                }
                        }?>