<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_client extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_zakat');


	}

	public function index()
	{
		$this->cek_server();	

		$data  = array(
						"title" => "Pencatatan Zakat",
						"data_muzaki" => $this->m_zakat->transaksi_join('DESC')->result(),				
						"zakat" => $this->m_zakat->get_all('zakat')->result()
					);

		$this->template->template_client('client/pencatatan_zakat', $data);
	}

	public function simpan_zakat()
	{
		$this->cek_server();
		$id_muzaki = $this->m_zakat->auto_number('muzaki', 'id_muzaki', 0, '');
		$cek_periode = $this->m_zakat->cari('periode', 'periode', date('Y'))->row();
		
		$record_muzakki = array('id_muzaki'=>$id_muzaki, 'nama_muzaki' => $this->input->post('nama'));

		$this->m_zakat->insert_data('muzaki', $record_muzakki);

		$record = array(
							'id_transaksi' => '',
							'id_muzaki' => $id_muzaki,
							'id_zakat' => $this->input->post('jenis_zakat'),
							'nominal' => $this->input->post('nominal'),
							'id_periode' => $cek_periode->id_periode,
							'waktu' => date('Y-m-d H:i:s')
						);

		$this->m_zakat->insert_data('transaksi', $record);

		$this->session->set_flashdata('alert-success', '<div class="alert alert-success"><i class="fa fa-info"></i> Data berhasil di input</div>');
		redirect('pencatatan-zakat','refresh');

	}

	/**
	 * Data Muzakki
	 */
	public function data_muzaki()
	{
		$this->cek_server();
		$data = array(
						"title" => "Data Muzakki",
						"muzaki" => $this->m_zakat->get_all('muzaki')->result()
					);

		$this->template->template_client('client/data_muzaki', $data);
	}

	public function hapus_muzaki()
	{
		$this->cek_server();
		$id = $this->input->post('kode');

		$this->m_zakat->delete_data('transaksi', 'id_muzaki', $id);	
		$this->m_zakat->delete_data('muzaki', 'id_muzaki', $id);
	}

	//End Muzaki
	
	/**
	 * Data Mustahiq
	 */
	public function data_mustahiq()
	{
		$this->cek_server();
		$data = array(
						"title" => "Data Mustahiq",
						"data_mustahiq" => $this->m_zakat->get_all('mustahiq')->result()
					);
		$this->template->template_client('client/data_mustahiq', $data);
	}

	public function simpan_mustahiq()
	{
		$this->cek_server();
		$record  = array(
							'id_mustahiq' => '',
							'mustahiq' => $this->input->post('mustahiq'),
							'keterangan' => $this->input->post('keterangan')
						);
		$this->m_zakat->insert_data('mustahiq', $record);
	}

	public function hapus_mustahiq()
	{
		$this->cek_server();
		$this->m_zakat->delete_data('mustahiq', 'id_mustahiq', $this->input->post('kode'));
	}

	//END Mustahiq

	/**
	 * Data Statistik
	 */

	public function statistik()
	{
		$this->cek_server();
		$data = array(
						"title" => "Data Statistik",
						"jumlah_orang_zakat_fitrah" => $this->m_zakat->jumlah_orang_zakat(),
						"jumlah_zakat" => $this->m_zakat->jumlah_zakat(),
						"jumlah_orang_infaq" => $this->m_zakat->jumlah_orang_infaq(),
						"jumlah_infaq" => $this->m_zakat->jumlah_infaq(),
						"jumlah_mutahiq" => $this->m_zakat->jumlah_mustahiq()
					);

		$this->template->template_client('client/statistik', $data);
	}


	public function aplikasi_nonaktif()
	{
		$this->cek_server_aktif();
		$data['title'] = "Aplikasi Nonaktif";

		$this->template->basic_template('client/aplikasi_nonaktif', $data);
	}

	public function cek_server()
	{
		$cek = $this->m_zakat->get_id('server', 'id_server', '1')->row();
		if ($cek->status == '0') 
		{
			redirect('aplikasi-nonaktif','refresh');
		}
	}

	public function cek_server_aktif()
	{
		$cek = $this->m_zakat->get_id('server', 'id_server', '1')->row();
		if ($cek->status == '1') 
		{
			redirect('pencatatan-zakat','refresh');
		}	
	}

	/**
	 * Statisti Realtime 
	 */

	public function realtime()
	{
		$data['title'] = "Statistik Realtime";

		$this->template->basic_template('client/realtime', $data);
	}

	public function load_data()
	{

		$jumlah_orang_zakat_fitrah = $this->m_zakat->jumlah_orang_zakat()->jumlah;
		$jumlah_zakat = $this->m_zakat->jumlah_zakat()->jumlah;
		$jumlah_orang_infaq = $this->m_zakat->jumlah_orang_infaq()->jumlah;
		$jumlah_infaq = $this->m_zakat->jumlah_infaq()->jumlah;

		$data = array(
						"zakat" => $jumlah_zakat." Kg",
						"infaq" => "Rp. ".number_format($jumlah_infaq,0,',','.').",-",
						"orang_zakat" => $jumlah_orang_zakat_fitrah,
						'orang_infaq' => $jumlah_orang_infaq,
						'kwintal' 	  => ($jumlah_zakat/100)." Kwintal"
					);

		echo json_encode($data);
	}


	public function cetak_mustahiq()
	{
		$this->cek_server();

		$data = array(
						"title" => "Cetak Data Mustahiq",
						"mustahiq" => $this->m_zakat->get_all('mustahiq')->result()
					);

		$this->load->view('client/cetak_mustahiq', $data);

		$output = $this->output->get_output();

		$pixel = 37.795276;

		$this->cetak->load_html($output);
		$this->cetak->set_paper('letter', 'potrait');
		$this->cetak->render();
		$this->cetak->stream('cetak_mustahiq.pdf', array('Attachment' => 0));
	}

	public function cetak_zakat()
	{
		$this->cek_server();

		$data = array(
						"title" => "Cetak Pencatatan Zakat",
						"zakat" => $this->m_zakat->transaksi_join('ASC')->result()
					);

		$this->load->view('client/cetak_zakat', $data);

		$html  = $this->output->get_output();

		$this->cetak->load_html($html);
		$this->cetak->set_paper('letter', 'potrait');
		$this->cetak->render();
		$this->cetak->stream('cetak_zakat.pdf', array('Attachment'=>0));
	}

}

/* End of file  */
/* Location: ./application/controllers/ */