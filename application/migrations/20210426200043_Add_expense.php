<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_expense extends CI_Migration {

                                public function up(){
                                        $this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'employee_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint'=>'10'
                                                ),
                                                'date' => array(
                                                        'type' => 'DATETIME',
                                                        'default'=>date('Y-m-d H:i:s'),       
                                                ),
                                                'type' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                'description' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                'amount' => array(
                                                        'type' => 'INT',
                                                        'constraint' => '20',
                                                ),
                                                'expense_for' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '30',
                                                ),
                                                'expense_image' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '500',
                                                ),

                                                'org_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'branch_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
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
                                                        'default'=>1,
                                                ),
                                                
                                        ));     
                                        $this->dbforge->add_key('id', TRUE);
                                        $this->dbforge->create_table('expense');
                                }

                                public function down(){
                                        $this->dbforge->drop_table('expense');
                                }
                        }?>