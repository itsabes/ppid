<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property load $load
 * @property Content_model $Content_model
 * @property template $template
 * @property session $session
 * @property form_validation $form_validation
 * @property db $db
 */

class Skdr extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['Tipe']       = "Buletin Sistem Kewaspadaan Dini dan Respon";

        $this->template->load('template2', 'skdr/index', $data);
    }

    public function show($tahun)
    {
        $content            = $this->Content_model->get_skdr_by_tahun($tahun);
        $tipe               = "Buletin Sistem Kewaspadaan Dini dan Respon Tahun " . $tahun;

        $data = array(
            'content_data'      => $content,
            'Tipe'              => $tipe,
        );

        $this->template->load('template2', 'skdr/show', $data);
    }

    public function countview($IdContent)
    {
        date_default_timezone_set('Asia/Bangkok');

        $content            = $this->Content_model->get_by_id($IdContent);
        $link               = $content->UrlLink;

        $data = array(
            'IdContent'         => $content->IdContent,
            'View'              => $content->View + 1
        );

        $this->Content_model->update($IdContent, $data);

        echo $link;
    }

    public function countdownload($IdContent)
    {
        date_default_timezone_set('Asia/Bangkok');

        $content            = $this->Content_model->get_by_id($IdContent);
        $link               = site_url('upload/skdr/' . $content->FileUpload);

        $data = array(
            'IdContent'         => $content->IdContent,
            'Download'          => $content->Download + 1
        );

        $this->Content_model->update($IdContent, $data);

        echo $link;
    }
}
