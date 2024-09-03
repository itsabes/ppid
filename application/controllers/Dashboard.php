<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Formulir_model $Formulir_model
 */

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('Formulir_model');
	}

	// DASHBOARD AFTER LOGIN
	function index()
	{
		if (
			$this->session->userdata('logged_in') != "" &&
			$this->session->userdata('level') !== "pemohon"
		) {
			$data['app'] 						= $this->access->get_aplikasi();

			$this->template->load('template', 'dashboard', $data);
		} else if (
			$this->session->userdata('logged_in') != "" &&
			$this->session->userdata('level') === "pemohon"
		) {
			$email				= $this->session->userdata('email');
			$id_user			= $this->session->userdata('uid');
			$formulir			= $this->Formulir_model->get_by_user($id_user);

			$data = array(
				'formulir_data' => $formulir,
				'email'			=> $email,
			);

			$this->template->load('template', 'formulir/list_pemohon', $data);
		} else {
			header('location:' . base_url() . '');
		}
	}

	public function currMenu()
	{
		$cMenu = $this->input->post("idMenu");

		if (isset($cMenu)) {
			$this->unSetMenu();
			$this->activeMenu($cMenu);
			//$this->session->set_userdata('m2', 'active');
		} else {
			//$this->unSetMenu();
			echo "not set - " . $cMenu;
		}
	}

	public function activeMenu($sMenu)
	{
		$this->unSetMenu();

		$parent = $this->db->query("select is_parent from menu where id=" . $sMenu)->row()->is_parent;
		$sHMenu = "m" . $parent;
		//$sHMenu = "m".substr($sMenu, 0, 3)."0";
		$sItmMenu = "m" . $sMenu;

		$this->session->set_userdata($sHMenu, 'active');
		$this->session->set_userdata($sItmMenu, 'active');
	}

	public function unSetMenu()
	{
		$menu = $this->db->query("select * from menu")->result();
		foreach ($menu as $menus) {
			$menus = "m" . $menus->id;
			$this->session->set_userdata($menus, '');
		}
	}
}
