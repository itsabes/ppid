<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property Pejabat_struktural_model $Pejabat_struktural_model
 * @property access $access
 * @property template $template
 * @property session $session
 * @property form_validation $form_validation
 * @property input $input
 * @property upload $upload
 * @property db $db
 */

class PejabatStruktural extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pejabat_struktural_model');
        $this->load->library('form_validation');
    }

    // List pejabat struktural setelah login
    public function index()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $pejabat         = $this->Pejabat_struktural_model->get_all();

            $data = array(
                'level_sess'        => $this->access->get_level(),
                'title'             => 'Pejabat Struktural',
                'pejabat'           => $pejabat
            );

            $this->template->load('template', 'pejabat_struktural/index', $data);
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
                'title'                         => 'Pejabat Struktural',
                'disable'                       => '',
                'button'                        => 'Create',
                'action'                        => site_url('pejabatStruktural/create_action'),
                'id_pejabat_struktural'         => set_value('id_pejabat_struktural'),
                'nama_pejabat_struktural'       => set_value('nama_pejabat_struktural'),
                'jabatan_pejabat_struktural'    => set_value('jabatan_pejabat_struktural'),
                'ttl_pejabat_struktural'        => set_value('ttl_pejabat_struktural'),
                'no_urut'                       => set_value('no_urut'),
            );

            $this->template->load('template', 'pejabat_struktural/form', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create_action()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                //upload config 
                $config['upload_path']      = './upload/pejabat-struktural/';
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                $config['encrypt_name']     = true;

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if (!is_dir('upload')) {
                    mkdir('./upload', 0777, true);
                }

                // Foto
                if ($this->upload->do_upload('foto_pejabat_struktural')) {
                    $up_data1       = $this->upload->data();
                    $foto           = $up_data1['file_name'];

                    $data['foto_pejabat_struktural']   = $foto;
                }

                // Lampiran
                if ($this->upload->do_upload('lampiran_pejabat_struktural')) {
                    $up_data2       = $this->upload->data();
                    $lampiran       = $up_data2['file_name'];

                    $data['lampiran_pejabat_struktural']   = $lampiran;
                }

                $data['nama_pejabat_struktural']        = $this->input->post('nama_pejabat_struktural', TRUE);
                $data['jabatan_pejabat_struktural']     = $this->input->post('jabatan_pejabat_struktural', TRUE);
                $data['ttl_pejabat_struktural']         = $this->input->post('ttl_pejabat_struktural', TRUE);
                $data['no_urut']                        = $this->input->post('no_urut', TRUE);

                $this->db->set('id_pejabat_struktural', 'UUID()', FALSE);

                $this->Pejabat_struktural_model->insert($data);

                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('pejabatStruktural'));
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
            $row        = $this->Pejabat_struktural_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'title'                         => 'Pejabat Struktural',
                    'disable'                       => '',
                    'button'                        => 'Update',
                    'action'                        => site_url('pejabatStruktural/update_action'),
                    'id_pejabat_struktural'         => set_value('id_pejabat_struktural', $row->id_pejabat_struktural),
                    'nama_pejabat_struktural'       => set_value('nama_pejabat_struktural', $row->nama_pejabat_struktural),
                    'jabatan_pejabat_struktural'    => set_value('jabatan_pejabat_struktural', $row->jabatan_pejabat_struktural),
                    'ttl_pejabat_struktural'        => set_value('ttl_pejabat_struktural', $row->ttl_pejabat_struktural),
                    'no_urut'                       => set_value('no_urut', $row->no_urut),
                );

                $this->template->load('template', 'pejabat_struktural/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('pejabatStruktural'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update_action()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator")
        ) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id_pejabat_struktural', TRUE));
            } else {
                $pejabat        = $this->Pejabat_struktural_model->get_by_id($id);

                //upload config 
                $config['upload_path']      = './upload/pejabat-struktural/';
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                $config['encrypt_name']     = true;

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if (!is_dir('upload')) {
                    mkdir('./upload', 0777, true);
                }

                // Foto
                if ($this->upload->do_upload('foto_pejabat_struktural')) {
                    $up_data1       = $this->upload->data();
                    $foto           = $up_data1['file_name'];

                    if ($pejabat->foto_pejabat_struktural) {
                        unlink('./upload/pejabat-struktural/' . $pejabat->foto_pejabat_struktural);
                    }

                    $data['foto_pejabat_struktural']   = $foto;
                }

                // Lampiran
                if ($this->upload->do_upload('lampiran_pejabat_struktural')) {
                    $up_data2       = $this->upload->data();
                    $lampiran       = $up_data2['file_name'];

                    if ($pejabat->lampiran_pejabat_struktural) {
                        unlink('./upload/pejabat-struktural/' . $pejabat->lampiran_pejabat_struktural);
                    }

                    $data['lampiran_pejabat_struktural']   = $lampiran;
                }

                $data['nama_pejabat_struktural']        = $this->input->post('nama_pejabat_struktural', TRUE);
                $data['jabatan_pejabat_struktural']     = $this->input->post('jabatan_pejabat_struktural', TRUE);
                $data['ttl_pejabat_struktural']         = $this->input->post('ttl_pejabat_struktural', TRUE);
                $data['no_urut']                        = $this->input->post('no_urut', TRUE);

                $this->Pejabat_struktural_model->update($this->input->post('id_pejabat_struktural', TRUE), $data);

                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('pejabatStruktural'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    // public function delete($id)
    // {
    //     $row        = $this->Bidang_model->get_by_id($id);

    //     if ($row) {
    //         $this->Bidang_model->delete($id);

    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('bidang'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('bidang'));
    //     }
    // }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_pejabat_struktural', 'Nama Pejabat', 'trim|required');
        $this->form_validation->set_rules('jabatan_pejabat_struktural', 'Jabatan Pejabat', 'trim|required');
        $this->form_validation->set_rules('ttl_pejabat_struktural', 'Tempat Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('no_urut', 'Nomor Urut', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    // View all untuk publik di profil pejabat struktural
    public function viewAll()
    {
        $pejabat         = $this->Pejabat_struktural_model->get_all();

        $data = array(
            'title'         => "PROFIL SINGKAT PEJABAT STRUKTURAL",
            'pejabat'       => $pejabat
        );

        $this->template->load('template2', 'pejabat_struktural/view_all', $data);
    }
}
