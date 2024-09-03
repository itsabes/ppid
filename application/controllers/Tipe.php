<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property Tipe_model $Tipe_model
 * @property access $access
 * @property template $template
 * @property session $session
 * @property form_validation $form_validation
 * @property input $input
 */

class Tipe extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipe_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $tipe         = $this->Tipe_model->get_all();

            $data = array(
                'level_sess'        => $this->access->get_level(),
                'tipe_data'         => $tipe
            );

            $this->template->load('template', 'tipe/list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $data = array(
                'disable'           => '',
                'button'            => 'Create',
                'action'            => site_url('tipe/create_action'),
                'IdTipe'            => set_value('IdTipe'),
                'Tipe'              => set_value('Tipe'),
                'Keterangan'        => set_value('Keterangan'),
            );

            $this->template->load('template', 'tipe/form', $data);
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
            $data = array(
                'Tipe'        => $this->input->post('Tipe', TRUE),
                'Keterangan'        => $this->input->post('Keterangan', TRUE),
            );

            $this->Tipe_model->insert($data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tipe'));
        }
    }

    public function update($id)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $row        = $this->Tipe_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable'       => '',
                    'button'        => 'Update',
                    'action'        => site_url('tipe/update_action'),
                    'IdTipe'        => set_value('IdTipe', $row->IdTipe),
                    'Tipe'          => set_value('Tipe', $row->Tipe),
                    'Keterangan'    => set_value('Keterangan', $row->Keterangan),
                );

                $this->template->load('template', 'tipe/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('tipe'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('IdTipe', TRUE));
        } else {
            $data = array(
                'Tipe'          => $this->input->post('Tipe', TRUE),
                'Keterangan'    => $this->input->post('Keterangan', TRUE),
            );

            $this->Tipe_model->update($this->input->post('IdTipe', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tipe'));
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
        $this->form_validation->set_rules('Tipe', 'Kode Tipe', 'required');
        $this->form_validation->set_rules('Keterangan', 'Keterangan Tipe', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
