<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_add_role extends CI_Migration {

public function up(){
        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'auto_increment' => TRUE
                ),
                'role' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                ),
                'role_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                        'unique'=>true,      
                ),
                'org_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',      
                ),
                'created_at' => array(
                        'type' => 'DATETIME',
                        'default'=>date('y-m-d H:i:s'),      
                ),
                'ip_address' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',      
                ),
                'status' => array(
                        'type' => 'BOOLEAN',
                        'default'=>'0',
                ),
                'branch_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',      
                ),
        ));     
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('role');
}

public function down(){
        $this->dbforge->drop_table('role');
}
}?>