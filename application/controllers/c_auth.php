<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_zakat');
	}

	public function index()
	{
		$data  = array(
					    "title" => "Panel Login",
					  );

		$this->template->basic_template('server/login_server', $data);
	}

	public function auth()
	{
		$username = $this->input->post('username');
		$password  = md5($this->input->post('password'));
	
		$cek = $this->m_zakat->login($username, $password);

		if ($cek->num_rows() > 0) 
		{
			$r = $cek->row();

			$array = array(
				'login_server' => true,
				'username' => $username,				 
			);
			
			$this->session->set_userdata($array);

			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	public function login_success()
	{
		$data['title'] = "Login server berhasil";

		$this->template->basic_template('server/login_sukses', $data);	
	}

	public function logout()
	{
		$this->session->unset_userdata('login_server');
		$this->session->unset_userdata('username');

		redirect('login_server','refresh');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */