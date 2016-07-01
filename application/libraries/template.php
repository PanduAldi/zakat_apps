<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function basic_template($template, $data=null)
	{
		$data['content'] = $this->ci->load->view($template, $data, true);
		$this->ci->load->view('template/basic_template', $data);
	}

	public function template_server($template, $data=null)
	{
		$data = array(
						"content" => $this->ci->load->view($template, $data, true)
					);
		$this->ci->load->view('template/base_server', $data);
	}

	public function template_client($template, $data=null)
	{
		$data = array(
						"content" => $this->ci->load->view($template, $data, true)
					);
		$this->ci->load->view('template/base_client', $data);
	}
	
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
