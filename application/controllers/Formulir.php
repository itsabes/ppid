<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property session $session
 * @property load $load
 * @property Formulir_model $Formulir_model
 * @property Formulir_History_model $Formulir_History_model
 * @property Bidang_model $Bidang_model
 * @property Konfigurasi_model $Konfigurasi_model
 * @property access $access
 * @property db $db
 * @property template $template
 * @property input $input
 * @property upload $upload
 * @property form_validation $form_validation
 * @property image_lib $image_lib
 * @property config $config
 * @property email $email
 */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Formulir extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya

    function __construct()
    {
        parent::__construct();
        $this->load->model('Formulir_model');
        $this->load->model('Formulir_History_model');
        $this->load->model('Bidang_model');
        $this->load->model('Konfigurasi_model');
        $this->load->library('form_validation');
        $this->config->load('general');
    }


    // ==========================PERMOHONAN PENELITIAN=============================== //


    // LISTING FORMULIR ADMIN DAN OPERATOR
    public function index()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $formulir       = $this->Formulir_model->get_all_query();

            $data = array(
                'formulir_data'     => $formulir
            );

            $this->template->load('template', 'formulir/list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function get_permohonan_filter()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $Tujuan         = $_POST['Tujuan'];

            if ($Tujuan == 'semua') {
                $formulir_data      = $this->Formulir_model->get_all_query();
            } else {
                $formulir_data      = $this->Formulir_model->get_filter_query($Tujuan);
            }

            $data = array(
                'formulir_data'     => $formulir_data
            );

            return $this->load->view('formulir/list_filter', $data);
        }
    }

    public function response_list()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator" or $this->session->userdata('level') == "sekpim" or $this->session->userdata('level') == "ctu_bid")
        ) {
            $formulir       = $this->Formulir_model->get_all_query3();
            $bidang         = $this->db->query('select * from bidang order by Bidang');

            $data = array(
                'organisasi_sess'       => $this->access->get_organisasi(),
                'data_bidang'           => $bidang,
                'formulir_data'         => $formulir,
            );

            if (!empty($this->access->get_organisasi())) {
                $data['data_seksi']         = $this->db->query("select * from seksi where IdBidang=" . $this->access->get_organisasi() . " order by Seksi");
            } else {
                $data['data_seksi']         = $this->db->query("select * from seksi order by Seksi");
            }

            $this->template->load('template', 'formulir/response_list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // ACTION UNTUK PETUGAS MEMBERI RESPONSE
    public function store_response($value = '')
    {
        date_default_timezone_set('Asia/Bangkok');

        $konfigurasi    = $this->Konfigurasi_model->listing();
        $post           = $this->input->post();
        $id_formulir    = $post['IdFormulir'];
        $formulir       = $this->Formulir_model->get_by_id($id_formulir);

        // RESPONSE JAWABAN
        if (!empty($post['Response'])) {
            $data['Response']       = $post['Response'];
            $data['ResponseDate']   = date("Y-m-d h:i:sa");
            $data['ResponseUser']   = $this->access->get_uid();

            if ($post['Response'] != $formulir->Response) {
                $history = array(
                    'id_formulir'               => $id_formulir,
                    'id_user'                   => $this->session->userdata('uid'),
                    'status'                    => 8,
                );
                $this->Formulir_History_model->insert($history);

                $dataEmail = array(
                    'email'                     => $formulir->Email,
                    'message'                   => 'Permohonan data anda telah mendapat respon jawaban dari ' . $konfigurasi->namaweb . '. Silahkan login Sistem ' . $konfigurasi->namaweb . ' untuk melihat respon jawaban'
                );

                $this->sendEmail($dataEmail);
            }
        }

        // DISPOSISI BIDANG
        if (!empty($post['Disposisibid'])) {
            $data['Disposisibid']   = $post['Disposisibid'];
            $data['Status']         = 4;

            if ($post['Disposisibid'] != $formulir->Disposisibid) {
                $bidang = $this->Bidang_model->get_by_id($post['Disposisibid']);

                $history = array(
                    'id_formulir'               => $id_formulir,
                    'id_user'                   => $this->session->userdata('uid'),
                    'status'                    => 4,
                    'keterangan'                => $bidang->Bidang
                );

                $this->Formulir_History_model->insert($history);

                $dataEmail = array(
                    'email'                     => $formulir->Email,
                    'message'                   => 'Permohonan data anda telah di disposisi ke ' . $bidang->Bidang . '. Silahkan login Sistem ' . $konfigurasi->namaweb . ' untuk melihat respon jawaban'
                );

                $this->sendEmail($dataEmail);
            }
        }

        // DISPOSISI SEKSI
        if (!empty($post['Disposisi'])) {
            $data['Disposisi']      = $post['Disposisi'];
        }

        // STATUS
        if (!empty($post['status'])) {
            $data['Status']     = $post['status'];

            if ($post['status'] != $formulir->Status) {
                if ($post['status'] == 2) {
                    $status = 'Diubah menjadi revisi ';
                } else {
                    $status = status_permohonan($post['status']);
                }

                $history = array(
                    'id_formulir'               => $id_formulir,
                    'id_user'                   => $this->session->userdata('uid'),
                    'status'                    => $post['status'],
                );
                $this->Formulir_History_model->insert($history);

                $dataEmail = array(
                    'email'                     => $formulir->Email,
                    'message'                   => 'Permohonan data anda telah ' . $status . '. Silahkan login Sistem ' . $konfigurasi->namaweb . ' untuk melihat respon jawaban'
                );

                $this->sendEmail($dataEmail);
            }
        }

        $config['upload_path']      = './upload/formulir/';
        $config['allowed_types']    = 'jpeg|jpg|png|pdf|xls|xlsx|doc|docx';
        $config['max_size']         = '0';
        $config['max_width']        = '0';
        $config['max_height']       = '0';

        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        if (!is_dir('upload')) {
            mkdir('./upload', 0777, true);
        }

        // FILE JAWABAN
        if ($this->upload->do_upload('UploadJawaban')) {
            $up_data1       = $this->upload->data();

            $upl_data       = $up_data1['file_name'];
        } else {
            $upl_data       = "";
        }

        if (!$upl_data == "") {
            $data['UploadJawaban']  = $upl_data;

            if ($upl_data != $formulir->UploadJawaban) {
                $history = array(
                    'id_formulir'               => $id_formulir,
                    'id_user'                   => $this->session->userdata('uid'),
                    'status'                    => 9,
                );
                $this->Formulir_History_model->insert($history);

                $dataEmail = array(
                    'email'                     => $formulir->Email,
                    'message'                   => 'Permohonan data anda telah di berikan Respon File Jawaban. Silahkan login Sistem ' . $konfigurasi->namaweb . ' untuk melihat respon jawaban'
                );

                $this->sendEmail($dataEmail);
            }
        }

        $this->db->where('IdFormulir', $id_formulir)->update('formulir', $data);
        echo json_encode(['status' => true, 'msg' => 'Updated']);
    }

    public function get_respon_filter()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {

            $Tujuan         = $_POST['Tujuan'];

            if ($Tujuan == 'semua') {
                $formulir_data      = $this->Formulir_model->get_all_query3();
            } else {
                $formulir_data      = $this->Formulir_model->get_query3_filter($Tujuan);
            }

            $data = array(
                'formulir_data'         => $formulir_data
            );

            return $this->load->view('formulir/response_list_filter', $data);
        }
    }

    // HALAMAN FORMULIR UNTUK PEMOHON
    public function create()
    {
        if ($this->access->is_login()) {
            $data = array(
                'disable'                   => '',
                'button'                    => 'Kirim',
                'action'                    => site_url('formulir/create_action'),
                'IdFormulir'                => set_value('IdFormulir'),
                'Kategori'                  => set_value('Kategori'),
                'NIK'                       => set_value('NIK'),
                'Nama'                      => $this->session->userdata('nama'),
                'Alamat'                    => set_value('Alamat'),
                'Email'                     => $this->session->userdata('email'),
                'NoTelp'                    => $this->session->userdata('telp'),
                'Pekerjaan'                 => set_value('Pekerjaan'),
                'UploadPermohonan'          => set_value('UploadPermohonan'),
                'UploadKak'                 => set_value('UploadKak'),
                'UploadKartuIdentitas'      => set_value('UploadkartuIdentitas'),
                'UploadKeteranganKajiEtik'  => set_value('UploadKeteranganKajiEtik'),
                'UploadKuisioner'           => set_value('UploadKuisioner'),
                'UploadRekomPtsp'           => set_value('UploadRekomPtsp'),
                'UploadIzinRiset'           => set_value('UploadIzinRiset'),
                'UploadKeteranganDirjen'    => set_value('UploadKeteranganDirjen'),
                'UploadPernyataanHasil'     => set_value('UploadPernyataanHasil'),
                'RincianInformasi'          => set_value('RincianInformasi'),
                'TujuanInformasi'           => set_value('TujuanInformasi'),
                'CaraMemperoleh'            => set_value('CaraMemperoleh'),
                'Salinan'                   => set_value('Salinan'),
                'CaraDapatSalinan'          => set_value('CaraDapatSalinan'),
                'JudulPenelitian'           => set_value('JudulPenelitian'),
            );

            $this->template->load('template2', 'formulir/form', $data);
        } else {
            header('location:' . base_url('login') . '');
        }
    }

    // STORE UNTUK PEMOHON
    public function create_action()
    {
        if ($this->access->is_login()) {
            date_default_timezone_set('Asia/Bangkok');
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {

                //upload config 
                $config['upload_path']      = './upload/permohonan/';
                //$config['allowed_types']    = 'pdf|xls|xlsx|doc|docx';
                $config['allowed_types']    = 'pdf';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                $config['encrypt_name']     = true;

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if (!is_dir('upload')) {
                    mkdir('./upload', 0777, true);
                }

                // Upload Surat Permohonan
                if ($this->upload->do_upload('UploadPermohonan')) {
                    $up_data1 = $this->upload->data();

                    $upl_data = $up_data1['file_name'];
                } else {
                    $upl_data = null;
                }

                // Upload KAK/Proposal Penelitian
                if ($this->upload->do_upload('UploadKak')) {
                    $up_data2 = $this->upload->data();

                    $upl_kak = $up_data2['file_name'];
                } else {
                    $upl_kak = null;
                }

                // Upload FC KTP/KITAS Peneliti Utama
                if ($this->upload->do_upload('UploadKartuIdentitas')) {
                    $up_data3 = $this->upload->data();

                    $upl_ki = $up_data3['file_name'];
                } else {
                    $upl_ki = null;
                }

                // Upload Surat keterangan Kaji Etik
                if ($this->upload->do_upload('UploadKeteranganKajiEtik')) {
                    $up_data4 = $this->upload->data();

                    $upl_kke = $up_data4['file_name'];
                } else {
                    $upl_kke = null;
                }

                // Upload Kuesioner Wawancara
                if ($this->upload->do_upload('UploadKuisioner')) {
                    $up_data5 = $this->upload->data();

                    $upl_kuisioner = $up_data5['file_name'];
                } else {
                    $upl_kuisioner = null;
                }

                // Upload Surat Rekomendasi Penelitian dari PTSP
                if ($this->upload->do_upload('UploadRekomPtsp')) {
                    $up_data6 = $this->upload->data();

                    $upl_rekomptsp = $up_data6['file_name'];
                } else {
                    $upl_rekomptsp = null;
                }

                // Upload Izin Riset/Klirens Etik Riset
                if ($this->upload->do_upload('UploadIzinRiset')) {
                    $up_data7 = $this->upload->data();

                    $upl_izinriset = $up_data7['file_name'];
                } else {
                    $upl_izinriset = null;
                }

                // Upload Surat Keterangan Penelitian yang dikeluarkan oleh Direktorat Jenderal Politik dan Pemerintahan Umum Kementerian Dalam Negeri RI
                if ($this->upload->do_upload('UploadKeteranganDirjen')) {
                    $up_data8 = $this->upload->data();

                    $upl_kdirjen = $up_data8['file_name'];
                } else {
                    $upl_kdirjen = null;
                }

                // Surat Pernyataan yang sudah ditandatangani
                if ($this->upload->do_upload('UploadPernyataanHasil')) {
                    $up_data9 = $this->upload->data();

                    $upl_phasil = $up_data9['file_name'];
                } else {
                    $upl_phasil = null;
                }

                $konfigurasi    = $this->Konfigurasi_model->listing();
                $nomor          = $this->Formulir_model->getNomor();

                $data = array(
                    'Nomor'                     => $nomor,
                    'Kategori'                  => $this->input->post('Kategori', TRUE),
                    'NIK'                       => $this->input->post('NIK', TRUE),
                    'Nama'                      => $this->input->post('Nama', TRUE),
                    'Alamat'                    => $this->input->post('Alamat', TRUE),
                    'Email'                     => $this->input->post('Email', TRUE),
                    'NoTelp'                    => $this->input->post('NoTelp', TRUE),
                    'Pekerjaan'                 => $this->input->post('Pekerjaan', TRUE),
                    'UploadPermohonan'          => $upl_data,
                    'UploadKak'                 => $upl_kak,
                    'UploadKartuIdentitas'      => $upl_ki,
                    'UploadKeteranganKajiEtik'  => $upl_kke,
                    'UploadKuisioner'           => $upl_kuisioner,
                    'UploadRekomPtsp'           => $upl_rekomptsp,
                    'UploadIzinRiset'           => $upl_izinriset,
                    'UploadKeteranganDirjen'    => $upl_kdirjen,
                    'UploadPernyataanHasil'     => $upl_phasil,
                    'RincianInformasi'          => $this->input->post('RincianInformasi', TRUE),
                    'TujuanInformasi'           => $this->input->post('TujuanInformasi', TRUE),
                    'CaraMemperoleh'            => $this->input->post('CaraMemperoleh', TRUE),
                    'Salinan'                   => $this->input->post('Salinan', TRUE),
                    'CaraDapatSalinan'          => $this->input->post('CaraDapatSalinan', TRUE),
                    'JudulPenelitian'           => $this->input->post('JudulPenelitian', TRUE),
                    'IdUserInput'               => $this->session->userdata('uid'),
                    'CreatedDate'               => date("Y-m-d H:i:sa")
                );
                $last_id = $this->Formulir_model->insert($data);

                $history = array(
                    'id_formulir'               => $last_id,
                    'id_user'                   => $this->session->userdata('uid'),
                    'status'                    => 1,
                );
                $this->Formulir_History_model->insert($history);

                $dataEmail = array(
                    'email'                     => $this->input->post('Email', TRUE),
                    'message'                   => 'Permohonan data anda berhasil tersimpan di ' . $konfigurasi->namaweb . '. Silahkan login Sistem ' . $konfigurasi->namaweb . ' untuk melihat respon jawaban'
                );

                $this->sendEmail($dataEmail);

                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('formulir/show/' . $nomor));
            }
        } else {
            header('location:' . base_url('login') . '');
        }
    }

    public function show($nomor)
    {
        date_default_timezone_set('Asia/Bangkok');

        $row        = $this->Formulir_model->get_by_nomor($nomor);

        if ($row) {
            $data = array(
                'id'        => set_value('id', $row->IdFormulir),
                'nomor'     => set_value('nomor', $row->Nomor),
            );

            $this->template->load('template2', 'formulir/show', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('formulir/create'));
        }
    }

    public function cek_permohonan()
    {
        date_default_timezone_set('Asia/Bangkok');

        $this->template->load('template2', 'formulir/cek_permohonan');
    }

    // ACTION CEK PERMOHONAN
    public function ambil_data_permohonan()
    {
        $nomor          = $_GET["nomor"];
        $email          = $_GET["email"];
        $data["nomor"]  = $_GET["nomor"];
        $data["email"]  = $_GET["email"];

        $this->session->unset_userdata('nomor');
        $this->session->unset_userdata('email');

        $this->session->set_userdata($data);

        $q              = $this->db->query("SELECT * FROM formulir WHERE Nomor = '" . $nomor . "' AND Email = '" . $email . "'")->result_array();

        if (!empty($q)) {
            $history        = $this->Formulir_History_model->get_by_id_formulir($q[0]['IdFormulir']);

            foreach ($q as $qq) { ?>
                <table class="table table-responsive">
                    <tr>
                        <td>No Permohonan</td>
                        <td><?= $qq['Nomor']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $qq['Email']; ?></td>
                    </tr>
                    <tr>
                        <td>Rincian Informasi</td>
                        <td><?= $qq['RincianInformasi']; ?></td>
                    </tr>
                    <tr>
                        <td>Tujuan Informasi</td>
                        <td><?= $qq['TujuanInformasi']; ?></td>
                    </tr>
                    <tr>
                        <td>Jawaban dari PPID</td>
                        <td><?php if (!empty($qq['Response'])) {
                                echo $qq['Response'];
                            } else {
                                echo "-- Masih Dalam Proses Tindak Lanjut --";
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($qq['Status'] == 2) { ?>
                                <p>Silahkan klik <a href="<?php echo base_url('login') ?>">Login</a> untuk revisi permohonan</p>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php if (!empty($qq['UploadJawaban'])) { ?>
                        <tr>
                            <td>Surat Jawaban</td>
                            <td><a href="<?php echo base_url('upload/formulir/' . $qq['UploadJawaban']); ?>">Download</a></td>
                        </tr>
                    <?php } ?>
                </table>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="history">
                    <?php
                }

                foreach ($history as $history) { ?>
                        <tr>
                            <td><?= tgl_jam_sql($history->created_at) ?></td>
                            <td><?= status_permohonan($history->status) ?></td>
                            <td><?= ket_permohonan($history->keterangan) ?></td>
                        </tr>
                    <?php
                }
                "</tbody>
            </table>";
            } else {
                echo '<b class="text-danger">Data Tidak Ditemukan. Pastikan anda memasukan Nomor Permohonan dan Email dengan benar ...</b> <br><br>';
            }
        }

        // EDIT FORM PERMOHONAN
        public function edit($id = '')
        {
            $rs = $this->Formulir_model->find($id);
            echo json_encode($rs);
        }

        // UNTUK PEMOHON EDIT FORM INPUT
        public function store_edit_formulir($value = '')
        {
            date_default_timezone_set('Asia/Bangkok');

            $post       = $this->input->post();

            $data['IdFormulir']         = $post['IdFormulir'];
            $data['Nomor']              = $post['Nomor'];
            $data['Kategori']           = $post['Kategori'];
            $data['NIK']                = $post['NIK'];
            $data['Nama']               = $post['Nama'];
            $data['Alamat']             = $post['Alamat'];
            $data['Email']              = $post['Email'];
            $data['NoTelp']             = $post['NoTelp'];
            $data['Pekerjaan']          = $post['Pekerjaan'];
            $data['RincianInformasi']   = $post['RincianInformasi'];
            $data['TujuanInformasi']    = $post['TujuanInformasi'];
            $data['CaraMemperoleh']     = $post['CaraMemperoleh'];
            $data['Salinan']            = $post['Salinan'];
            $data['CaraDapatSalinan']   = $post['CaraDapatSalinan'];

            if (!empty($post['Status'])) {
                $data['Status']             = $post['Status'];

                $history = array(
                    'id_formulir'               => $post['IdFormulir'],
                    'id_user'                   => $this->session->userdata('uid'),
                    'status'                    => 3,
                );
                $this->Formulir_History_model->insert($history);
            }

            $this->db->where('IdFormulir', $post['IdFormulir'])->update('formulir', $data);
            echo json_encode(['status' => true, 'msg' => 'Updated']);
        }

        // UNTUK PEMOHON EDIT FORM FILE
        public function store_edit_formulir_file($value = '')
        {
            if ($this->access->is_login()) {
                date_default_timezone_set('Asia/Bangkok');

                $IdFormulir         = $this->input->post('IdFormulir');
                $allFile            = $this->db->query("select UploadPermohonan, UploadKak, UploadKartuIdentitas, UploadKeteranganKajiEtik,
                UploadKuisioner, UploadRekomPtsp, UploadIzinRiset, UploadKeteranganDirjen, UploadPernyataanHasil
                from formulir where IdFormulir=" . $IdFormulir)->row();

                //upload config 
                $config['upload_path']      = './upload/permohonan/';
                //$config['allowed_types']    = 'pdf|xls|xlsx|doc|docx';
                $config['allowed_types']    = 'pdf';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                $config['encrypt_name']     = true;

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if (!is_dir('upload')) {
                    mkdir('./upload', 0777, true);
                }

                // Upload Surat Permohonan
                if ($this->upload->do_upload('UploadPermohonan')) {
                    if ($allFile->UploadPermohonan != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadPermohonan);

                        $up_data1       = $this->upload->data();

                        $upl_data       = $up_data1['file_name'];
                    } else {
                        $up_data1       = $this->upload->data();

                        $upl_data       = $up_data1['file_name'];
                    }
                } else {
                    $upl_data = $allFile->UploadPermohonan;
                }

                // Upload KAK/Proposal Penelitian
                if ($this->upload->do_upload('UploadKak')) {
                    if ($allFile->UploadKak != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadKak);

                        $up_data2       = $this->upload->data();

                        $upl_kak        = $up_data2['file_name'];
                    } else {
                        $up_data2       = $this->upload->data();

                        $upl_kak        = $up_data2['file_name'];
                    }
                } else {
                    $upl_kak        = $allFile->UploadKak;
                }

                // Upload FC KTP/KITAS Peneliti Utama
                if ($this->upload->do_upload('UploadKartuIdentitas')) {
                    if ($allFile->UploadKartuIdentitas != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadKartuIdentitas);

                        $up_data3       = $this->upload->data();

                        $upl_ki         = $up_data3['file_name'];
                    } else {
                        $up_data3       = $this->upload->data();

                        $upl_ki         = $up_data3['file_name'];
                    }
                } else {
                    $upl_ki         = $allFile->UploadKartuIdentitas;
                }

                // Upload Surat keterangan Kaji Etik
                if ($this->upload->do_upload('UploadKeteranganKajiEtik')) {
                    if ($allFile->UploadKeteranganKajiEtik != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadKeteranganKajiEtik);

                        $up_data4       = $this->upload->data();

                        $upl_kke        = $up_data4['file_name'];
                    } else {
                        $up_data4       = $this->upload->data();

                        $upl_kke        = $up_data4['file_name'];
                    }
                } else {
                    $upl_kke        = $allFile->UploadKeteranganKajiEtik;
                }

                // Upload Kuesioner Wawancara
                if ($this->upload->do_upload('UploadKuisioner')) {
                    if ($allFile->UploadKuisioner != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadKuisioner);

                        $up_data5       = $this->upload->data();

                        $upl_kuisioner  = $up_data5['file_name'];
                    } else {
                        $up_data5       = $this->upload->data();

                        $upl_kuisioner  = $up_data5['file_name'];
                    }
                } else {
                    $upl_kuisioner  = $allFile->UploadKuisioner;
                }

                // Upload Surat Rekomendasi Penelitian dari PTSP
                if ($this->upload->do_upload('UploadRekomPtsp')) {
                    if ($allFile->UploadRekomPtsp != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadRekomPtsp);

                        $up_data6       = $this->upload->data();

                        $upl_rekomptsp  = $up_data6['file_name'];
                    } else {
                        $up_data6       = $this->upload->data();

                        $upl_rekomptsp  = $up_data6['file_name'];
                    }
                } else {
                    $upl_rekomptsp  = $allFile->UploadRekomPtsp;
                }

                // Upload Izin Riset/Klirens Etik Riset
                if ($this->upload->do_upload('UploadIzinRiset')) {
                    if ($allFile->UploadIzinRiset != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadIzinRiset);

                        $up_data7       = $this->upload->data();

                        $upl_izinriset  = $up_data7['file_name'];
                    } else {
                        $up_data7       = $this->upload->data();

                        $upl_izinriset  = $up_data7['file_name'];
                    }
                } else {
                    $upl_izinriset  = $allFile->UploadIzinRiset;
                }

                // Upload Surat Keterangan Penelitian yang dikeluarkan oleh Direktorat Jenderal Politik dan Pemerintahan Umum Kementerian Dalam Negeri RI
                if ($this->upload->do_upload('UploadKeteranganDirjen')) {
                    if ($allFile->UploadKeteranganDirjen != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadKeteranganDirjen);

                        $up_data8       = $this->upload->data();

                        $upl_kdirjen    = $up_data8['file_name'];
                    } else {
                        $up_data8       = $this->upload->data();

                        $upl_kdirjen    = $up_data8['file_name'];
                    }
                } else {
                    $upl_kdirjen    = $allFile->UploadKeteranganDirjen;
                }

                // Surat Pernyataan yang sudah ditandatangani
                if ($this->upload->do_upload('UploadPernyataanHasil')) {
                    if ($allFile->UploadPernyataanHasil != null) {
                        unlink('./upload/permohonan/' . $allFile->UploadPernyataanHasil);

                        $up_data9       = $this->upload->data();

                        $upl_phasil     = $up_data9['file_name'];
                    } else {
                        $up_data9       = $this->upload->data();

                        $upl_phasil     = $up_data9['file_name'];
                    }
                } else {
                    $upl_phasil     = $allFile->UploadPernyataanHasil;
                }

                $data['IdFormulir']                 = $IdFormulir;
                $data['UploadPermohonan']           = $upl_data;
                $data['UploadKak']                  = $upl_kak;
                $data['UploadKartuIdentitas']       = $upl_ki;
                $data['UploadKeteranganKajiEtik']   = $upl_kke;
                $data['UploadKuisioner']            = $upl_kuisioner;
                $data['UploadRekomPtsp']            = $upl_rekomptsp;
                $data['UploadIzinRiset']            = $upl_izinriset;
                $data['UploadKeteranganDirjen']     = $upl_kdirjen;
                $data['UploadPernyataanHasil']      = $upl_phasil;

                $this->db->where('IdFormulir', $data['IdFormulir'])->update('formulir', $data);
                redirect(site_url('dashboard'));
            }
        }


        // ==========================KEBERATAN INFORMASI=============================== //


        // LIST UNTUK ADMIN
        public function keberatan_list()
        {
            if (
                $this->session->userdata('logged_in') != "" &&
                ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
            ) {
                $formulir       = $this->Formulir_model->get_all_query_keberatan();

                $data = array(
                    'formulir_data'         => $formulir
                );

                $this->template->load('template', 'formulir/keberatan_list', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        // LIST UNTUK ADMIN RESPON KEBERATAN
        public function response_keberatan()
        {
            if (
                $this->session->userdata('logged_in') != "" &&
                ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator" or $this->session->userdata('level') == "sekpim")
            ) {
                $formulir           = $this->Formulir_model->get_all_query_jawaban_keberatan();
                $data_seksi         = $this->db->query('select * from seksi order by Seksi');

                $data = array(
                    'data_seksi'        => $data_seksi,
                    'formulir_data'     => $formulir
                );

                $this->template->load('template', 'formulir/response_keberatan_list', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function store_response_keberatan($value = '')
        {
            date_default_timezone_set('Asia/Bangkok');

            $post       = $this->input->post();

            if (!empty($post['Response'])) {
                $data['ResponseKeberatan']      = $post['ResponseKeberatan'];
                $data['ResponseKeberatanDate']  = date("Y-m-d h:i:sa");
                $data['ResponseKeberatanUser']  = $this->access->get_uid();
            }

            $this->db->where('IdFormulir', $post['IdFormulir'])->update('formulir', $data);
            echo json_encode(['status' => true, 'msg' => 'Updated']);
        }

        // UNTUK PEMOHON
        public function keberatan_create()
        {
            $data = array(
                'disable'           => '',
                'button'            => 'Kirim',
                'action'            => site_url('formulir/keberatan_create_action'),
                'IdFormulir'        => set_value('IdFormulir'),
                'Nomor'             => set_value('Nomor'),
                'Email'             => set_value('Email'),

            );

            $this->template->load('template2', 'formulir/keberatan_form', $data);
        }

        public function keberatan_create_action()
        {
            date_default_timezone_set('Asia/Bangkok');

            $nomor          = $this->Formulir_model->getNomorKeberatan();

            $data = array(
                'NomorKeberatan'        => $nomor,
                'IsKeberatan'           => 1,
                'AlasanKeberatan'       => $this->input->post('AlasanKeberatan', TRUE),
                'KeberatanDate'         => date("Y-m-d H:i:sa")
            );

            $this->Formulir_model->update_keberatan($this->input->post('Nomor', TRUE), $data);

            $this->session->set_flashdata('message', 'Create Record Success');

            redirect(site_url('formulir/keberatan_show/' . $nomor));
        }

        public function keberatan_show($nomor)
        {
            date_default_timezone_set('Asia/Bangkok');

            $row        = $this->Formulir_model->get_by_nomor_keberatan($nomor);

            if ($row) {
                $data = array(
                    'id'            => set_value('id', $row->IdFormulir),
                    'nomor'         => set_value('nomor', $row->NomorKeberatan),
                );

                $this->template->load('template2', 'formulir/keberatan_show', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');

                redirect(site_url('formulir/create'));
            }
        }

        public function cek_keberatan()
        {
            date_default_timezone_set('Asia/Bangkok');

            $this->template->load('template2', 'formulir/cek_keberatan');
        }

        // ACTION CEK KEBERATAN
        public function ambil_data_keberatan()
        {
            $nomor              = $_GET["nomor"];
            $email              = $_GET["email"];
            $data["nomor"]      = $_GET["nomor"];
            $data["email"]      = $_GET["email"];

            $this->session->unset_userdata('nomor');
            $this->session->unset_userdata('email');

            $this->session->set_userdata($data);

            $q = $this->db->query("SELECT * FROM formulir WHERE NomorKeberatan = '" . $nomor . "' AND Email = '" . $email . "'")->result_array();

            foreach ($q as $qq) { ?>
                    <table class="table table-responsive">
                        <tr>
                            <td>Nomor Keberatan</td>
                            <td><?= $qq['NomorKeberatan']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $qq['Email']; ?></td>
                        </tr>
                        <tr>
                            <td>Rincian Informasi</td>
                            <td><?= $qq['RincianInformasi']; ?></td>
                        </tr>
                        <tr>
                            <td>Alasan Keberatan Informasi</td>
                            <td><?= $qq['AlasanKeberatan']; ?></td>
                        </tr>
                        <tr>
                            <td>Jawaban dari PPID</td>
                            <td>
                                <?php if (!empty($qq['ResponseKeberatan'])) {
                                    echo $qq['ResponseKeberatan'];
                                } else {
                                    echo "-- Masih Dalam Proses Tindak Lanjut --";
                                } ?>
                            </td>
                        </tr>
                    </table>
        <?php }
        }


        // ==========================UTILS=============================== //


        public function _rules()
        {
            $this->form_validation->set_rules('Kategori', 'Kategori', 'trim|required');
            $this->form_validation->set_rules('Nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
            $this->form_validation->set_rules('NoTelp', 'No Telpon', 'trim|required');
            $this->form_validation->set_rules('Email', 'Email', 'trim|required');
            $this->form_validation->set_rules('RincianInformasi', 'Rincian Informasi', 'trim|required');
            $this->form_validation->set_rules('TujuanInformasi', 'Tujuan Informasi', 'trim|required');

            if (!empty($_FILES['UploadPermohonan']['file_name'])) {
                $this->form_validation->set_rules('UploadPermohonan', 'Surat Permohonan', 'mimes:pdf');
            };

            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        }

        public function get_selesai_revisi()
        {
            $selesai_revisi = $this->Formulir_model->selesai_revisi();

            print_r(json_encode($selesai_revisi));
        }

        function sendEmail($data)
        {
            // Konfigurasi email
            $config = [
                'mailtype' => $this->config->item('mailtype'),
                'charset' => $this->config->item('charset'),
                'protocol' => $this->config->item('protocol'),
                'smtp_host' => $this->config->item('smtp_host'),
                'smtp_user' => $this->config->item('smtp_user'), // Alamat email
                'smtp_pass' => $this->config->item('smtp_pass'), // Password email
                // 'smtp_crypto' => 'ssl',
                'smtp_port' => $this->config->item('smtp_port'),
                'crlf' => "\r\n",
                'newline' => "\r\n"
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
            $this->email->subject('Notifikasi ' . $this->config->item('nama_pengirim'));

            // Isi email
            $this->email->message("<strong>Hai, anda menerima email ini karena " . $data['message']);

            if ($this->email->send()) {
                return 'Berhasil';
            } else {
                return 'Gagal';
            }
        }

        public function delete($id)
        {
            if (
                $this->session->userdata('logged_in') != "" &&
                ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
            ) {
                $row        = $this->Formulir_model->get_by_id($id);

                if ($row) {
                    $this->Formulir_model->delete($id);
                    $this->session->set_flashdata('message', 'Delete Record Success');

                    redirect(site_url('formulir'));
                } else {
                    $this->session->set_flashdata('message', 'Record Not Found');
                    redirect(site_url('formulir'));
                }
            } else {
                header('location:' . base_url() . '');
            }
        }


        // ==========================RATING ADMIN=============================== //


        public function rating()
        {
            if (
                $this->session->userdata('logged_in') != "" &&
                ($this->session->userdata('level') == "admin")
            ) {
                $rating         = $this->db->query("SELECT * FROM rating ORDER BY CreatedDate DESC")->result();

                $data = array(
                    'rating1'           => $this->db->query("select count(*) as rating1 from rating where Rating = 1")->row()->rating1,
                    'rating2'           => $this->db->query("select count(*) as rating2 from rating where Rating = 2")->row()->rating2,
                    'rating3'           => $this->db->query("select count(*) as rating3 from rating where Rating = 3")->row()->rating3,
                    'rating4'           => $this->db->query("select count(*) as rating4 from rating where Rating = 4")->row()->rating4,
                    'rating5'           => $this->db->query("select count(*) as rating5 from rating where Rating = 5")->row()->rating5,
                    'rating_data'       => $rating
                );

                $this->template->load('template', 'formulir/rating_list', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function delete_rating($id)
        {
            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin")) {
                $row            = $this->db->query("SELECT * FROM rating WHERE IdRating = " . $id)->row();

                if ($row) {
                    $this->db->query("DELETE FROM rating WHERE IdRating = " . $id);
                    $this->session->set_flashdata('message', 'Delete Record Success');

                    redirect(site_url('formulir/rating'));
                } else {
                    $this->session->set_flashdata('message', 'Record Not Found');
                    redirect(site_url('formulir/rating'));
                }
            } else {
                header('location:' . base_url() . '');
            }
        }


        // ==========================EXPORT EXCEL=============================== //


        public function permohonan_pdf($id)
        {
            $this->load->library('Pdf3');

            $this->session->set_userdata('modal_title', 'permohonan');
            //$setting = $this->setting();

            $data['formulir'] = $this->Formulir_model->get_by_id($id);
            $tbl = $this->load->view('formulir/permohonan_pdf', $data, true);
            // exit();

            ob_start();
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator('PPID-Dinkes');
            $pdf->SetAuthor('Dinas Kesehatan DKI');
            $pdf->SetTitle('Cetak Permohonan');
            $pdf->SetSubject('Permohonan');
            $pdf->SetKeywords('Permohonan');

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set margins
            $pdf->SetMargins(5, 5, 5, true);

            // set auto page breaks false
            //$pdf->SetAutoPageBreak(false, 0);

            // set auto page breaks false -> if you want to print 1 page only, set to (true, 10) for addpage more than 1 page
            $pdf->SetAutoPageBreak(true, 10);

            // add a page
            $pdf->AddPage('P', 'A4');
            // Display image on full page
            // $pdf->Image(base_url('userfiles/sertifikat/bg_sertifikat.jpg'), 0, 0, 210, 297, '', '', '', false, 200, '', false, false, 0, false, false, true);
            //$img_file = base_url('userfiles/sertifikat/bg_sertifikat.jpg');
            //$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

            $pdf->writeHTML($tbl, true, false, false, false, '');
            // echo $tbl;exit;
            // ---------------------------------------------------------
            ob_clean();
            //Close and output PDF document
            $pdf->Output('permohonan' . date('YmdHis') . '.pdf', 'I');
        }

        public function rekap_permohonan_pdf()
        {
            $this->load->library('Pdf3');

            $this->session->set_userdata('modal_title', 'rekap_permohonan');
            //$setting = $this->setting();

            $data['formulir_data'] = $this->Formulir_model->get_all_query();
            $tbl = $this->load->view('formulir/rekap_permohonan_pdf', $data, true);
            // exit();

            ob_start();
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator('PPID-Dinkes');
            $pdf->SetAuthor('Dinas Kesehatan DKI');
            $pdf->SetTitle('Cetak Permohonan');
            $pdf->SetSubject('Permohonan');
            $pdf->SetKeywords('Permohonan');

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set margins
            $pdf->SetMargins(5, 5, 5, true);

            // set auto page breaks false
            //$pdf->SetAutoPageBreak(false, 0);

            // set auto page breaks false -> if you want to print 1 page only, set to (true, 10) for addpage more than 1 page
            $pdf->SetAutoPageBreak(true, 10);

            // add a page
            $pdf->AddPage('L', 'A4');
            // Display image on full page
            // $pdf->Image(base_url('userfiles/sertifikat/bg_sertifikat.jpg'), 0, 0, 210, 297, '', '', '', false, 200, '', false, false, 0, false, false, true);
            //$img_file = base_url('userfiles/sertifikat/bg_sertifikat.jpg');
            //$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

            $pdf->writeHTML($tbl, true, false, false, false, '');
            // echo $tbl;exit;
            // ---------------------------------------------------------
            ob_clean();
            //Close and output PDF document
            $pdf->Output('rekap_permohonan' . date('YmdHis') . '.pdf', 'I');
        }

        public function penelitian_permohonan_pdf()
        {
            $Tujuan = 'Bertujuan untuk Penelitian';

            $this->load->library('Pdf3');

            $this->session->set_userdata('modal_title', 'rekap_permohonan');
            //$setting = $this->setting();

            $data['formulir_data'] = $this->Formulir_model->get_all_filter($Tujuan);
            $tbl = $this->load->view('formulir/rekap_permohonan_pdf', $data, true);
            // exit();

            ob_start();
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator('PPID-Dinkes');
            $pdf->SetAuthor('Dinas Kesehatan DKI');
            $pdf->SetTitle('Cetak Permohonan');
            $pdf->SetSubject('Permohonan');
            $pdf->SetKeywords('Permohonan');

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set margins
            $pdf->SetMargins(5, 5, 5, true);

            // set auto page breaks false
            //$pdf->SetAutoPageBreak(false, 0);

            // set auto page breaks false -> if you want to print 1 page only, set to (true, 10) for addpage more than 1 page
            $pdf->SetAutoPageBreak(true, 10);

            // add a page
            $pdf->AddPage('L', 'A4');
            // Display image on full page
            // $pdf->Image(base_url('userfiles/sertifikat/bg_sertifikat.jpg'), 0, 0, 210, 297, '', '', '', false, 200, '', false, false, 0, false, false, true);
            //$img_file = base_url('userfiles/sertifikat/bg_sertifikat.jpg');
            //$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

            $pdf->writeHTML($tbl, true, false, false, false, '');
            // echo $tbl;exit;
            // ---------------------------------------------------------
            ob_clean();
            //Close and output PDF document
            $pdf->Output('rekap_permohonan' . date('YmdHis') . '.pdf', 'I');
        }

        public function dataawal_permohonan_pdf()
        {
            $Tujuan = 'Bertujuan untuk Data Awal Penelitian';

            $this->load->library('Pdf3');

            $this->session->set_userdata('modal_title', 'rekap_permohonan');
            //$setting = $this->setting();

            $data['formulir_data'] = $this->Formulir_model->get_all_filter($Tujuan);
            $tbl = $this->load->view('formulir/rekap_permohonan_pdf', $data, true);
            // exit();

            ob_start();
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator('PPID-Dinkes');
            $pdf->SetAuthor('Dinas Kesehatan DKI');
            $pdf->SetTitle('Cetak Permohonan');
            $pdf->SetSubject('Permohonan');
            $pdf->SetKeywords('Permohonan');

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set margins
            $pdf->SetMargins(5, 5, 5, true);

            // set auto page breaks false
            //$pdf->SetAutoPageBreak(false, 0);

            // set auto page breaks false -> if you want to print 1 page only, set to (true, 10) for addpage more than 1 page
            $pdf->SetAutoPageBreak(true, 10);

            // add a page
            $pdf->AddPage('L', 'A4');
            // Display image on full page
            // $pdf->Image(base_url('userfiles/sertifikat/bg_sertifikat.jpg'), 0, 0, 210, 297, '', '', '', false, 200, '', false, false, 0, false, false, true);
            //$img_file = base_url('userfiles/sertifikat/bg_sertifikat.jpg');
            //$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

            $pdf->writeHTML($tbl, true, false, false, false, '');
            // echo $tbl;exit;
            // ---------------------------------------------------------
            ob_clean();
            //Close and output PDF document
            $pdf->Output('rekap_permohonan' . date('YmdHis') . '.pdf', 'I');
        }

        public function lain_permohonan_pdf()
        {
            $Tujuan = 'Lain-Lain';

            $this->load->library('Pdf3');

            $this->session->set_userdata('modal_title', 'rekap_permohonan');
            //$setting = $this->setting();

            $data['formulir_data'] = $this->Formulir_model->get_all_filter($Tujuan);
            $tbl = $this->load->view('formulir/rekap_permohonan_pdf', $data, true);
            // exit();

            ob_start();
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator('PPID-Dinkes');
            $pdf->SetAuthor('Dinas Kesehatan DKI');
            $pdf->SetTitle('Cetak Permohonan');
            $pdf->SetSubject('Permohonan');
            $pdf->SetKeywords('Permohonan');

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set margins
            $pdf->SetMargins(5, 5, 5, true);

            // set auto page breaks false
            //$pdf->SetAutoPageBreak(false, 0);

            // set auto page breaks false -> if you want to print 1 page only, set to (true, 10) for addpage more than 1 page
            $pdf->SetAutoPageBreak(true, 10);

            // add a page
            $pdf->AddPage('L', 'A4');
            // Display image on full page
            // $pdf->Image(base_url('userfiles/sertifikat/bg_sertifikat.jpg'), 0, 0, 210, 297, '', '', '', false, 200, '', false, false, 0, false, false, true);
            //$img_file = base_url('userfiles/sertifikat/bg_sertifikat.jpg');
            //$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

            $pdf->writeHTML($tbl, true, false, false, false, '');
            // echo $tbl;exit;
            // ---------------------------------------------------------
            ob_clean();
            //Close and output PDF document
            $pdf->Output('rekap_permohonan' . date('YmdHis') . '.pdf', 'I');
        }


        // ==========================EXPORT EXCEL=============================== //


        public function excel()
        {
            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                $this->load->helper('
                ');
                $namaFile = "rekap_permohonan.xls";
                $judul = "Rekap Permohonan";
                $tablehead = 0;
                $tablebody = 1;
                $nourut = 1;
                //penulisan header
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
                header("Formulir-Type: application/force-download");
                header("Formulir-Type: application/octet-stream");
                header("Formulir-Type: application/download");
                header("Formulir-Disposition: attachment;filename=" . $namaFile . "");
                header("Formulir-Transfer-Encoding: binary ");

                xlsBOF();

                $kolomhead = 0;
                xlsWriteLabel($tablehead, $kolomhead++, "No");
                xlsWriteLabel($tablehead, $kolomhead++, "Nomor Permohonan");
                xlsWriteLabel($tablehead, $kolomhead++, "Kategori Permohonan");
                xlsWriteLabel($tablehead, $kolomhead++, "Nama Pemohon");
                xlsWriteLabel($tablehead, $kolomhead++, "Email");
                xlsWriteLabel($tablehead, $kolomhead++, "Rincian Informasi");
                xlsWriteLabel($tablehead, $kolomhead++, "Tujuan Penggunaan Informasi");
                xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Permohonan");
                xlsWriteLabel($tablehead, $kolomhead++, "Jawaban");

                foreach ($this->Formulir_model->get_all() as $data) {
                    $kolombody = 0;

                    //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                    xlsWriteNumber($tablebody, $kolombody++, $nourut);
                    xlsWriteLabel($tablebody, $kolombody++, $data->Nomor);
                    xlsWriteLabel($tablebody, $kolombody++, $data->Kategori);
                    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
                    xlsWriteLabel($tablebody, $kolombody++, $data->Email);
                    xlsWriteLabel($tablebody, $kolombody++, $data->RincianInformasi);
                    xlsWriteLabel($tablebody, $kolombody++, $data->TujuanInformasi);
                    xlsWriteLabel($tablebody, $kolombody++, $data->CreatedDate);
                    xlsWriteLabel($tablebody, $kolombody++, $data->Response);

                    $tablebody++;
                    $nourut++;
                }

                xlsEOF();
                exit();
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function exportexcel()
        {

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Pemohonan informasi public.xls");


                $data = array(
                    'formulir_data' => $this->Formulir_model->get_all(),
                    'start' => 0
                );

                $this->load->view('formulir/formulir_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        // Export excel Bertujuan untuk Penelitian
        public function exportexcelpenelitian()
        {
            $Tujuan = 'Bertujuan untuk Penelitian';

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Pemohonan informasi public.xls");

                $data = array(
                    'formulir_data' => $this->Formulir_model->get_all_filter($Tujuan),
                    'start' => 0
                );

                $this->load->view('formulir/formulir_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        // Export excel Bertujuan untuk Data Awal Penelitian
        public function exportexceldataawal()
        {
            $Tujuan = 'Bertujuan untuk Data Awal Penelitian';

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Pemohonan informasi public.xls");

                $data = array(
                    'formulir_data' => $this->Formulir_model->get_all_filter($Tujuan),
                    'start' => 0
                );

                $this->load->view('formulir/formulir_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        // Export excel Lain-Lain
        public function exportexcellain()
        {
            $Tujuan = 'Lain-Lain';

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Pemohonan informasi public.xls");

                $data = array(
                    'formulir_data' => $this->Formulir_model->get_all_filter($Tujuan),
                    'start' => 0
                );

                $this->load->view('formulir/formulir_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function exportresponselistexcel()
        {

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Jawaban Permohonan.xls");


                $data = array(
                    'formulir_data' => $this->Formulir_model->get_all_query3(),
                    'start' => 0
                );

                $this->load->view('formulir/responselist_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function pene_exportresponselistexcel()
        {
            $Tujuan = 'Bertujuan untuk Penelitian';

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Jawaban Permohonan.xls");


                $data = array(
                    'formulir_data' => $this->Formulir_model->get_query3_filter($Tujuan),
                    'start' => 0
                );

                $this->load->view('formulir/responselist_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function dataawal_exportresponselistexcel()
        {
            $Tujuan = 'Bertujuan untuk Data Awal Penelitian';

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Jawaban Permohonan.xls");


                $data = array(
                    'formulir_data' => $this->Formulir_model->get_query3_filter($Tujuan),
                    'start' => 0
                );

                $this->load->view('formulir/responselist_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function lain_exportresponselistexcel()
        {
            $Tujuan = 'Lain-Lain';

            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Jawaban Permohonan.xls");


                $data = array(
                    'formulir_data' => $this->Formulir_model->get_query3_filter($Tujuan),
                    'start' => 0
                );

                $this->load->view('formulir/responselist_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }


        // ==========================EXPORT WORD=============================== //


        public function word()
        {
            if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
                header("Formulir-type: application/vnd.ms-word");
                header("Formulir-Disposition: attachment;Filename=formulir.doc");

                $data = array(
                    'formulir_data' => $this->Formulir_model->get_all(),
                    'start' => 0
                );

                $this->load->view('formulir/formulir_doc', $data);
            } else {
                header('location:' . base_url() . '');
            }
        }

        public function export()
        {
            $formulirs = $this->Formulir_model->get_all();

            $spreadsheet = new Spreadsheet;

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'Nama Formulir')
                ->setCellValue('C1', 'Bab')
                ->setCellValue('D1', 'Isi Formulir')
                ->setCellValue('E1', 'Order');

            $kolom = 2;
            $nomor = 1;
            foreach ($formulirs as $formulir) {

                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $kolom, $nomor)
                    ->setCellValue('B' . $kolom, $formulir->JudulFormulir)
                    ->setCellValue('C' . $kolom, $formulir->Bab)
                    //->setCellValue('D' . $kolom, date('j F Y', strtotime($pengguna->tanggal_lahir)))
                    ->setCellValue('D' . $kolom, $formulir->IsiFormulir)
                    ->setCellValue('E' . $kolom, $formulir->Order);

                $kolom++;
                $nomor++;
            }

            $writer = new Xlsx($spreadsheet);

            header('Formulir-Type: application/vnd.ms-excel');
            header('Formulir-Disposition: attachment;filename="Latihan.xls"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function exportword()
        {
            // Creating the new document...
            //$phpWord = new \PhpOffice\PhpWord\PhpWord();
            $phpWord = new PhpWord();

            /* Note: any element you append to a document must reside inside of a Section. */

            // Adding an empty Section to the document...
            $section = $phpWord->addSection();
            // Adding Text element to the Section having font styled by default...
            $section->addText(
                '"Learn from yesterday, live for today, hope for tomorrow. '
                    . 'The important thing is not to stop questioning." '
                    . '(Albert Einstein)'
            );

            /*
         * Note: it's possible to customize font style of the Text element you add in three ways:
         * - inline;
         * - using named font style (new font style object will be implicitly created);
         * - using explicitly created font style object.
         */

            // Adding Text element with font customized inline...
            $section->addText(
                '"Great achievement is usually born of great sacrifice, '
                    . 'and is never the result of selfishness." '
                    . '(Napoleon Hill)',
                array('name' => 'Tahoma', 'size' => 10)
            );

            // Adding Text element with font customized using named font style...
            $fontStyleName = 'oneUserDefinedStyle';
            $phpWord->addFontStyle(
                $fontStyleName,
                array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
            );
            $section->addText(
                '"The greatest accomplishment is not in never falling, '
                    . 'but in rising again after you fall." '
                    . '(Vince Lombardi)',
                $fontStyleName
            );

            // Adding Text element with font customized using explicitly created font style object...
            $fontStyle = new \PhpOffice\PhpWord\Style\Font();
            $fontStyle->setBold(true);
            $fontStyle->setName('Tahoma');
            $fontStyle->setSize(13);
            $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
            $myTextElement->setFontStyle($fontStyle);

            $writer = new Word2007($phpWord);

            $filename = 'simple';

            header('Formulir-Type: application/msword');
            header('Formulir-Disposition: attachment;filename="' . $filename . '.docx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
            /*
        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');

        // Saving the document as ODF file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
        $objWriter->save('helloWorld.odt');

        // Saving the document as HTML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save('helloWorld.html');
        */

            /* Note: we skip RTF, because it's not XML-based and requires a different example. */
            /* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */
        }

        public function exportword2()
        {
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            $section->addText('Hello World !');

            $writer = new Word2007($phpWord);

            $filename = 'simple';

            header('Formulir-Type: application/msword');
            header('Formulir-Disposition: attachment;filename="' . $filename . '.docx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }
    }

/* End of file Formulir.php */
/* Location: ./application/controllers/Formulir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */