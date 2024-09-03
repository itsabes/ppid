<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property load $load
 * @property access $access
 * @property form_validation $form_validation
 * @property session $session
 * @property cart $cart
 * @property input $input
 * @property db $db
 * @property User_model $User_model
 */

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	// HALAMAN FORM LOGIN
	public function index()
	{
		$this->load->helper('form');
		$data['title'] = 'Halaman Login';
		if (!$this->access->is_login()) {
			$this->load->view('auth/login', $data);
		} else {
			redirect('dashboard');
		}
	}

	// PROSES LOGIN
	function login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|strip_tags');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$this->form_validation->set_rules('token', 'token', 'callback_check_login');
			if ($this->form_validation->run() == FALSE) {
				//Jika login gagal
				$status['status'] = 0;
				$status['error'] = validation_errors();
			} else {
				//Jika sukses
				$status['status'] = 1;
			}
		} else {
			//Jika form validasi gagal
			$status['status'] = 0;
			$status['error'] = validation_errors();
		}

		echo json_encode($status);
	}

	// PROSES LOGOUT
	function logout()
	{
		$this->access->logout();
		$this->session->sess_destroy();
		$this->cart->destroy();
		redirect('auth');
	}

	function check_login()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$login = $this->access->login($username, $password);
		if ($login == 1) {
			return TRUE;
		} else if ($login == 2) {
			$this->form_validation->set_message('check_login', 'Password yang dimasukkan salah');
			return FALSE;
		} else {
			$this->form_validation->set_message('check_login', 'Username yang dimasukkan tidak dikenal');
			return FALSE;
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|strip_tags');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required|is_numeric|strip_tags');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|strip_tags');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|strip_tags');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	// HALAMAN FORM REGISTER
	public function register_pemohon()
	{
		if (!$this->access->is_login()) {
			$data = array(
				'button' 			=> 'Create',
				'username' 			=> set_value('username'),
				'nama' 				=> set_value('nama'),
				'telp' 				=> set_value('telp'),
				'email'				=> set_value('email'),
				'password' 			=> set_value('password')
			);
			$this->load->view('auth/register', $data);
		} else {
			redirect('dashboard');
		}
	}

	// PROSES REGISTER
	public function register_action()
	{
		date_default_timezone_set('Asia/Bangkok');

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->register_pemohon();
		} else {
			$data = array(
				'username' 			=> $this->input->post('username', TRUE),
				'nama' 				=> $this->input->post('nama', TRUE),
				'telp' 				=> $this->input->post('telp', TRUE),
				'email'				=> $this->input->post('email', TRUE),
				'password' 			=> sha1($this->input->post('password', TRUE)),
				'level' 			=> 'pemohon'
			);
			$this->db->set('id', 'UUID()', FALSE);
			$this->User_model->insert($data);

			$this->session->set_flashdata('message', 'Registrasi Berhasil, Silahkan login!!');
			redirect(site_url('login'));
		}
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */