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
		$query = $this->db->query("SELECT a.id, a.username, a.password, a.nama, a.email, a.level, a.aplikasi, a.IdOrganisasi, a.IdSeksi, a.telp from user a
								   WHERE a.username='$username'");
		return ($query->num_rows() > 0) ? $query->row() : FALSE;
	}

	// LIBRARIES TEMPLATE
	function get_menu($level)
	{
		$sql = 'SELECT user_menu.* FROM user_akses INNER JOIN user_menu 
				ON (user_akses.kode_menu = user_menu.kode) WHERE 
				user_akses.level="' . $level . '" AND user_menu.tipe="0" 
				ORDER BY user_menu.urutan';
		$result = $this->db->query($sql);

		$menu = '';
		$menu_child = '';

		if ($result->num_rows() > 0) {
			foreach ($result->result() as $parent) {
				$li_parent = '';

				$sql = 'SELECT user_menu.* FROM user_akses INNER JOIN user_menu 
						ON (user_akses.kode_menu = user_menu.kode) WHERE 
						user_akses.level="' . $level . '" AND user_menu.tipe="1" AND parent="' . $parent->kode . ' "
						ORDER BY user_menu.urutan';
				$result_child = $this->db->query($sql);
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
		$sql = 'SELECT COUNT(*) AS hasil FROM user_akses WHERE
				user_akses.kode_menu="' . $kode_menu . '" AND user_akses.level="' . $level_cookie . '"';
		$hasil = $this->db->query($sql)->row()->hasil;

		return $hasil;
	}

	/**
	 * Change Password (LIBRARIES ION AUTH MODEL)
	 * 
	 */
	function change_password($username, $password)
	{
		$sql = 'UPDATE `user`SET password=SHA1("' . $password . '") WHERE username="' . $username . '"';
		$this->db->query($sql);
	}

	// DASHBOARD
	function get_user_count($username, $password)
	{
		$sql = 'SELECT COUNT(*) AS hasil FROM `user` WHERE username="' . $username . '" AND password=SHA1("' . $password . '")';
		$query = $this->db->query($sql);
		return $query->row()->hasil;
	}

	/**
	 * Pengaturan User
	 */

	function save_user($username, $nama, $alamat, $telp, $level, $password)
	{
		$sql = 'INSERT INTO user (`username`,`nama`,`alamat`,`telp`,`level`,`password`) VALUES
				("' . $username . '", "' . $nama . '", "' . $alamat . '", "' . $telp . '", "' . $level . '", SHA1("' . $password . '"))';
		$this->db->query($sql);
	}

	function delete_user($username)
	{
		$sql = 'DELETE FROM user WHERE username="' . $username . '"';
		$this->db->query($sql);
	}

	function update_user($username, $nama, $alamat, $telp)
	{
		$sql = 'UPDATE user SET `nama`="' . $nama . '",`alamat`="' . $alamat . '",`telp`="' . $telp . '" WHERE `username`="' . $username . '"';
		$this->db->query($sql);
	}

	function get_users($start, $rows, $search)
	{
		$sql = 'SELECT * FROM user WHERE (username LIKE "%' . $search . '%" OR 
		nama LIKE "%' . $search . '%") AND username!="admin" ORDER BY nama ASC LIMIT ' . $start . ',' . $rows;
		return $this->db->query($sql);
	}

	function get_users_count($search)
	{
		$sql = 'SELECT COUNT(*) AS hasil FROM user WHERE (username LIKE "%' . $search . '%" OR 
		nama LIKE "%' . $search . '%") AND username!="admin"';
		return $this->db->query($sql);
	}
}
