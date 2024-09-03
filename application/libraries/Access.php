<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Access
{
	public $user;

	function __construct()
	{
		$this->CI = &get_instance();

		$this->CI->load->helper('cookie');
		$this->CI->load->model('users_model');

		$this->users_model = &$this->CI->users_model;
	}


	/**
	 * proses login
	 * 0 = username tak ada
	 * 1 = sukses
	 * 2 = password salah
	 * @param unknown_type $username
	 * @param unknown_type $password
	 * @return boolean
	 */
	function login($username, $password)
	{
		$result = $this->users_model->get_login_info($username);
		if ($result) {
			$password = sha1($password);
			if ($password === $result->password) {
				$this->CI->session->set_userdata('logged_in', 'yes');
				$this->CI->session->set_userdata('user_id', $result->username);
				$this->CI->session->set_userdata('level', $result->level);
				$this->CI->session->set_userdata('nama', $result->nama);
				$this->CI->session->set_userdata('aplikasi', $result->aplikasi);
				$this->CI->session->set_userdata('organisasi', $result->IdOrganisasi);
				$this->CI->session->set_userdata('telp', $result->telp);
				$this->CI->session->set_userdata('uid', $result->id);
				$this->CI->session->set_userdata('email', $result->email);
				//$this->CI->session->set_userdata('foto',$result->Foto);
				return 1;
			} else {
				return 2;
			}
		}
		return 0;
	}

	/**
	 * cek apakah sudah login
	 * @return boolean
	 */
	function is_login()
	{
		return (($this->CI->session->userdata('user_id')) ? TRUE : FALSE);
	}

	/*
	 * 
	 */
	function cek_akses($kode_menu)
	{
		$level_cookie = $this->CI->session->userdata('level');
		if ($this->users_model->get_akses($kode_menu, $level_cookie) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function cek_akses_level($kode_menu, $level)
	{
		if ($this->users_model->get_akses($kode_menu, $level) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function get_username()
	{
		return $this->CI->session->userdata('user_id');
	}

	function get_nama()
	{
		return $this->CI->session->userdata('nama');
	}

	function get_level()
	{
		return $this->CI->session->userdata('level');
	}

	function get_aplikasi()
	{
		return $this->CI->session->userdata('aplikasi');
	}

	function get_organisasi()
	{
		return $this->CI->session->userdata('organisasi');
	}

	function telp()
	{
		return $this->CI->session->userdata('telp');
	}

	function get_uid()
	{
		return $this->CI->session->userdata('uid');
	}

	/*
	function get_foto(){
		return $this->CI->session->userdata('foto');
	} */

	/**
	 * logout
	 */
	function logout()
	{
		$this->CI->session->unset_userdata('logged_in');
		$this->CI->session->unset_userdata('user_id');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('aplikasi');
		$this->CI->session->unset_userdata('organisasi');
		$this->CI->session->unset_userdata('telp');
		$this->CI->session->unset_userdata('uid');
		//$this->CI->session->unset_userdata('foto');
	}
}
