<?php

defined('BASEPATH') or exit('No direct script access allowed');

// CONFIG EMAIL
$config['mailtype'] = "html";
$config['charset'] = "utf-8";
$config['protocol'] = "smtp";
$config['smtp_host'] = "xxx.xxx.xxx.xxx";
$config['smtp_user'] = "xxxx@jakarta.go.id";
$config['smtp_pass'] = "xxxxx";
$config['smtp_port'] = 25;
$config['nama_pengirim'] = 'xxxxx'; // exmp : PPID Dinkes DKI Jakarta
$config['ssl'] = 0; // isi 0 jika menggunakan email .go.id, isi 1 jika menggunakan gmail

$config['id_skpd_ppid_pemprov'] = 'xxxx'; // integer