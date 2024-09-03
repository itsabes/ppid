<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property Seksi_model $Seksi_model
 * @property access $access
 * @property template $template
 * @property session $session
 * @property db $db
 * @property form_validation $form_validation
 * @property input $input
 */

class Seksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Seksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")) {
            $seksi          = $this->Seksi_model->get_all_query();

            $data = array(
                'level_sess'        => $this->access->get_level(),
                'seksi_data'        => $seksi
            );

            $this->template->load('template', 'seksi/list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create()
    {
        $bidang         = $this->db->query('select * from bidang order by Bidang ASC');

        $data = array(
            'disable'           => '',
            'button'            => 'Create',
            'action'            => site_url('seksi/create_action'),
            'IdSeksi'           => set_value('IdSeksi'),
            'IdBidang'          => set_value('IdBidang'),
            'Seksi'             => set_value('Seksi'),

            'data_bidang'       => $bidang,
        );

        $this->template->load('template', 'seksi/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'IdBidang'      => $this->input->post('IdBidang', TRUE),
                'Seksi'         => $this->input->post('Seksi', TRUE),
            );

            $this->Seksi_model->insert($data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('seksi'));
        }
    }

    public function update($id)
    {
        $row            = $this->Seksi_model->get_by_id($id);
        $bidang         = $this->db->query('select * from bidang order by Bidang ASC');

        if ($row) {
            $data = array(
                'disable'           => '',
                'button'            => 'Update',
                'action'            => site_url('seksi/update_action'),
                'IdSeksi'           => set_value('IdSeksi', $row->IdSeksi),
                'IdBidang'          => set_value('IdBidang', $row->IdBidang),
                'Seksi'             => set_value('Seksi', $row->Seksi),

                'data_bidang'       => $bidang,
            );

            $this->template->load('template', 'seksi/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('seksi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('IdSeksi', TRUE));
        } else {
            $data = array(
                'IdBidang'          => $this->input->post('IdBidang', TRUE),
                'Seksi'             => $this->input->post('Seksi', TRUE),
            );

            $this->Seksi_model->update($this->input->post('IdSeksi', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('seksi'));
        }
    }

    public function delete($id)
    {
        $row            = $this->Seksi_model->get_by_id($id);

        if ($row) {
            $this->Seksi_model->delete($id);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('seksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('seksi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('IdBidang', 'Kode Seksi', 'trim|required');
        $this->form_validation->set_rules('Seksi', 'Nama Seksi', 'trim|required');
        $this->form_validation->set_rules('IdSeksi', 'IdSeksi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    // public function excel()
    // {
    //     $this->load->helper('exportexcel');
    //     $namaFile = "seksi.xls";
    //     $judul = "seksi";
    //     $tablehead = 0;
    //     $tablebody = 1;
    //     $nourut = 1;
    //     //penulisan header
    //     header("Pragma: public");
    //     header("Expires: 0");
    //     header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    //     header("Content-Type: application/force-download");
    //     header("Content-Type: application/octet-stream");
    //     header("Content-Type: application/download");
    //     header("Content-Disposition: attachment;filename=" . $namaFile . "");
    //     header("Content-Transfer-Encoding: binary ");

    //     xlsBOF();

    //     $kolomhead = 0;
    //     xlsWriteLabel($tablehead, $kolomhead++, "No");
    //     xlsWriteLabel($tablehead, $kolomhead++, "Kode Seksi");
    //     xlsWriteLabel($tablehead, $kolomhead++, "Nama Seksi");

    //     foreach ($this->Seksi_model->get_all() as $data) {
    //         $kolombody = 0;

    //         //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
    //         xlsWriteNumber($tablebody, $kolombody++, $nourut);
    //         xlsWriteLabel($tablebody, $kolombody++, $data->IdBidang);
    //         xlsWriteLabel($tablebody, $kolombody++, $data->Seksi);

    //         $tablebody++;
    //         $nourut++;
    //     }

    //     xlsEOF();
    //     exit();
    // }

    // public function word()
    // {
    //     header("Content-type: application/vnd.ms-word");
    //     header("Content-Disposition: attachment;Filename=seksi.doc");

    //     $data = array(
    //         'seksi_data' => $this->Seksi_model->get_all(),
    //         'start' => 0
    //     );

    //     $this->load->view('seksi/doc', $data);
    // }
}

/* End of file Seksi.php */
/* Location: ./application/controllers/Seksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */