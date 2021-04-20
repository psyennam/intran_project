<?php defined('BASEPATH') OR exit('No direct script access allowed');
        class Migration_Add_language extends CI_Migration {

        public function up(){
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'auto_increment' => TRUE
                        ),
                        '__key' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique'=>true,
                        )           
                ));     
                $this->dbforge->add_key('id', TRUE);
                if($this->dbforge->create_table('language')){
                        $this->dbforge->add_field(array(
                                'id' => array(
                                        'type' => 'INT',
                                        'auto_increment' => FALSE
                                ),
                                '__value' => array(
                                        'type' => 'VARCHAR',
                                        'constraint' => '100',
                                
                                ),
                                '__lang' => array(
                                        'type' => 'VARCHAR',
                                        'constraint' => '5'    
                                ),
                        ));
                        
                        $this->dbforge->create_table('mapping_language');
                }
        }

        public function down(){
                if($this->dbforge->drop_table('mapping_language')){
                        $this->dbforge->drop_table('language');
                }
        }
}?>