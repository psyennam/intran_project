<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_lead extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'lead_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'unique'=>true,
                                                ),
                                                'org_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'supplier_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                'brand' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                'city_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'zip_code' => array(
                                                        'type' => 'INT',
                                                        'constraint' => '10',
                                                ),
                                                'company_name' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                'gst' => array(
                                                        'type' => 'INT',
                                                ),
                                                'address' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
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
                                        $this->dbforge->create_table('lead');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('lead');
                                }
                        }?>