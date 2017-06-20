 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Assets
 {
 	protected $ci;
 
 	public function __construct()
 	{
         $this->ci =& get_instance();
 	}

 	public function get($dir)
 	{
 		return "http://localhost/assets/".$dir;
 	}
 }
 
 /* End of file assets.php */
 /* Location: ./application/libraries/assets.php */
 