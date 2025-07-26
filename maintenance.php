<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="assets/images/title.png">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="maintenance-wrapper d-flex justify-content-center align-items-center min-vh-100">
        <div class="container maintenance-container">
            <div class="row align-items-center">
                <!-- Bagian Kiri: Teks -->
                <div class="col-12 col-lg-6 text-content order-lg-1 order-2">
                    <h1 class="display-4 fw-bold mb-4 text-primary">Web Sedang Dalam Perbaikan dan Pengembangan</h1>
                    <p class="lead mb-4 text-secondary">
                        Kami sedang melakukan pembaruan sistem untuk meningkatkan kualitas layanan Anda. Mohon maaf atas ketidaknyamanan ini. Kami berupaya keras agar situs kembali normal secepatnya.
                    </p>
                    <!-- Tombol untuk konfirmasi atau informasi lebih lanjut -->
                    <a href="login.php"><button class="btn btn-primary btn-lg custom-btn">Mengerti</button></a>
                    <!-- Anda bisa menambahkan estimasi waktu di sini jika perlu -->
                </div>

                <!-- Bagian Kanan: Ilustrasi -->
                <div class="col-12 col-lg-6 illustration-content order-lg-2 order-1 mb-4 mb-lg-0">
                    <!-- Ganti URL gambar di bawah dengan ilustrasi yang Anda pilih dari Google -->
                    <img src="upload/image/maintenance.jpg" alt="Maintenance Illustration" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Import Google Fonts (Poppins) */
/* Import Google Fonts (Poppins) */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

html, body {
    margin: 0;
    padding: 0;
    /* Sangat penting: Sembunyikan semua overflow horizontal dari root HTML dan Body */
    overflow-x: hidden;
    /* Pastikan tinggi minimal untuk gradasi */
    min-height: 100vh;
}

body {
    font-family: 'Poppins', sans-serif;
    /* Gradasi background biru muda ke putih */
    background: linear-gradient(to bottom right, #e0f7fa, #ffffff);
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: #333;
    /* Izinkan scrolling vertikal jika konten melebihi tinggi layar */
    overflow-y: auto;
}

/* Kontainer utama untuk centering */
.maintenance-wrapper {
    position: relative;
    /* Gunakan 100vw untuk memastikan mengisi seluruh lebar viewport secara eksplisit */
    width: 100vw;
    height: 100vh; /* Memastikan mengisi seluruh tinggi layar */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px; /* Padding di sekitar konten utama */
    /* Pastikan wrapper ini juga tidak meluber */
    overflow: hidden;
}

/* Bentuk abstrak di background */
.maintenance-wrapper::before,
.maintenance-wrapper::after {
    content: '';
    position: absolute;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    filter: blur(50px);
    z-index: 0;
    /* Pastikan posisi elemen ini tidak mendorong layout */
    /* Nilai negatif harus diimbangi dengan overflow: hidden pada parent */
}

.maintenance-wrapper::before {
    width: 300px;
    height: 300px;
    top: -50px;
    left: -50px;
    background: rgba(173, 216, 230, 0.4);
}

.maintenance-wrapper::after {
    width: 400px;
    height: 400px;
    bottom: -100px;
    right: -100px;
    background: rgba(255, 255, 255, 0.6);
}

.maintenance-container {
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 60px 50px;
    z-index: 1;
    max-width: 1100px;
    width: 95%; /* Tetap gunakan persentase untuk responsivitas */
    animation: fadeInScale 0.8s ease-out;
    /* Tambahkan overflow-x: hidden; di sini juga sebagai lapisan pengaman */
    overflow-x: hidden;
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.text-content {
    /* Padding kanan hanya untuk desktop, akan direset di media query */
    padding-right: 30px;
}

.illustration-content {
    text-align: center;
}

.illustration-content img {
    max-width: 100%;
    height: auto;
    display: block; /* Pastikan gambar berperilaku sebagai blok */
}

.custom-btn {
    background-color: #ff7f50;
    border-color: #ff7f50;
    padding: 12px 30px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 8px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.custom-btn:hover {
    background-color: #ff6347;
    border-color: #ff6347;
}

.custom-lead-text {
    font-size: 1.1rem;
    line-height: 1.6;
}

/* Responsiveness */
@media (max-width: 991px) { /* Tablet dan Mobile Landscape */
    .maintenance-container {
        flex-direction: column;
        padding: 40px 30px; /* Sesuaikan padding */
        max-width: 90%; /* Sesuaikan lebar */
        width: 95%; /* Pastikan lebar diatur dengan baik */
    }
    .text-content {
        padding-right: 0; /* Hapus padding kanan di sini */
        padding-bottom: 30px;
        text-align: center;
    }
    .illustration-content {
        order: 1;
    }
    .text-content {
        order: 2;
    }
    .maintenance-wrapper::before,
    .maintenance-wrapper::after {
        filter: blur(30px);
    }
    .text-content h1 {
        font-size: 2.5rem;
    }
    .custom-lead-text {
        font-size: 1rem;
    }
}

@media (max-width: 576px) { /* Mobile Portrait */
    .maintenance-wrapper {
        /* Padding yang lebih besar untuk menciptakan gap dari tepi layar */
        padding: 40px 20px; /* Padding atas/bawah 40px, kiri/kanan 20px */
        align-items: center; /* Kembali ke center agar konten tetap di tengah vertikal */
        /* min-height: 100vh; tetap dipertahankan dari gaya umum */
    }

    .maintenance-container {
        /* Lebar agar ada ruang di sisi kiri/kanan */
        width: 100%; /* Ambil 100% lebar parent (wrapper) */
        padding: 25px 20px; /* Padding internal yang lebih kecil di atas/bawah */
        margin: 0; /* Pastikan tidak ada margin tambahan */
        /* Mengurangi border-radius agar tetap terlihat jika layar sangat kecil */
        border-radius: 15px;
    }

    /* Mengurangi ukuran ilustrasi lebih agresif */
    .illustration-content img {
        width: 100%; /* Ilustrasi mengambil 100% lebar kolomnya */
        max-width: 150px; /* Batasi ukuran maksimum ilustrasi di mobile */
        margin-bottom: 20px; /* Tambahkan sedikit jarak di bawah ilustrasi */
    }

    /* Mengurangi ukuran font judul lebih agresif */
    .text-content h1 {
        font-size: 1.8rem; /* Ukuran judul lebih kecil lagi */
        margin-bottom: 15px !important; /* Kurangi margin bawah judul */
    }

    /* Mengurangi ukuran font paragraf lebih agresif */
    .custom-lead-text {
        font-size: 0.85rem; /* Ukuran paragraf lebih kecil lagi */
        line-height: 1.4; /* Sesuaikan line-height */
        margin-bottom: 20px !important; /* Kurangi margin bawah paragraf */
    }

    .custom-btn {
        padding: 8px 20px; /* Kurangi padding tombol */
        font-size: 0.9rem; /* Kurangi ukuran font tombol */
    }
}

    </style>

    <!-- Bootstrap JS Bundle (Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.getElementById('maintenanceTime').innerText = '08:00'; // Contoh waktu
    </script>
</body>
</html>
