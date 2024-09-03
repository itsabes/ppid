<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property Konfigurasi_model $Konfigurasi_model
 * @property access $access
 * @property template $template
 * @property session $session
 * @property form_validation $form_validation
 * @property input $input
 * @property upload $upload
 */

class Konfigurasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Konfigurasi_model');
        $this->load->library('form_validation');
    }

    // BASIC CONFIG
    public function index()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $konfig         = $this->Konfigurasi_model->listing();

            $data = array(
                'title'             => 'Data Konfigurasi',
                'disable'           => '',
                'button'            => 'Update',
                'action'            => site_url('konfigurasi/update'),
                'konfig'            => $konfig
            );

            $this->template->load('template', 'konfigurasi/index', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // MEDSOS CONFIG
    public function medsos()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $konfig         = $this->Konfigurasi_model->listing();

            $data = array(
                'title'             => 'Konfigurasi Medsos',
                'disable'           => '',
                'button'            => 'Update',
                'action'            => site_url('konfigurasi/update_medsos'),
                'konfig'            => $konfig
            );

            $this->template->load('template', 'konfigurasi/medsos', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // LOGO CONFIG
    public function logo()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $konfig         = $this->Konfigurasi_model->listing();

            $data = array(
                'title'             => 'Konfigurasi Logo',
                'disable'           => '',
                'button'            => 'Update',
                'action'            => site_url('konfigurasi/update_logo'),
                'konfig'            => $konfig
            );

            $this->template->load('template', 'konfigurasi/logo', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_konfigurasi'        => $this->input->post('id_konfigurasi', TRUE),
                'namaweb'               => $this->input->post('namaweb', TRUE),
                'singkatan'             => $this->input->post('singkatan', TRUE),
                'tagline'               => $this->input->post('tagline', TRUE),
                'tentang'               => $this->input->post('tentang', TRUE),
                'deskripsi'             => $this->input->post('deskripsi', TRUE),
                'email'                 => $this->input->post('email', TRUE),
                'telepon'               => $this->input->post('telepon', TRUE),
                'hp'                    => $this->input->post('hp', TRUE),
                'jam_operasional'       => $this->input->post('jam_operasional', TRUE),
                'keywords'              => $this->input->post('keywords', TRUE),
                'metatext'              => $this->input->post('metatext', TRUE),
                'responsivevoice'       => $this->input->post('responsivevoice', TRUE),
                'alamat'                => $this->input->post('alamat', TRUE),
                'google_map'            => $this->input->post('google_map', TRUE),
            );

            $this->Konfigurasi_model->edit($data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konfigurasi'));
        }
    }

    public function update_medsos()
    {
        $data = array(
            'id_konfigurasi'        => $this->input->post('id_konfigurasi', TRUE),
            'nama_website'          => $this->input->post('nama_website', TRUE),
            'website'               => $this->input->post('website', TRUE),
            'nama_facebook'         => $this->input->post('nama_facebook', TRUE),
            'facebook'              => $this->input->post('facebook', TRUE),
            'nama_twitter'          => $this->input->post('nama_twitter', TRUE),
            'twitter'               => $this->input->post('twitter', TRUE),
            'nama_instagram'        => $this->input->post('nama_instagram', TRUE),
            'instagram'             => $this->input->post('instagram', TRUE),
            'nama_youtube'          => $this->input->post('nama_youtube', TRUE),
            'youtube'               => $this->input->post('youtube', TRUE),
            'nama_tiktok'           => $this->input->post('nama_tiktok', TRUE),
            'tiktok'                => $this->input->post('tiktok', TRUE),
        );

        $this->Konfigurasi_model->edit($data);

        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('konfigurasi/medsos'));
    }

    public function update_logo()
    {
        $konfig         = $this->Konfigurasi_model->listing();

        //upload config 
        $config['upload_path']      = './upload/image/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = '0';
        $config['max_width']        = '0';
        $config['max_height']       = '0';
        $config['encrypt_name']     = true;

        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        if (!is_dir('upload')) {
            mkdir('./upload', 0777, true);
        }

        // LOGO
        if ($this->upload->do_upload('logo')) {
            $up_data1       = $this->upload->data();
            $logo           = $up_data1['file_name'];

            if ($konfig->logo) {
                unlink('./upload/image/' . $konfig->logo);
            }

            $data['logo']   = $logo;
        }

        // ICON
        if ($this->upload->do_upload('icon')) {
            $up_data2       = $this->upload->data();
            $icon           = $up_data2['file_name'];

            if ($konfig->icon) {
                unlink('./upload/image/' . $konfig->icon);
            }

            $data['icon']   = $icon;
        }

        $data['id_konfigurasi']     = $this->input->post('id_konfigurasi', TRUE);

        $this->Konfigurasi_model->edit($data);

        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('konfigurasi/logo'));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namaweb', 'Nama Website', 'required');
        $this->form_validation->set_rules('singkatan', 'Singkatan', 'required');
        $this->form_validation->set_rules('tagline', 'Tagline', 'required');
        $this->form_validation->set_rules('tentang', 'Tentang', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('metatext', 'Metatext', 'required');
        $this->form_validation->set_rules('responsivevoice', 'Kode Responsive Voice', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('google_map', 'Google Map', 'required');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
