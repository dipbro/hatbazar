<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Status extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		public function up()
        {
                $this->dbforge->add_field(array(
                        'StatusId' => array(
                                'type' => 'INT',
                              //  'constraint' => 5,
                                //'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'StatusName' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                        ),
                ));
                $this->dbforge->add_key('StatusId', TRUE);
                $this->dbforge->create_table('Status');
        }

        public function down()
        {
                $this->dbforge->drop_table('blog');
        }
		
	}

	public function down() {
		
	}

}

/* End of file 001_status.php */
/* Location: ./application/migrations/001_status.php */