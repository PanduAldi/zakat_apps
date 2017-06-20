<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_zakat extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($table)
	{
		return $this->db->get($table);
	}

	public function get_id($table, $where, $id)
	{
		$this->db->where($where, $id);
		return $this->db->get($table);

	}

	public function insert_data($table, $record)
	{
		$this->db->insert($table, $record);
	}

	public function update_data($table, $record, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->update($table, $record);
	}

	public function delete_data($table, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->delete($table);
	}

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user');
	}

	public function cari($table, $where, $like)
	{
		$this->db->like($where, $like);
		return $this->db->get($table);	
	}

	public function transaksi_join($asc)
	{
		$this->db->from("transaksi");
		$this->db->join('muzaki', 'muzaki.id_muzaki = transaksi.id_muzaki');
		$this->db->join('zakat', 'zakat.id_zakat = transaksi.id_zakat');
		$this->db->join('periode', 'periode.id_periode = transaksi.id_periode');
		$this->db->order_by('id_transaksi', $asc);
		return $this->db->get();
	}

	public function jumlah_zakat()
	{
		$this->db->select('SUM(nominal) AS jumlah');
		$this->db->from('transaksi');
		$this->db->where('id_zakat', '1');
		return $this->db->get()->row();
	}

	public function jumlah_infaq()
	{
		$this->db->select('SUM(nominal) AS jumlah');	
		$this->db->from('transaksi');
		$this->db->where('id_zakat', '2');
		return $this->db->get()->row();
	}

	public function jumlah_orang_zakat()
	{
		$this->db->select('COUNT(nominal) AS jumlah');
		$this->db->from('transaksi');
		$this->db->where('id_zakat', '1');
		return $this->db->get()->row();	
	}

	public function jumlah_orang_infaq()
	{
		$this->db->select('COUNT(nominal) AS jumlah');	
		$this->db->from('transaksi');
		$this->db->where('id_zakat', '2');
		return $this->db->get()->row();		
	}

	public function jumlah_mustahiq()
	{
		
	}

	public function get_periode($table, $periode)
	{
		$this->db->where('id_periode', $periode);
		return $this->db->get($table);
	}

	public function auto_number($table, $kolom, $lebar=0, $awalan=null)
	{
		$this->db->select($kolom);
		$this->db->limit(1);
		$this->db->order_by($kolom, 'desc');
		$this->db->from($table);
		$query = $this->db->get();

		$row = $query->result_array();
		$cek = $query->num_rows();

		if ($cek == 0)
			$nomor = 1;
		else
		{
			$nomor = intval(substr($row[0][$kolom], strlen($awalan)))+1;
		}

			if ($lebar > 0)
			{
				$result = $awalan.str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
			}
			else
			{
				$result = $awalan.$nomor;
			}

			return $result;
	}

}

/* End of file  */
/* Location: ./application/models/ */