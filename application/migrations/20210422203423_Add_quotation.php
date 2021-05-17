<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_quotation extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'quotation_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'lead_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'employee_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'total' => array(
                                                        'type' => 'INT',
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
                                                'invoice_number' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'UNIQUE'=>true,
                                                ),
                                                'quotation_close_date'=>array(
                                                        'type' => 'DATETIME',
                                                        'default'=>null,
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('quotation');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('quotation');
                                }
                        }?>