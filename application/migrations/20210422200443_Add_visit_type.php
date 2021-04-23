<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_visit_type extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'visit_type' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('visit_type');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('visit_type');
                                }
                        }?>