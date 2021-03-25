
<?php

class Migrate extends CI_Controller
{

        function new($file){
                $this->load->helper('file');
                $data = "<?php defined('BASEPATH') OR exit('No direct script access allowed');
                                class Migration_Add_organisation extends CI_Migration {

                                public function up(){
                                        \$this->dbforge->add_field(array(
                                                'id' => array(
                                                        'type' => 'INT',
                                                        'auto_increment' => TRUE
                                                ),
                                                'clientid' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'branchid' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '10',
                                                ),
                                                'createddate' => array(
                                                        'type' => 'DATETIME',
                                                        'default'=>date('Y-m-d H:i:s'),        
                                                ),
                                                'ipaddress' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '20',
                                                ),
                                                'status' => array(
                                                        'type' => 'VARCHAR',
                                                        'constraint' => '15',
                                                        'default'=>'Active'
                                                ),
                                                
                                        ));     
                                        \$this->dbforge->add_key('id', TRUE);
                                        \$this->dbforge->create_table('".str_replace('Add_', '', $file)."');
                                }

                                public function down(){
                                        \$this->dbforge->drop_table('".str_replace('Add_', '', $file)."');
                                }
                        }?>";
                
                if ( ! write_file(APPPATH.'/migrations/'.time().'_'.$file.'.php', $data))
                {
                        echo 'Unable to write the file';
                }
                else
                {
                        echo 'File written!';
                }
        }

        public function abc()
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