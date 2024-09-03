<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property Combobox_model $Combobox_model
 * @property Tipe_model $Tipe_model
 * @property access $access
 * @property template $template
 * @property session $session
 * @property form_validation $form_validation
 * @property input $input
 * @property db $db
 */

class Combobox extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Combobox_model');
        $this->load->model('Tipe_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $combobox       = $this->Combobox_model->get_all();

            $data = array(
                'level_sess'        => $this->access->get_level(),
                'combobox'          => $combobox
            );

            $this->template->load('template', 'combobox/list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create()
    {
        $tipe           = $this->Tipe_model->get_all();

        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $data = array(
                'disable'           => '',
                'button'            => 'Create',
                'action'            => site_url('combobox/create_action'),
                'id_combobox'       => set_value('id_combobox'),
                'id_tipe'           => set_value('id_tipe'),
                'kode'              => set_value('kode'),
                'nama'              => set_value('nama'),
                'keterangan'        => set_value('keterangan'),
                'is_active'         => set_value('is_active'),

                'tipe'              => $tipe
            );

            $this->template->load('template', 'combobox/form', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            date_default_timezone_set('Asia/Bangkok');

            $data = array(
                'id_tipe'       => $this->input->post('id_tipe', TRUE),
                'kode'          => $this->input->post('kode', TRUE),
                'nama'          => $this->input->post('nama', TRUE),
                'keterangan'    => $this->input->post('keterangan', TRUE),
                'slug'          => url_title($this->input->post('nama', TRUE), 'dash', true),
                'is_active'     => $this->input->post('is_active', TRUE),
                'CreateDate'    => date("Y-m-d h:i:sa"),
            );

            $this->db->insert('combo_box', $data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('combobox'));
        }
    }

    public function update($id)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $row        = $this->Combobox_model->get_by_id($id);
            $tipe       = $this->Tipe_model->get_all();

            if ($row) {
                $data = array(
                    'disable'           => '',
                    'button'            => 'Update',
                    'action'            => site_url('combobox/update_action'),
                    'id_combobox'       => set_value('id_combobox', $row->id_combobox),
                    'id_tipe'           => set_value('id_tipe', $row->id_tipe),
                    'kode'              => set_value('kode', $row->kode),
                    'nama'              => set_value('nama', $row->nama),
                    'keterangan'        => set_value('keterangan', $row->keterangan),
                    'is_active'         => set_value('is_active', $row->is_active),

                    'tipe'              => $tipe,
                );

                $this->template->load('template', 'combobox/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('combobox'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_combobox', TRUE));
        } else {
            $data = array(
                'id_tipe'       => $this->input->post('id_tipe', TRUE),
                'kode'          => $this->input->post('kode', TRUE),
                'nama'          => $this->input->post('nama', TRUE),
                'keterangan'    => $this->input->post('keterangan', TRUE),
                'slug'          => url_title($this->input->post('nama', TRUE), 'dash', true),
                'is_active'     => $this->input->post('is_active', TRUE)
            );

            $this->Combobox_model->update($this->input->post('id_combobox', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('combobox'));
        }
    }

    // public function delete($id)
    // {
    //     $row        = $this->Tipe_model->get_by_id($id);

    //     if ($row) {
    //         $this->Tipe_model->delete($id);

    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('tipe'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('tipe'));
    //     }
    // }

    public function _rules()
    {
        $this->form_validation->set_rules('id_tipe', 'Nama Tipe', 'required');
        $this->form_validation->set_rules('kode', 'Kode Combobox', 'required');
        $this->form_validation->set_rules('nama', 'Nama Combobox', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Combobox', 'required');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
