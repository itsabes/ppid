<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property session $session
 * @property User_model $User_model
 * @property template $template
 * @property db $db
 * @property form_validation $form_validation
 * @property input $input
 * @property upload $upload
 * @property image_lib $image_lib
 */

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")
        ) {
            $user       = $this->User_model->get_all_query();

            $data = array(
                'user_data'     => $user
            );

            $this->template->load('template', 'user/list', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create()
    {
        date_default_timezone_set('Asia/Bangkok');

        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")
        ) {
            $seksi      = $this->db->query('select * from seksi order by Seksi ASC');

            $data = array(
                'button'        => 'Create',
                'action'        => site_url('user/create_action'),
                'id'            => set_value('id'),
                'IdSeksi'       => set_value('IdSeksi'),
                'nama'          => set_value('nama'),
                'telp'          => set_value('telp'),
                'email'         => set_value('email'),
                'level'         => set_value('level'),
                'aplikasi'      => set_value('aplikasi'),
                'username'      => set_value('username'),
                'password'      => set_value('password'),

                'data_seksi'    => $seksi,
            );

            $this->template->load('template', 'user/form', $data);
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function create_action()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")
        ) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
                    'IdSeksi'       => $this->input->post('IdSeksi', TRUE),
                    'nama'          => $this->input->post('nama', TRUE),
                    'telp'          => $this->input->post('telp', TRUE),
                    'email'         => $this->input->post('email', TRUE),
                    'level'         => $this->input->post('level', TRUE),
                    'aplikasi'      => $this->input->post('aplikasi', TRUE),
                    'username'      => $this->input->post('username', TRUE),
                    'password'      => sha1($this->input->post('password', TRUE)),
                );

                $this->db->set('id', 'UUID()', FALSE);
                $this->User_model->insert($data);

                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('user'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function read($id)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")
        ) {
            $row        = $this->User_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'id'            => $row->id,
                    'IdSeksi'       => $row->IdSeksi,
                    'username'      => $row->username,
                    'nama'          => $row->nama,
                    'telp'          => $row->telp,
                    'email'         => $row->email,
                    'alamat'        => $row->alamat,
                    'level'         => $row->level,
                    'aplikasi'      => $row->aplikasi,
                    'password'      => $row->password,
                );

                $this->template->load('template', 'user/read', $data);
            } else {

                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update($id)
    {
        date_default_timezone_set('Asia/Bangkok');

        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")
        ) {
            $row        = $this->User_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button'        => 'Update',
                    'action'        => site_url('user/update_action'),
                    'id'            => set_value('id', $row->id),
                    'IdSeksi'       => set_value('IdSeksi', $row->IdSeksi),
                    'nama'          => set_value('nama', $row->nama),
                    'telp'          => set_value('telp', $row->telp),
                    'email'         => set_value('email', $row->email),
                    'level'         => set_value('level', $row->level),
                    'aplikasi'      => set_value('aplikasi', $row->aplikasi),
                    'username'      => set_value('username', $row->username),
                    'password'      => set_value(''),
                );

                $data['data_seksi'] = $this->db->query('select * from seksi order by Seksi ASC');
                $this->template->load('template', 'user/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function update_action()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")
        ) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
                    'IdSeksi'       => $this->input->post('IdSeksi', TRUE),
                    'nama'          => $this->input->post('nama', TRUE),
                    'telp'          => $this->input->post('telp', TRUE),
                    'email'         => $this->input->post('email', TRUE),
                    'level'         => $this->input->post('level', TRUE),
                    'aplikasi'      => $this->input->post('aplikasi', TRUE),
                    'username'      => $this->input->post('username', TRUE),
                );

                if ($this->input->post('password', TRUE) == '') {
                } else {
                    $data['password'] = sha1($this->input->post('password', TRUE));
                }

                $this->User_model->update($this->input->post('id', TRUE), $data);

                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('user'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function delete($id)
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "user")
        ) {
            $row             = $this->User_model->get_by_id($id);

            if ($row) {
                $this->User_model->delete($id);

                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('user'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span><br>');
    }

    // EDIT PEMOHON
    public function editPemohon($id)
    {
        date_default_timezone_set('Asia/Bangkok');

        if ($this->session->userdata('logged_in') != "") {
            $data       = $this->User_model->get_by_id($id);

            if ($data) {
                echo json_encode($data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user/profile'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    // UPDATE PEMOHON
    public function updatePemohon($id)
    {
        if ($this->session->userdata('logged_in') != "") {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                echo json_encode([
                    'code'          => 402,
                    'message'       => validation_errors()
                ]);
            } else {
                $data = array(
                    'nama'          => $this->input->post('nama', TRUE),
                    'telp'          => $this->input->post('telp', TRUE),
                    'email'         => $this->input->post('email', TRUE),
                );

                if ($this->input->post('password', TRUE) == null) {
                } else {
                    $data['password'] = sha1($this->input->post('password', TRUE));
                }

                $this->User_model->update($id, $data);

                echo json_encode([
                    'code'      => 200,
                    'message'   => 'Data berhasil di update'
                ]);
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    // APP LAMA
    public function profile($id)
    {
        date_default_timezone_set('Asia/Bangkok');

        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "opd" or $this->session->userdata('level') == "verifikator" or $this->session->userdata('level') == "kasubid" or $this->session->userdata('level') == "kabid")
        ) {
            $row        = $this->User_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button'            => 'Update',
                    'action'            => site_url('user/updateprof_action'),
                    'IdUser'            => set_value('IdUser', $row->IdUser),
                    'IdOrganisasi'      => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Nip'               => set_value('Nip', $row->Nip),
                    'NamaUser'          => set_value('NamaUser', $row->NamaUser),
                    'TempatLahir'       => set_value('TempatLahir', $row->TempatLahir),
                    'TanggalLahir'      => set_value('TanggalLahir', $row->TanggalLahir),
                    'Alamat'            => set_value('Alamat', $row->Alamat),
                    'Email'             => set_value('Email', $row->Email),
                    'Foto'              => set_value('Foto', $row->Foto),
                    'Jabatan'           => set_value('Jabatan', $row->Jabatan),
                    'username'          => set_value('username', $row->username),
                    'password'          => set_value('password', $row->password),
                );

                $data['data_organisasi'] = $this->db->query('select * from organisasi order by KodeOrganisasi');

                $this->template->load('template', 'user/profile', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');

                redirect(site_url('user/profile'));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    // APP LAMA
    public function updateprof_action()
    {
        if (
            $this->session->userdata('logged_in') != "" &&
            ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "opd" or $this->session->userdata('level') == "verifikator" or $this->session->userdata('level') == "kasubid" or $this->session->userdata('level') == "kabid")
        ) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('IdUser', TRUE));
            } else {
                //upload config 
                $config['upload_path']      = './upload/user/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if ($this->upload->do_upload('Foto')) {
                    $up_data1       = $this->upload->data();

                    // Resize Image
                    $this->image_lib->initialize(array(
                        'image_library'     => 'gd2', //library yang kita gunakan
                        'source_image'      => './upload/user/' . $up_data1['file_name'],
                        'maintain_ratio'    => TRUE,
                        'create_thumb'      => FALSE,
                        'width'             => 700,
                        'height'            => 550
                    ));
                    $this->image_lib->resize();

                    $upl_data       = $up_data1['file_name'];
                } else {
                    $upl_data       = $this->input->post('Foto', TRUE);
                }

                $data = array(
                    'IdOrganisasi'      => $this->input->post('IdOrganisasi', TRUE),
                    'Nip'               => $this->input->post('Nip', TRUE),
                    'NamaUser'          => $this->input->post('NamaUser', TRUE),
                    'TempatLahir'       => $this->input->post('TempatLahir', TRUE),
                    'TanggalLahir'      => $this->input->post('TanggalLahir', TRUE),
                    'Alamat'            => $this->input->post('Alamat', TRUE),
                    'Email'             => $this->input->post('Email', TRUE),
                    'Foto'              => $upl_data,
                );

                $this->User_model->update($this->input->post('IdUser', TRUE), $data);

                $password       = $this->User_model->get_by_id($this->input->post('IdUser', TRUE));

                if ($password->password == $this->input->post('password', TRUE)) {
                    $pass       = $this->input->post('password', TRUE);
                } else {
                    $pass       = sha1($this->input->post('password', TRUE));
                }

                $data2 = array(
                    'nama'          => $this->input->post('NamaUser', TRUE),
                    'username'      => $this->input->post('username', TRUE),
                    'password'      => $pass,
                );

                $this->User_model->update($this->input->post('IdUser', TRUE), $data2);

                $this->session->set_flashdata('message', 'Update Record Success');

                redirect(site_url('user/profile/' . $this->input->post('IdUser', TRUE)));
            }
        } else {
            header('location:' . base_url() . '');
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');

        $namaFile       = "user.xls";
        $judul          = "user";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Kode User");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama User");
        xlsWriteLabel($tablehead, $kolomhead++, "Luas Penampang");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

        foreach ($this->User_model->get_all() as $data) {
            $kolombody  = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->Nip);
            xlsWriteLabel($tablebody, $kolombody++, $data->NamaUser);
            xlsWriteLabel($tablebody, $kolombody++, $data->TanggalLahir);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data'     => $this->User_model->get_all(),
            'start'         => 0
        );

        $this->load->view('user/doc', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */