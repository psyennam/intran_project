<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_modify_column extends CI_Migration {

                                public function up(){
                                        $fields = array(
                                         'employee_id' => array(
                                        'name' => 'employee_code',
                                        'type' => 'VARCHAR',
                                        'constraint'=>'10',
                                        'NULL'=>false,
                                                ),
                                        );
                                $this->dbforge->modify_column('mapping_employee', $fields);
                                }

                                public function down(){
                                        $fields = array(
                                         'employee_code' => array(
                                        'name' => 'employee_id',
                                        'type' => 'INT',
                                        'NULL'=>false,
                                                ),
                                        );
                                        $this->dbforge->modify_column('mapping_employee', 'employee_id');

                                       // $this->dbforge->drop_table('modify_column');
                                }
                        }?>