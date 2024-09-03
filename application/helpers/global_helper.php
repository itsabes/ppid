<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// namaweb
function namaweb()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->namaweb;
}

// singkatan
function singkatan()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->singkatan;
}

// title
function title()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->namaweb . ' | ' . $konfigurasi->tagline;
}

// tagline
function tagline()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->tagline;
}

// tentang
function tentang()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->tentang;
}

// deskripsi
function deskripsi()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->deskripsi;
}

// email
function email()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->email;
}

// alamat
function alamat()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->alamat;
}

// telepon
function telepon()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->telepon;
}

// hp
function hp()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->hp;
}

// jam_operasional
function jam_operasional()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->jam_operasional;
}

// logo
function logo()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return base_url('upload/image/' . $konfigurasi->logo);
}

// icon
function icon()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return base_url('upload/image/' . $konfigurasi->icon);
}

// keywords
function keywords()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->keywords;
}

// metatext
function metatext()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->metatext;
}

// website
function website()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->website;
}

// nama_website
function nama_website()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->nama_website;
}

// facebook
function facebook()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->facebook;
}

// nama_facebook
function nama_facebook()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->nama_facebook;
}

// twitter
function twitter()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->twitter;
}

// nama_twitter
function nama_twitter()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->nama_twitter;
}

// instagram
function instagram()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->instagram;
}

// nama_instagram
function nama_instagram()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->nama_instagram;
}

// youtube
function youtube()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->youtube;
}

// nama_youtube
function nama_youtube()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->nama_youtube;
}

// tiktok
function tiktok()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->tiktok;
}

// nama_tiktok
function nama_tiktok()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->nama_tiktok;
}

// google_map
function google_map()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->google_map;
}

// responsivevoice
function responsivevoice()
{
    $CI = &get_instance();
    $CI->load->model('Konfigurasi_model');
    $konfigurasi = $CI->Konfigurasi_model->listing();

    return $konfigurasi->responsivevoice;
}
