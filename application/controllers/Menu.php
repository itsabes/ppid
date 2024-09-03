<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property Menu_model $Menu_model
 * @property template $template
 * @property session $session
 * @property form_validation $form_validation
 * @property input $input
 * @property uri $uri
 * @property pdf $pdf
 */

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index($pos)
    {
        $menu           = $this->Menu_model->get_all_query($pos);

        switch ($pos) {
            case 1;
                $title      = 'Menu Backend';

                break;
            case 2:
                $title      = 'Menu Frontend';

                break;
        }

        $data = array(
            'title'             => $title,
            'menu_data'         => $menu,
            'pos'               => $pos
        );

        $this->template->load('template', 'menu/menu_list', $data);
    }

    public function create($pos)
    {
        $data = array(
            'title'             => 'Menu Form',
            'button'            => 'Create',
            'action'            => site_url('menu/create_action'),
            'id'                => set_value('id'),
            'name'              => set_value('name'),
            'link'              => set_value('link'),
            'icon'              => set_value('icon'),
            'aplikasi'          => set_value('aplikasi'),
            'is_active'         => set_value('is_active'),
            'is_parent'         => set_value('is_parent'),
            'level'             => set_value('level'),
            'urut'              => set_value('urut'),
            'pos'               => $pos
        );

        $this->template->load('template', 'menu/menu_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('pos', TRUE));
        } else {
            $data = array(
                'name'          => $this->input->post('name', TRUE),
                'link'          => $this->input->post('link', TRUE),
                'icon'          => $this->input->post('icon', TRUE),
                'aplikasi'      => $this->input->post('aplikasi', TRUE),
                'is_active'     => $this->input->post('is_active', TRUE),
                'is_parent'     => $this->input->post('is_parent', TRUE),
                'level'         => $this->input->post('level', TRUE),
                'urut'          => $this->input->post('urut', TRUE),
                'pos'           => $this->input->post('pos', TRUE),
            );

            $this->Menu_model->insert($data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu') . '/index/' . $this->input->post('pos', TRUE));
        }
    }

    public function update()
    {
        $id         = $this->uri->segment(3);
        $pos        = $this->uri->segment(4);
        $row        = $this->Menu_model->get_by_id($id);

        switch ($pos) {
            case 1;
                $title      = 'Menu Backend';

                break;
            case 2:
                $title      = 'Menu Frontend';

                break;
        }

        if ($row) {
            $data = array(
                'title'         => $title,
                'button'        => 'Update',
                'action'        => site_url('menu/update_action'),
                'id'            => set_value('id', $row->id),
                'name'          => set_value('name', $row->name),
                'link'          => set_value('link', $row->link),
                'icon'          => set_value('icon', $row->icon),
                'aplikasi'      => set_value('icon', $row->aplikasi),
                'is_active'     => set_value('is_active', $row->is_active),
                'is_parent'     => set_value('is_parent', $row->is_parent),
                'level'         => set_value('level', $row->level),
                'urut'          => set_value('urut', $row->urut),
                'pos'           => $pos
            );

            $this->template->load('template', 'menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'name'          => $this->input->post('name', TRUE),
                'link'          => $this->input->post('link', TRUE),
                'icon'          => $this->input->post('icon', TRUE),
                'aplikasi'      => $this->input->post('aplikasi', TRUE),
                'is_active'     => $this->input->post('is_active', TRUE),
                'is_parent'     => $this->input->post('is_parent', TRUE),
                'level'         => $this->input->post('level', TRUE),
                'urut'          => $this->input->post('urut', TRUE),
            );

            $this->Menu_model->update($this->input->post('id', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu') . '/index/' . $this->input->post('pos', TRUE));
        }
    }

    public function read($id)
    {
        $row        = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'id'            => $row->id,
                'name'          => $row->name,
                'link'          => $row->link,
                'icon'          => $row->icon,
                'aplikasi'      => $row->aplikasi,
                'is_active'     => $row->is_active,
                'is_parent'     => $row->is_parent,
                'level'         => $row->level,
                'urut'          => $row->urut,

                'pos'           => $row->pos,
            );

            $this->template->load('template', 'menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function delete($id)
    {
        $row        = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');
        $this->form_validation->set_rules('icon', 'icon', 'trim|required');
        $this->form_validation->set_rules('aplikasi', 'aplikasi', 'trim|required');
        $this->form_validation->set_rules('is_active', 'is active', 'trim|required');
        $this->form_validation->set_rules('is_parent', 'is parent', 'trim|required');
        $this->form_validation->set_rules('level', 'is level', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-01 09:22:19 */
/* http://harviacode.com */