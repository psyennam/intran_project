<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_complaint_tracking extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                ),
                                                'complaint_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint'=>'20',
                                                ),
                                                'employee_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',      
                                                ),
                                                'assigned_by' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',      
                                                ),
                                                'remark' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '100',
                                                        
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
                                        $this->dbforge->create_table('complaint_tracking');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('complaint_tracking');
                                }
                        }?>