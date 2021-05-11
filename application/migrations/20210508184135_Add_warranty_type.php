<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_warranty_type extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'warranty_type_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '6',
                                                        'unique'=>true,
                                                ),
                                                'title' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                ),
                                                'org_code'=>array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'parent' => array(
                                                        'type' => 'int',
                                                        'constraint' => '10',
                                                        'NULL'=>true,
                                                ),
                                                'maintenance' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                        'NULL'=>true,
                                                ),
                                                 'duration' => array(
                                                        'type' => 'DATE',
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
                                        $this->dbforge->create_table('warranty_type');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('warranty_type');
                                }
                        }?>