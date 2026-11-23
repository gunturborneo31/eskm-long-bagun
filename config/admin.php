<?php

/*
 * Akun admin E-SKM. Atur di .env:
 *   ADMIN_USERNAME=...
 *   ADMIN_PASSWORD=...
 * Setelah mengubah .env di server yang memakai config cache, jalankan `php artisan config:clear`.
 */
return [
    'username' => env('ADMIN_USERNAME', 'admin'),
    'password' => env('ADMIN_PASSWORD', 'admin'),
];
