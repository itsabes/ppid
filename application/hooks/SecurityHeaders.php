<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Security Headers Hook
 * 
 * Menambahkan HTTP security headers ke setiap response.
 * Diperlukan untuk WAF compliance Diskominfotik DKI Jakarta.
 * 
 * Diaktifkan via: application/config/hooks.php
 */
class SecurityHeaders
{
    public function set()
    {
        // Cegah embedding di iframe dari domain lain (clickjacking protection)
        header('X-Frame-Options: SAMEORIGIN');

        // Cegah browser menebak content-type dari konten (MIME sniffing)
        header('X-Content-Type-Options: nosniff');

        // Aktifkan built-in XSS filter browser (legacy browsers)
        header('X-XSS-Protection: 1; mode=block');

        // Kontrol informasi referrer yang dikirim ke server lain
        header('Referrer-Policy: strict-origin-when-cross-origin');

        // Batasi fitur browser yang bisa digunakan
        header('Permissions-Policy: geolocation=(), microphone=(), camera=()');

        // Content Security Policy - dikonfigurasi agar tidak memblokir fitur eksisting
        header("Content-Security-Policy: " .
            "default-src 'self'; " .
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' " .
                "https://cdnjs.cloudflare.com " .
                "https://cdn.jsdelivr.net " .
                "https://maxcdn.bootstrapcdn.com " .
                "https://code.ionicframework.com; " .
            "style-src 'self' 'unsafe-inline' " .
                "https://fonts.googleapis.com " .
                "https://cdnjs.cloudflare.com " .
                "https://cdn.jsdelivr.net " .
                "https://maxcdn.bootstrapcdn.com " .
                "https://code.ionicframework.com; " .
            "font-src 'self' data: " .
                "https://fonts.gstatic.com " .
                "https://cdnjs.cloudflare.com " .
                "https://maxcdn.bootstrapcdn.com " .
                "https://cdn.jsdelivr.net " .
                "https://code.ionicframework.com; " .
            "img-src 'self' data: blob:; " .
            "connect-src 'self' " .
                "https://ppid.animemusic.us " .
                "https://ppid.jakarta.go.id; " .
            "frame-ancestors 'self'; " .
            "form-action 'self';"
        );

        // Hapus header yang mengekspos informasi server
        header_remove('X-Powered-By');
    }
}

