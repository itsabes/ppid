<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property config $config
 * @property load $load
 * @property form_validation $form_validation
 * @property input $input
 * @property security $security
 * @property session $session
 * @property uri $uri
 * @property email $email
 * @property User_model $User_model
 */

class LupaPassword extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->config->load('general');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title']      = 'Silahkan masukan email';
            $data['email']      = $this->input->post('email');

            $this->load->view('auth/lupa_password', $data);
        } else {
            $email              = $this->input->post('email');
            $clean              = $this->security->xss_clean($email);
            $userInfo           = $this->User_model->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('error', 'Email address salah, silakan coba lagi.');
                redirect(site_url('lupaPassword'));
            }

            //build token   

            $token              = $this->User_model->insertToken($userInfo->id);
            $qstring            = $this->base64url_encode($token);
            $url                = site_url() . 'LupaPassword/reset_password/token/' . $qstring;
            $link               = '<a href="' . $url . '">' . $url . '</a>';

            $data = [
                'email'     => $userInfo->email,
                'link'      => $link,
            ];

            $message            = '';
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

            $this->sendEmail($data);
        }
    }

    public function reset_password()
    {
        $token                  = $this->base64url_decode($this->uri->segment(4));
        $cleanToken             = $this->security->xss_clean($token);
        $user_info              = $this->User_model->isTokenValid($cleanToken); //either false or array();

        if (!$user_info) {
            $this->session->set_flashdata('error', 'Token tidak valid atau kadaluarsa');
            redirect(site_url('login'), 'refresh');
        }

        $data = array(
            'title'             => 'Halaman Reset Password',
            'nama'              => $user_info->nama,
            'email'             => $user_info->email,
            'token'             => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/reset_password', $data);
        } else {
            $post                   = $this->input->post(NULL, TRUE);
            $cleanPost              = $this->security->xss_clean($post);
            $hashed                 = sha1($cleanPost['password']);
            $cleanPost['password']  = $hashed;
            $cleanPost['id_user']   = $user_info->id;

            unset($cleanPost['passconf']);
            if (!$this->User_model->updatePassword($cleanPost)) {
                $this->session->set_flashdata('error', 'Update password gagal.');
            } else {
                $this->session->set_flashdata('sukses', 'Password anda sudah  
                 diperbaharui. Silakan login.');
            }

            redirect(site_url('login'), 'refresh');
        }
    }

    public function sendEmail($data)
    {
        // Konfigurasi email
        $config = [
            'mailtype'      => $this->config->item('mailtype'),
            'charset'       => $this->config->item('charset'),
            'protocol'      => $this->config->item('protocol'),
            'smtp_host'     => $this->config->item('smtp_host'),
            'smtp_user'     => $this->config->item('smtp_user'),  // Alamat email
            'smtp_pass'     => $this->config->item('smtp_pass'),  // Password email
            // 'smtp_crypto'   => 'ssl',
            'smtp_port'     => $this->config->item('smtp_port'),
            'crlf'          => "\r\n",
            'newline'       => "\r\n"
        ];

        if ($this->config->item('ssl') == 1) {
            $config['smtp_crypto'] = 'ssl';
        }

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from($config['smtp_user'], 'Noreply ' . $this->config->item('nama_pengirim'));

        // Email penerima
        $this->email->to($data['email']);

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject('Reset Password ' . $this->config->item('nama_pengirim'));

        // Isi email
        $this->email->message("<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui password anda.</strong><br>
        <strong>Silakan klik link di bawah ini :</strong><br><br>" . $data['link']);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->load->view('auth/cek_email');
        } else {
            $this->load->view('auth/lupa_password');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
