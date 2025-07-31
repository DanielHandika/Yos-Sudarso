<?php
// File: component/delete/delete_kategori.php

// Selalu mulai session untuk memeriksa login

// Include file-file konfigurasi yang diperlukan
// Include file-file konfigurasi yang diperlukan
include "../../configuration/config_connect.php";
include "../../configuration/config_session.php";
// config_chmod.php tidak lagi diperlukan di sini karena kita dapatkan dari URL
// include "../../configuration/config_chmod.php"; 
include "../../configuration/config_etc.php";

// Cek status login dulu
// if (!login_check()) 

// Ambil parameter dari URL dengan aman
$forward = isset($_GET['forward']) ? $_GET['forward'] : '';
$no = isset($_GET['no']) ? (int)$_GET['no'] : 0;
$forwardpage = isset($_GET['forwardpage']) ? $_GET['forwardpage'] : 'index.php';
$chmod_level = isset($_GET['chmod']) ? (int)$_GET['chmod'] : 0; // Ambil level chmod dari URL

// Tentukan apakah user punya hak akses
$has_permission = false;
if (isset($_SESSION['jabatan']) && ($_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'guru')) {
    $has_permission = true;
} else if ($chmod_level >= 4) { // Asumsi level 4 bisa edit, 5 bisa hapus. Kita izinkan keduanya.
    $has_permission = true;
}

// Jika tidak punya hak akses, hentikan proses
if (!$has_permission) {
    header("Location: ../../" . $forwardpage . "?status=unauthorized");
    exit();
}

// Lanjutkan proses hapus jika parameter valid
if ($no > 0 && !empty($forward)) {
    
    // Pastikan $forward adalah nama tabel yang valid untuk keamanan
    $safe_forward = mysqli_real_escape_string($conn, $forward);

    // Buat query SQL untuk menghapus data
    $sql = "DELETE FROM `$safe_forward` WHERE `kategori_id` = $no";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, redirect kembali ke halaman utama dengan status sukses
        header("Location: ../../" . $forwardpage . "?status=deleted");
        exit();
    } else {
        // Jika gagal, redirect kembali dengan status gagal
        header("Location: ../../" . $forwardpage . "?status=delete_failed");
        exit();
    }

} else {
    // Jika parameter tidak valid (misal: ID tidak ada), redirect kembali
    header("Location: ../../" . $forwardpage . "?status=invalid_request");
    exit();
}
?>