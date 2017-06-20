<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faker
{
	protected $ci;

	public function __construct()
	{
        
        $this->ci =& get_instance();
		
		$this->ci = Faker\Factory::create("id_ID");

	}	

}

/* End of file libraryName.php */
/* Location: ./application/libraries/libraryName.php */
