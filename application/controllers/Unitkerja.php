<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

/**
 * @property load $load
 * @property Unitkerja_model $Unitkerja_model
 * @property access $access
 * @property template $template
 * @property input $input
 * @property db $db
 * @property session $session
 * @property form_validation $form_validation
 */

class Unitkerja extends CI_Controller
{
    // private $filename = "import_data"; // Kita tentukan nama filenya

    function __construct()
    {
        parent::__construct();
        $this->load->model('Unitkerja_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $uk_sudin       = $this->Unitkerja_model->get_jenis('Suku Dinas Kesehatan');
        $uk_upt         = $this->Unitkerja_model->get_jenis('Unit Pelaksana Teknis (UPT)');
        $uk_rsud        = $this->Unitkerja_model->get_jenis('Rumah Sehat Jakarta');
        $uk_pkc         = $this->Unitkerja_model->get_jenis('Puskesmas');

        $data = array(
            'sudin_data'        => $uk_sudin,
            'upt_data'          => $uk_upt,
            'rsud_data'         => $uk_rsud,
            'pkc_data'          => $uk_pkc
        );

        $this->template->load('template2', 'unitkerja/index', $data);
    }

    public function read($id = '')
    {
        $row = $this->Unitkerja_model->get_by_id($id);
        echo json_encode($row);
    }

    public function listing()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') != "pemohon")
        ) {
            $uk       = $this->Unitkerja_model->get_all();

            $data = array(
                'level_sess'        => $this->access->get_level(),
                'uk_data'           => $uk
            );

            $this->template->load('template', 'unitkerja/list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    // Edit dan tambah
    public function store($value = '')
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->listing();
        } else {
            date_default_timezone_set('Asia/Bangkok');

            $post       = $this->input->post();

            $data['JenisUk']        = $post['JenisUk'];
            $data['NamaUk']         = $post['NamaUk'];
            $data['Telepon']        = $post['Telepon'];
            $data['Faximile']       = $post['Faximile'];
            $data['Alamat']         = $post['Alamat'];
            $data['WebUnitKerja']   = $post['WebUnitKerja'];
            $data['WebPpid']        = $post['WebPpid'];

            if ($post['IdUnitKerja'] > 0) {
                $this->db->where('IdUnitKerja', $post['IdUnitKerja'])->update('unit_kerja', $data);

                echo json_encode(['status' => true, 'msg' => 'Updated']);
            } else {
                $this->db->insert('unit_kerja', $data);

                echo json_encode(['status' => true, 'msg' => 'Stored']);
            }
        }
    }

    public function delete($id)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $row        = $this->Unitkerja_model->get_by_id($id);

            if ($row) {
                $this->Unitkerja_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');

                redirect(site_url('unitkerja/list'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');

                redirect(site_url('unitkerja/list'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    // Export excel semua data
    public function exportexcel()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Alamat UKPD dan UPT Dinas Kesehatan DKI.xls");

        $data = array(
            'excel_data'    => $this->Unitkerja_model->get_all(),
            'start'         => 0
        );

        $this->load->view('unitkerja/uk_doc', $data);
    }

    // Export excel Suku Dinas Kesehatan
    public function exportexcelsudin()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Suku Dinas Kesehatan.xls");

        $data = array(
            'excel_data'    => $this->Unitkerja_model->get_jenis('Suku Dinas Kesehatan'),
            'start'         => 0
        );

        $this->load->view('unitkerja/uk_doc', $data);
    }

    // Export excel Unit Pelaksana Teknis (UPT)
    public function exportexcelupt()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Unit Pelaksana Teknis (UPT).xls");

        $data = array(
            'excel_data'    => $this->Unitkerja_model->get_jenis('Unit Pelaksana Teknis (UPT)'),
            'start'         => 0
        );

        $this->load->view('unitkerja/uk_doc', $data);
    }

    // Export excel Rumah Sehat Jakarta
    public function exportexcelrsud()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Rumah Sehat Jakarta.xls");

        $data = array(
            'excel_data'    => $this->Unitkerja_model->get_jenis('Rumah Sehat Jakarta'),
            'start'         => 0
        );

        $this->load->view('unitkerja/uk_doc', $data);
    }

    // Export excel Puskesmas
    public function exportexcelpkc()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Puskesmas.xls");

        $data = array(
            'excel_data'    => $this->Unitkerja_model->get_jenis('Puskesmas'),
            'start'         => 0
        );

        $this->load->view('unitkerja/uk_doc', $data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('JenisUk', 'Jenis', 'required');
        $this->form_validation->set_rules('NamaUk', 'Nama', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
