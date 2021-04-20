<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
        function new($file){
                $this->load->helper('file');
                $data = "<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_".$file." extends CI_Migration {

                                public function up(){
                                        \$this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'employee_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                        'unique'=>true,
                                                ),
                                                'org_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'role_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'department_code' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'designation_code' => array(
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
                                                        'default'=>0,
                                                ),
                                                
                                        ));     
                                        \$this->dbforge->add_key('id', TRUE);
                                        \$this->dbforge->create_table('".str_replace('Add_', '', $file)."');
                                }

                                public function down(){
                                        \$this->dbforge->drop_table('".str_replace('Add_', '', $file)."');
                                }
                        }?>";
                
                if ( ! write_file(APPPATH.'/migrations/'.date('YmdHis').'_'.$file.'.php', $data))
                {
                        echo 'Unable to write the file';
                }
                else
                {
                        echo 'File written!';
                }
        }

        public function run()
        {
                $this->load->library('migration');

                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
                else
                {
                	echo "Migration run successfully";
                }
        }

}
?>