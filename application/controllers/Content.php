<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

/**
 * @property load $load
 * @property session $session
 * @property Content_model $Content_model
 * @property Combobox_model $Combobox_model
 * @property db $db
 * @property access $access
 * @property template $template
 * @property input $input
 * @property upload $upload
 * @property form_validation $form_validation
 * @property image_lib $image_lib
 */

class Content extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('Combobox_model');
        $this->load->library('form_validation');
    }

    // UNTUK DAFTAR INFORMASI PUBLIK BY TIPE
    // Tipe 1 - 5
    // UNTUK ADMIN
    public function index($tipe)
    {
        if (
            $tipe <= 5 &&
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $content        = $this->Content_model->get_by_tipe($tipe);
            $IdTipe         = $this->db->query('select IdTipe from tipe where IdTipe = ' . $tipe)->row('IdTipe');
            $Tipe           = $this->db->query('select keterangan from tipe where IdTipe = ' . $tipe)->row('keterangan');

            $data = array(
                'IdTipe'            => $IdTipe,
                'Tipe'              => $Tipe,
                'content_data'      => $content,
            );

            $this->template->load('template', 'content/list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // UNTUK DAFTAR INFORMASI PUBLIK BY TIPE
    // Tipe 1 - 5
    // UNTUK ADMIN
    public function upload($tipe)
    {
        if (
            $tipe <= 5 &&
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $content        = $this->Content_model->get_by_tipe($tipe);
            $Tipe           = $this->db->query('select keterangan from tipe where IdTipe = ' . $tipe)->row('keterangan');

            $data = array(
                'Tipe'              => $Tipe,
                'content_data'      => $content
            );

            $this->template->load('template', 'content/upload', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // ==========================INFORMASI PUBLIK=============================== //

    // UNTUK USER / GUEST
    // UNTUK DAFTAR INFORMASI PUBLIK BY TIPE 1 - 5
    // DAN TIPE YG LAINNYA
    public function view($tipe)
    {
        $content            = $this->Content_model->get_by_tipe($tipe);
        $Tipe               = $this->db->query('select keterangan from tipe where IdTipe = ' . $tipe)->row('keterangan');

        if ($tipe == 1) {
            $content1       = $this->Content_model->get_by_tipe(2);
            $content2       = $this->Content_model->get_by_tipe(3);
            $content3       = $this->Content_model->get_by_tipe(4);

            $data = array(
                'content_data1' => $content1,
                'content_data2' => $content2,
                'content_data3' => $content3,
                'Tipe'          => $Tipe
            );

            $this->template->load('template2', 'content/view_2', $data);
        } else if ($tipe == 6) {
            $sosialisasi    = $this->Content_model->get_by_tipe(201);
            $konten         = $this->Content_model->get_by_tipe(202);

            $data = array(
                'sosialisasi'   => $sosialisasi,
                'konten'        => $konten,
                'content_data'  => $content,
                'Tipe'          => $Tipe
            );

            $this->template->load('template2', 'content/view_3', $data);
        } else {
            $data = array(
                'content_data'  => $content,
                'Tipe'          => $Tipe
            );

            $this->template->load('template2', 'content/view', $data);
        }
    }

    public function act_upload()
    {
        date_default_timezone_set('Asia/Bangkok');

        $post       = $this->input->post();
        $status     = $post['StatusFile'];

        if ($status == 1) { // Upload File
            //upload config 
            $config['upload_path']      = './upload/content/';
            $config['allowed_types']    = 'jpeg|jpg|png|pdf|xls|xlsx|doc|docx';
            $config['max_size']         = '0';
            $config['max_width']        = '0';
            $config['max_height']       = '0';

            $this->load->library('upload', $config);
            $this->load->library('image_lib');

            if (!is_dir('upload')) {
                mkdir('./upload', 0777, true);
            }

            // foto
            if ($this->upload->do_upload('FileUpload')) {
                $up_data1       = $this->upload->data();
                $upl_data       = $up_data1['file_name'];
            } else {
                $upl_data       = "";
            }

            $data['FileUpload']     = $upl_data;
            $data['IsUpload']       = 1;
        } else if ($status == 2) { // URL Link / File Link
            $data['UrlLink']        = $post['UrlLink'];;
            $data['IsUrlLink']      = 1;
        }

        $data['UpdateDate']         = date("Y-m-d h:i:sa");
        $data['UpdateUser']         = $this->access->get_uid();

        $this->db->where('IdContent', $post['IdContent'])->update('content', $data);
    }

    public function act_delete()
    {
        $post       = $this->input->post();

        $data['FileUpload']     = '';
        $data['UrlLink']        = '';
        $data['IsUpload']       = '';
        $data['IsUrlLink']      = '';

        $filename = $this->db->query("select FileUpload from content where IdContent=" . $post['IdContent'])->row();

        unlink('./upload/content/' . $filename->FileUpload);

        $this->db->where('IdContent', $post['IdContent'])->update('content', $data);
    }

    public function store()
    {
        date_default_timezone_set('Asia/Bangkok');

        $post = $this->input->post();

        $data['Tipe']                   = $post['Tipe'];
        $data['NoContent']              = $post['NoContent'];
        $data['JudulContent']           = $post['JudulContent'];
        $data['IsiContent']             = $post['IsiContent'];
        $data['PejabatInformasi']       = $post['PejabatInformasi'];
        $data['PenanggungJawab']        = $post['PenanggungJawab'];
        $data['WaktuInformasi']         = $post['WaktuInformasi'];
        $data['BentukInformasi']        = $post['BentukInformasi'];
        $data['JangkaWaktu']            = $post['JangkaWaktu'];
        $data['JenisMedia']             = ($post['JenisMedia']);
        $data['IsActive']               = ($post['IsActive']);
        $data['UrlLink']                = ($post['UrlLink']);
        $data['UpdateDate']             = date("Y-m-d h:i:sa");
        $data['UpdateUser']             = $this->access->get_uid();

        if ($post['IdContent'] > 0) {
            $this->db->where('IdContent', $post['IdContent'])->update('content', $data);
            echo json_encode(['status' => true, 'msg' => 'Updated']);
        } else {
            $this->db->insert('content', $data);
            echo json_encode(['status' => true, 'msg' => 'Stored']);
        }
    }


    // ==========================PAGE=============================== //


    // UNTUK ADMIN CRUD PAGE
    // LIST BY TIPE
    public function page($tipe)
    {
        if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
            $content            = $this->Content_model->get_by_tipe($tipe);
            $tipetext           = $this->db->query('select keterangan from tipe where IdTipe = ' . $tipe)->row('keterangan');

            $data = array(
                'tipe'              => $tipe,
                'tipetext'          => $tipetext,
                'content_data'      => $content,
            );

            $this->template->load('template', 'content/page', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // UNTUK USER / GUEST
    // VIEW PAGE BY ID PAGE
    public function publish($id)
    {
        $row        = $this->Content_model->get_by_id($id);

        $data = array(
            'JudulContent'  => set_value('JudulContent', $row->JudulContent),
            'IsiContent'    => set_value('IsiContent', $row->IsiContent),
        );

        $this->template->load('template2', 'content/publish', $data);
    }

    public function create($tipe)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $tipetext           = $this->db->query('select keterangan from tipe where IdTipe = ' . $tipe)->row('keterangan');

            $data = array(
                'disable'           => '',
                'button'            => 'Create',
                'action'            => site_url('content/create_action'),
                'IdContent'         => set_value('IdContent'),
                'Tipe'              => set_value('Tipe'),
                'JudulContent'      => set_value('JudulContent'),
                'IsiContent'        => set_value('IsiContent'),
                'tipe'              => $tipe,
                'tipetext'          => $tipetext
            );

            $this->template->load('template', 'content/form', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create_action()
    {
        date_default_timezone_set('Asia/Bangkok');

        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create($this->input->post('Tipe', TRUE));
            } else {
                //upload config 
                $config['upload_path']      = './upload/aset/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if (!is_dir('upload')) {
                    mkdir('./upload', 0777, true);
                }

                // foto
                if ($this->upload->do_upload('file_foto')) {
                    $up_data1 = $this->upload->data();

                    $this->image_lib->initialize(array(
                        'image_library'     => 'gd2', //library yang kita gunakan
                        'source_image'      => './upload/aset/' . $up_data1['file_name'],
                        'maintain_ratio'    => TRUE,
                        'create_thumb'      => FALSE,
                        'width'             => 700,
                        'height'            => 550
                    ));

                    $this->image_lib->resize();

                    $upl_data       = $up_data1['file_name'];
                } else {
                    $upl_data       = "";
                }

                $data = array(
                    'JudulContent'          => $this->input->post('JudulContent', TRUE),
                    'IsiContent'            => $this->input->post('IsiContent', TRUE),
                    'IsActive'              => $this->input->post('IsActive', TRUE),
                    'Tipe'                  => $this->input->post('Tipe', TRUE),
                );

                $data['CreateDate'] = date("Y-m-d h:i:sa");
                $data['CreateUser'] = $this->access->get_uid();

                $this->Content_model->insert($data);

                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('content/page/' . $this->input->post('Tipe', TRUE)));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update($id)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $row            = $this->Content_model->get_by_id($id);
            $tipetext       = $this->db->query('select keterangan from tipe where IdTipe = ' . $row->Tipe)->row('keterangan');

            $data = array(
                'disable'           => '',
                'button'            => 'Update',
                'action'            => site_url('content/update_action'),
                'IdContent'         => set_value('IdContent', $row->IdContent),
                'NoContent'         => set_value('NoContent', $row->NoContent),
                'JudulContent'      => set_value('JudulContent', $row->JudulContent),
                'IsiContent'        => set_value('IsiContent', $row->IsiContent),
                'tipe'              => set_value('Tipe', $row->Tipe),
                'tipetext'          => $tipetext,
            );

            $this->template->load('template', 'content/form', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update_action()
    {
        date_default_timezone_set('Asia/Bangkok');

        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('IdContent', TRUE));
            } else {
                //upload config 
                $config['upload_path']      = './upload/aset/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                // foto
                if ($this->upload->do_upload('file_foto')) {
                    $up_data1 = $this->upload->data();

                    // Resize Image
                    $this->image_lib->initialize(array(
                        'image_library'         => 'gd2', //library yang kita gunakan
                        'source_image'          => './upload/aset/' . $up_data1['file_name'],
                        'maintain_ratio'        => TRUE,
                        'create_thumb'          => FALSE,
                        'width'                 => 700,
                        'height'                => 550
                    ));
                    $this->image_lib->resize();

                    $upl_data = $up_data1['file_name'];
                } else {
                    $upl_data = $this->input->post('file_foto', TRUE);
                }

                $data = array(
                    'JudulContent'          => $this->input->post('JudulContent', TRUE),
                    'IsiContent'            => $this->input->post('IsiContent', TRUE),
                    'IsActive'              => $this->input->post('IsActive', TRUE),
                    'UpdateDate'            => date("Y-m-d h:i:sa"),
                    'UpdateUser'            => $this->access->get_uid(),
                );

                $this->Content_model->update($this->input->post('IdContent', TRUE), $data);

                redirect(site_url('content/page/' . $this->input->post('Tipe', TRUE)));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }


    // ==========================UPLOAD DATA CONTENT=============================== //


    // LIST UNTUK UPLOAD FILE PER ID TIPE
    public function data($tipe)
    {
        if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")) {
            $content            = $this->Content_model->get_all_query3($tipe);
            $tipetext           = $this->db->query('select keterangan from tipe where IdTipe = ' . $tipe)->row('keterangan');
            $combo_box          = $this->Combobox_model->get_by_tipe($tipe);

            $data = array(
                'tipe'              => $tipe,
                'tipetext'          => $tipetext,
                'combo_box'         => $combo_box,
                'content_data'      => $content,
            );

            $this->template->load('template', 'content/data', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // UNTUK USER / GUEST
    // MELIHAT LIST FILE YG TELAH DI UPLOAD
    public function publish_data($tipe)
    {
        if ($tipe == 59) {
            $data = array(
                'tipe'          => $tipe,
            );

            $this->template->load('template2', 'statistik-data-layanan/index', $data);
        } else {
            $tipetext       = $this->db->query('select keterangan from tipe where IdTipe = ' . $tipe)->row('keterangan');
            $combo_box      = $this->Combobox_model->get_by_tipe($tipe);
            $content        = $this->Content_model->get_all_query3($tipe);

            $data = array(
                'tipe'          => $tipe,
                'tipetext'      => $tipetext,
                'combo_box'     => $combo_box,
                'content_data'  => $content,
            );

            $this->template->load('template2', 'content/publish_data', $data);
        }
    }

    // PROSES CREATE AND EDIT DATA
    public function store_data()
    {
        date_default_timezone_set('Asia/Bangkok');

        $post       = $this->input->post();

        if (isset($post['IsiContent'])) {
            $data['IsiContent'] = $post['IsiContent'];
        }

        if (isset($post['BulanData'])) {
            $data['BulanData']  = $post['BulanData'];
        }

        $data['JudulContent']   = $post['JudulContent'];
        $data['TahunData']      = $post['TahunData'];
        $data['Tipe']           = $post['Tipe'];
        $data['FileUpload']     = $post['FileUpload'];
        $data['UpdateDate']     = date("Y-m-d H:i:sa");
        $data['UpdateUser']     = $this->access->get_uid();
        $data['IsActive']       = 1;

        //upload config 
        if ($post['Tipe'] == 7) {
            $config['upload_path']      = './upload/skdr/';
        } else {
            $config['upload_path']      = './upload/content/';
        }
        $config['allowed_types']    = 'jpeg|jpg|png|pdf|xls|xlsx|doc|docx';
        $config['max_size']         = '0';
        $config['max_width']        = '0';
        $config['max_height']       = '0';

        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        if (!is_dir('upload')) {
            mkdir('./upload', 0777, true);
        }

        // foto
        if ($this->upload->do_upload('FileUpload')) {
            $up_data1       = $this->upload->data();

            $upl_data       = $up_data1['file_name'];
        } else {
            $upl_data       = "";
        }

        if ($upl_data == "") {
        } else {
            $data['FileUpload']     = $upl_data;
            $data['IsUpload']       = 1;
        }

        if ($post['IdContent'] > 0) {
            $this->db->where('IdContent', $post['IdContent'])->update('content', $data);
            echo json_encode(['status' => true, 'msg' => 'Updated']);
        } else {
            $this->db->insert('content', $data);
            echo json_encode(['status' => true, 'msg' => 'Stored']);
        }
    }

    // GET EDIT DATA
    public function edit($id = '')
    {
        $rs = $this->Content_model->find($id);
        echo json_encode($rs);
    }


    // ========================================================= //


    public function delete($id, $tipe, $del_file = false)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $row = $this->Content_model->get_by_id($id);

            if ($tipe == '99' or $tipe == '100') {
                $url = '/page/' . $tipe;
            } elseif ($tipe == '1') {
                $url = '/index/' . $tipe;
            } else {
                $url = '/data/' . $tipe;
            }

            $this->Content_model->delete($id);

            if (!$del_file == null) {
                if ($tipe == 7) {
                    $delfile = unlink('./upload/skdr/' . $del_file);
                } else {
                    $delfile = unlink('./upload/content/' . $del_file);
                }
            }
            $this->session->set_flashdata('message', 'Delete Record Success');

            redirect(site_url('content' . $url));
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('IdContent', 'IdContent', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $this->load->helper('exportexcel');
            $namaFile       = "content.xls";
            $judul          = "content";
            $tablehead      = 0;
            $tablebody      = 1;
            $nourut         = 1;
            //penulisan header
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename=" . $namaFile . "");
            header("Content-Transfer-Encoding: binary ");

            xlsBOF();

            $kolomhead      = 0;
            xlsWriteLabel($tablehead, $kolomhead++, "No");
            xlsWriteLabel($tablehead, $kolomhead++, "Kode Content");
            xlsWriteLabel($tablehead, $kolomhead++, "Nama Content");
            xlsWriteLabel($tablehead, $kolomhead++, "Lokasi Content");

            foreach ($this->Content_model->get_all() as $data) {
                $kolombody  = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, $data->KodeLokasi);
                xlsWriteLabel($tablebody, $kolombody++, $data->KodeBarang);
                xlsWriteLabel($tablebody, $kolombody++, $data->nourut);

                $tablebody++;
                $nourut++;
            }

            xlsEOF();
            exit();
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function word()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=content.doc");

            $data = array(
                'content_data'      => $this->Content_model->get_all(),
                'start'             => 0
            );

            $this->load->view('content/content_doc', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function export()
    {
        $contents       = $this->Content_model->get_all();
        $spreadsheet    = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Content')
            ->setCellValue('C1', 'Bab')
            ->setCellValue('D1', 'Isi Content')
            ->setCellValue('E1', 'Order');

        $kolom          = 2;
        $nomor          = 1;

        foreach ($contents as $content) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $content->JudulContent)
                ->setCellValue('C' . $kolom, $content->Bab)
                //->setCellValue('D' . $kolom, date('j F Y', strtotime($pengguna->tanggal_lahir)))
                ->setCellValue('D' . $kolom, $content->IsiContent)
                ->setCellValue('E' . $kolom, $content->Order);

            $kolom++;
            $nomor++;
        }

        $writer         = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xls"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportword()
    {
        // Creating the new document...
        $phpWord            = new PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section            = $phpWord->addSection();
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
            array(
                'name'      => 'Tahoma',
                'size'      => 10
            )
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName      = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array(
                'name' => 'Tahoma',
                'size' => 10,
                'color' => '1B2232',
                'bold' => true
            )
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle          = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement      = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        $writer             = new Word2007($phpWord);
        $filename           = 'simple';

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '.docx"');
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
        $phpWord        = new PhpWord();
        $section        = $phpWord->addSection();
        $section->addText('Hello World !');

        $writer         = new Word2007($phpWord);
        $filename       = 'simple';

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '.docx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function countview($IdContent)
    {
        date_default_timezone_set('Asia/Bangkok');

        $content        = $this->Content_model->get_by_id($IdContent);
        $link           = $content->UrlLink;

        $data = array(
            'IdContent'     => $content->IdContent,
            'View'          => $content->View + 1
        );
        $this->Content_model->update($IdContent, $data);

        echo $link;
    }

    public function countdownload($IdContent)
    {
        date_default_timezone_set('Asia/Bangkok');

        $content        = $this->Content_model->get_by_id($IdContent);
        $link           = site_url('upload/content/' . $content->FileUpload);

        $data = array(
            'IdContent'     => $content->IdContent,
            'Download'      => $content->Download + 1
        );

        $this->Content_model->update($IdContent, $data);

        echo $link;
    }

    public function ambil_data_content()
    {
        $Periode            = $_GET["Periode"];
        $data["Periode"]    = $_GET["Periode"];

        $this->session->unset_userdata('Periode');
        //$sess_data['id_plant'] = $data["id_plant"];
        $this->session->set_userdata($data);

        $q = $this->db->query("SELECT a.Periode, a.KodeAkun, b.NamaAkun,
                    SUM(IF(Month=1 And Periode=a.Periode, Content, 0)) AS Januari,
                    SUM(IF(Month=2 And Periode=a.Periode, Content, 0)) AS Februari,
                    SUM(IF(Month=3 And Periode=a.Periode, Content, 0)) AS Maret,
                    SUM(IF(Month=4 And Periode=a.Periode, Content, 0)) AS April,
                    SUM(IF(Month=5 And Periode=a.Periode, Content, 0)) AS Mei,
                    SUM(IF(Month=6 And Periode=a.Periode, Content, 0)) AS Juni,
                    SUM(IF(Month=7 And Periode=a.Periode, Content, 0)) AS Juli,
                    SUM(IF(Month=8 And Periode=a.Periode, Content, 0)) AS Agustus,
                    SUM(IF(Month=9 And Periode=a.Periode, Content, 0)) AS September,
                    SUM(IF(Month=10 And Periode=a.Periode, Content, 0)) AS Oktober,
                    SUM(IF(Month=11 And Periode=a.Periode, Content, 0)) AS November,
                    SUM(IF(Month=12 And Periode=a.Periode, Content, 0)) AS Desember
                    FROM content a
                    LEFT JOIN akun b on a.KodeAkun=b.KodeAkun
                    WHERE a.Periode='" . $Periode . "'
                    GROUP BY a.KodeAkun, a.Periode
                    ORDER BY a.KodeAkun");

        echo "<script src=" . base_url() . "AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js></script>
                <link rel='stylesheet' href=" . base_url() . "AdminLTE3/plugins/datatables/dataTables.bootstrap.css>";
        echo "<div class='table table-responsive'>
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>CoA</th>
                            <th>Description</th>
                            <th style='text-align:right'>January</th>
                            <th style='text-align:right'>February</th>
                            <th style='text-align:right'>March</th>
                            <th style='text-align:right'>April</th>
                            <th style='text-align:right'>May</th>
                            <th style='text-align:right'>June</th>
                            <th style='text-align:right'>July</th>
                            <th style='text-align:right'>August</th>
                            <th style='text-align:right'>September</th>
                            <th style='text-align:right'>October</th>
                            <th style='text-align:right'>November</th>
                            <th style='text-align:right'>December</th>
                        </tr>
                    </thead>
                    <tbody>";
        $start = 0;
        foreach ($q->result_array() as $content) { ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $content['KodeAkun'] ?></td>
                <td><?php echo $content['NamaAkun'] ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <td style="text-align:right"><?php echo number_format($content['Januari'], 2, ",", ".") ?></td>
                <!--<td style="text-align:center" width="140px">
                    <?php
                    //echo anchor(site_url('content_detail/index/'.$content->ID_ANGGARAN_BELANJA),'<i class="fa fa-th"></i>',array('title'=>'detail','class'=>'btn btn-success btn-xs')); 
                    //echo '  '; 
                    //echo anchor(site_url('content/read/'.$content->ID_ANGGARAN_BELANJA),'<i class="fa fa-hand-paper-o"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-xs')); 
                    //if($level_sess<>"pegawai") {
                    echo '  ';
                    echo anchor(site_url('content/update/' . $content['IdContent']), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-primary btn-xs'));
                    echo '  ';
                    echo anchor(site_url('content/delete/' . $content['IdContent']), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    //}
                    ?>
                </td>-->
            </tr>
        <?php
        }

        echo "</tbody>
            </table>
            </div>";

        echo "<script src='" . base_url() . "AdminLTE3/plugins/datatables/jquery.dataTables.min.js'></script>
            <script src='" . base_url() . "AdminLTE3/plugins/datatables/dataTables.bootstrap.min.js'></script>";

        echo "<script type='text/javascript'>
                $(document).ready(function () {
                    $('#mytable').DataTable({
                        'lengthMenu': [ [25, 50, 100, 500, -1], [25, 50, 100, 500, 'All'] ]
                    });
                });
            </script>";
    }

    public function ambil_data_regulasi()
    {
        $Kategori           = $_GET["Kategori"];
        $data["Kategori"]   = $_GET["Kategori"];
        $this->session->unset_userdata('Kategori');
        //$sess_data['id_plant'] = $data["id_plant"];
        $this->session->set_userdata($data);

        $q = $this->db->query("SELECT a.*
                FROM content a
                WHERE a.JudulContent='" . $Kategori . "'
                ORDER BY a.JudulContent, a.TahunData");

        echo "<link rel='stylesheet' href='" . base_url() . "AdminLTE3/bootstrap/css/bootstrap.min.css'>
                <script src='" . base_url() . "AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js'></script>
                <link rel='stylesheet' href='" . base_url() . "AdminLTE3/plugins/datatables/dataTables.bootstrap.css'>";

        echo "<style>
        
                .modal-dialog {
                    width: 900px;
                }
        
                .modal-header {
                    background-color: #337AB7;
                    padding:10px 10px;
                    color:#FFF;
                    border-bottom:2px dashed #337AB7;
                }
                </style>";

        echo "<div class='table-responsive'>
                <table class='table table-bordered table-striped' id='mytable'>
                    <thead>
                        <tr>
                            <th>Isi Informasi</th>
                            <th>Nama Dokumen</th>
                            <th>Tahun</th>
                            <th style='text-align:center'></th>
                        </tr>
                    </thead>
                    <tbody>";
        $start = 0;
        $judul = '';
        foreach ($q->result_array() as $content) {
        ?>
            <tr>
                <td><?php
                    if ($content['JudulContent'] <> $judul) {
                        echo $content['JudulContent'];
                    } else {
                        echo '';
                    }
                    ?></td>
                <td><?php echo $content['IsiContent'] ?></td>
                <td><?php echo $content['TahunData'] ?></td>
                <td style="text-align:center" width="190px">
                    <?php if ($content['FileUpload'] <> '') { ?>
                        <button onclick="showClick('<?= $content['IdContent'] ?>','<?= $content['FileUpload'] ?>')" type="button" class="btn btn-success btn-sm"><i class="fa fa-laptop"></i>&nbsp; [ Lihat Data ]</button>
                    <?php } ?>
                </td>
            </tr>

<?php $judul = $content['JudulContent'];
        }

        echo "</tbody>
            </table>
            </div>";

        echo "<script src='" . base_url() . "AdminLTE3/bootstrap/js/bootstrap.min.js'></script>
            <script src='" . base_url() . "AdminLTE3/plugins/datatables/jquery.dataTables.min.js'></script>
            <script src='" . base_url() . "AdminLTE3/plugins/datatables/dataTables.bootstrap.min.js'></script>";

        echo "<script type='text/javascript'>
                $(document).ready(function () {
                    $('#mytable').DataTable({
                        'lengthMenu': [ [25, 50, 100, 500, -1], [25, 50, 100, 500, 'All'] ],
                        'bPaginate': true,
                        'bLengthChange': false,
                        'bFilter': false,
                        'bInfo': false,
                        'bAutoWidth': true,
                        'aaSorting': [],
                        'searching': true
                    });
                });
            </script>";

        echo "<div class='modal fade' id='mymodal' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h3 class='modal-title'>Preview File</h3>
                        </div>
                        <div class='modal-body'>
                            <input type='hidden' class='form-control' id='files'>
                            <embed id='fileup' src='' type='application/pdf' width='100%' height='600px' /></embed>
                        </div>
                        <div class='modal-footer'>
                            <a href='#' data-dismiss='modal' class='btn btn-md btn-default'><i class='fa fa-arrow-left'></i> &nbsp;&nbsp;TUTUP</a>
                        </div>
                    </div>
                </div>
            </div>";

        echo "<script type='text/javascript'>
                function showClick(id, filepath) {
                    $('#IdContent').val(id);                
                    $('#fileup').attr('src','";

        echo base_url() . 'upload/content/';
        echo "'+filepath);
                    
                    $('#mymodal').modal('show');
                }
                </script>";
    }
}

/* End of file Content.php */
/* Location: ./application/controllers/Content.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */
