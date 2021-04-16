<?php defined('BASEPATH') OR exit('No direct script access allowed');
        class Migration_Add_product extends CI_Migration {

        public function up(){
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'auto_increment' => TRUE
                        ),
                        'product_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'unique'=>true,
                        ),
                        'org_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'company'=>array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ),
                        'product_type' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ),
                        'description' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'price' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                        ),
                        'distributor_price' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                        ),
                        'weight' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                        ),
                        'GST' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                        ),
                        'information' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'product_image' => array(
                                'type' => 'text',
                        ),
                        'product_document' => array(
                                'type' => 'text',
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
                                'default'=>0,
                        ),
                        
                ));     
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('product');
        }

        public function down(){
                $this->dbforge->drop_table('product');
        }
}?>