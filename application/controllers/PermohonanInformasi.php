<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property config $config
 * @property load $load
 * @property template $template
 * @property upload $upload
 * @property input $input
 */

// API KE PPID PEMPROV
class PermohonanInformasi extends CI_Controller
{
    protected $baseUrlDev;
    protected $baseUrlProd;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->config->load('general');
        $this->baseUrlDev   = 'https://ppid.animemusic.us';
        $this->baseUrlProd  = 'https://ppid.jakarta.go.id';
    }

    public function index()
    {
        date_default_timezone_set('Asia/Bangkok');

        $data = array(
            'button'        => 'Kirim',
            'action'        => base_url('permohonaninformasi/store'),
        );

        $this->template->load('template2', 'permohonan-informasi/index', $data);
    }

    public function store()
    {
        date_default_timezone_set('Asia/Bangkok');

        //upload config 
        $config['upload_path']      = './upload/temp/'; //File di dalam folder ini ga apa apa di hapus, udah terkirim ke PPID PEMPROV
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = '0';
        $config['max_width']        = '0';
        $config['max_height']       = '0';
        $config['encrypt_name']     = true;

        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        if (!is_dir('upload')) {
            mkdir('./upload', 0777, true);
        }

        if ($this->upload->do_upload('upload_ktp')) {
            $ktpfile = curl_file_create($_FILES['upload_ktp']['tmp_name'], $_FILES['upload_ktp']['type'], $_FILES['upload_ktp']['name']);
        } else {
            $ktpfile = null;
        }

        if ($this->upload->do_upload('upload_akta_notaris')) {
            $aktafile = curl_file_create($_FILES['upload_akta_notaris']['tmp_name'], $_FILES['upload_akta_notaris']['type'], $_FILES['upload_akta_notaris']['name']);
        } else {
            $aktafile = null;
        }

        if ($this->upload->do_upload('upload_surat_kuasa')) {
            $skfile = curl_file_create($_FILES['upload_surat_kuasa']['tmp_name'], $_FILES['upload_surat_kuasa']['type'], $_FILES['upload_surat_kuasa']['name']);
        } else {
            $skfile = null;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrlProd . '/api/permohonan-wilayah/insert-permohonan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'id_kategori'                   => $this->input->post('id_kategori'),
                'nik_no_ktp'                    => $this->input->post('nik_no_ktp'),
                'upload_ktp'                    => $ktpfile,
                'nama_lengkap'                  => $this->input->post('nama_lengkap'),
                'alamat'                        => $this->input->post('alamat'),
                'email'                         => $this->input->post('email'),
                'pekerjaan'                     => $this->input->post('pekerjaan'),
                'no_telp'                       => $this->input->post('no_telp'),
                'rincian_informasi'             => $this->input->post('rincian_informasi'),
                'tujuan_penggunaan_informasi'   => $this->input->post('tujuan_penggunaan_informasi'),
                'memperoleh_informasi'          => $this->input->post('memperoleh_informasi'),
                'mendapatkan_salinan'           => $this->input->post('mendapatkan_salinan'),
                'cara_mendapatkan'              => $this->input->post('cara_mendapatkan'),
                'id_skpd'                       => $this->config->item('id_skpd_ppid_pemprov'), // ID skpd Dari PPID Pemprov
                'upload_akta_notaris'           => $aktafile,
                'upload_surat_kuasa'            => $skfile,
            ),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        print_r($response);
    }

    public function cekStatus()
    {
        date_default_timezone_set('Asia/Bangkok');

        $data = array(
            'action'        => base_url('permohonaninformasi/getstatus'),
        );

        $this->template->load('template2', 'permohonan-informasi/cek-status', $data);
    }

    public function getStatus()
    {
        $curl = curl_init();

        $data = [
            'nik_no_ktp'        => $this->input->post('nik_no_ktp'),
            'kode_permohonan'   => $this->input->post('kode_permohonan'),
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrlProd . '/api/permohonan-wilayah/cek-history-permohonan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
