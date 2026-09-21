<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	// LIBRARIES ACCESS
	function get_login_info($username)
	{
		//$this->db->where('username',$username);
		//$this->db->limit(1);
		//$query = $this->db->get('user');
		//$query = $this->db->query("select a.* from user a where a.username='$username'");
		/*$query = $this->db->query("SELECT a.id, a.username, a.password, a.nama, a.level, a.aplikasi, a.IdOrganisasi, a.IdSeksi, b.* from user a left join pegawai b on a.IdPegawai=b.IdPegawai
								   WHERE a.username='$username'"); */
		$this->db->select('id, username, password, nama, email, level, aplikasi, IdOrganisasi, IdSeksi, telp');
		$this->db->from('user');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row() : FALSE;
	}

	// LIBRARIES TEMPLATE
	function get_menu($level)
	{
		$this->db->select('user_menu.*');
		$this->db->from('user_akses');
		$this->db->join('user_menu', 'user_akses.kode_menu = user_menu.kode', 'inner');
		$this->db->where('user_akses.level', $level);
		$this->db->where('user_menu.tipe', '0');
		$this->db->order_by('user_menu.urutan', 'ASC');
		$result = $this->db->get();

		$menu = '';
		$menu_child = '';

		if ($result->num_rows() > 0) {
			foreach ($result->result() as $parent) {
				$li_parent = '';

				$this->db->select('user_menu.*');
				$this->db->from('user_akses');
				$this->db->join('user_menu', 'user_akses.kode_menu = user_menu.kode', 'inner');
				$this->db->where('user_akses.level', $level);
				$this->db->where('user_menu.tipe', '1');
				$this->db->where('user_menu.parent', $parent->kode);
				$this->db->order_by('user_menu.urutan', 'ASC');
				$result_child = $this->db->get();
				if ($result_child->num_rows() > 0) {
					$li_parent = 'class="treeview"';
					$menu_child = '<ul class="treeview-menu">';
					foreach ($result_child->result() as $child) {
						$menu_child = $menu_child . '<li><a href="' . site_url() . $child->url . '"><i class="' . $child->icon . '"></i> ' . $child->nama . '</a></li>';
					}
					$menu_child = $menu_child . '</ul>';
				}

				$menu = $menu . '
                            <li ' . $li_parent . '>
                                <a href="' . site_url() . $parent->url . '">
                                    <i class="' . $parent->icon . '"></i> <span>' . $parent->nama . '</span>
                                    ' . $menu_child . '
                                </a>
                            </li>';
			}
		}

		return $menu;
	}

	/*
	 * mendapatkan hak akses suatu menu (LIBRARIES ACCESS)
	 */
	function get_akses($kode_menu, $level_cookie)
	{
		$this->db->select('COUNT(*) AS hasil');
		$this->db->from('user_akses');
		$this->db->where('kode_menu', $kode_menu);
		$this->db->where('level', $level_cookie);
		$hasil = $this->db->get()->row()->hasil;

		return $hasil;
	}

	/**
	 * Change Password (LIBRARIES ION AUTH MODEL)
	 * 
	 */
	function change_password($username, $password)
	{
		$this->db->set('password', 'SHA1("' . $this->db->escape_str($password) . '")', FALSE);
		$this->db->where('username', $username);
		$this->db->update('user');
	}

	// DASHBOARD
	function get_user_count($username, $password)
	{
		$this->db->select('COUNT(*) AS hasil');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', 'SHA1("' . $this->db->escape_str($password) . '")', FALSE);
		$query = $this->db->get();
		return $query->row()->hasil;
	}

	/**
	 * Pengaturan User
	 */

	function save_user($username, $nama, $alamat, $telp, $level, $password)
	{
		$data = array(
			'username' => $username,
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $telp,
			'level' => $level
		);
		$this->db->set($data);
		$this->db->set('password', 'SHA1("' . $this->db->escape_str($password) . '")', FALSE);
		$this->db->insert('user');
	}

	function delete_user($username)
	{
		$this->db->where('username', $username);
		$this->db->delete('user');
	}

	function update_user($username, $nama, $alamat, $telp)
	{
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $telp
		);
		$this->db->where('username', $username);
		$this->db->update('user', $data);
	}

	function get_users($start, $rows, $search)
	{
		$this->db->group_start();
		$this->db->like('username', $search);
		$this->db->or_like('nama', $search);
		$this->db->group_end();
		$this->db->where('username !=', 'admin');
		$this->db->order_by('nama', 'ASC');
		$this->db->limit($rows, $start);
		return $this->db->get('user');
	}

	function get_users_count($search)
	{
		$this->db->select('COUNT(*) AS hasil');
		$this->db->from('user');
		$this->db->group_start();
		$this->db->like('username', $search);
		$this->db->or_like('nama', $search);
		$this->db->group_end();
		$this->db->where('username !=', 'admin');
		return $this->db->get();
	}
}
