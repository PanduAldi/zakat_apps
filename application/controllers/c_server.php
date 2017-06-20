<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_server extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_zakat');
	
		if ($this->session->userdata('login_server') == false) 
		{
			redirect('login_server','refresh');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['cek_server'] = $this->m_zakat->get_id('server', 'id_server', '1')->row();

		$this->template->template_server('server/dashboard', $data);

	}

	public function control_room()
	{
		$data = array(
						"title" => "Control Server",
					);

		$this->template->template_server('server/control_room', $data);
	}

	public function aktif_aplikasi()
	{
		$tahun  = date('Y');
		$cek_periode = $this->db->query("SELECT * FROM periode WHERE periode LIKE '%$tahun%'")->num_rows();

		if ($cek_periode == 0) 
		{
			$this->m_zakat->insert_data('periode', array('id_periode'=>'', 'periode'=>$tahun));
			$this->m_zakat->update_data('server', array('status'=>'1', 'mulai' => date('Y-m-d H:i:s')), 'id_server', '1');
			echo "Status=>OK";
		}
		else
		{
			$this->m_zakat->update_data('server', array('status'=>'1', 'akhir' => date('Y-m-d H:i:s')), 'id_server', '1');
			echo "Status=>OK";	
		}
	}

	public function nonaktif_aplikasi()
	{
		$this->m_zakat->update_data('server', array('status'=>'0'), 'id_server', '1');
	}


	/**
	 * DATA MUZAKI
	 */
	public function data_muzaki()
	{
		$data = array(
						"title" => "Data Muzaki",
						"muzaki" => $this->m_zakat->get_all('muzaki')
					);
	
		$this->template->template_server('server/data_muzaki', $data);
		
	}



}

/* End of file  */
/* Location: ./application/controllers/ */