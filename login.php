<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jenjang Sekolah - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/title.png">
</head>
<body>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
}

/* Custom styles for jenjang cards */
.jenjang-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #ffffff; /* Putih bersih untuk kartu */
}

.jenjang-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; /* Meningkatkan shadow saat hover */
}

.jenjang-card .card-body {
    min-height: 200px; /* Memastikan tinggi minimum agar rapi */
}

/* Custom border colors for each jenjang card */
.tk-card-border {
    border-radius: 13px;
}

.sd-card-border {
    border-radius: 13px;
}

.smp-card-border {
    border-radius: 13px;

}
    </style>
    <div class="d-flex flex-column min-vh-100 justify-content-between">
        <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid  ">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="upload/image/title.png" alt="Logo Sekolah" width="50" height="50" class="me-2">
                    <h1 class="h4 mb-0 text-primary">Yos Sudarso | BiSa Finance</h1>
                </a>   
            </div>
        </header>

        <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center py-5" style="background-color: #CEDAD4 ">
            <div class="container text-center">
                <h2 class="display-4 text-primary mb-5">Pilih Jenjang Sekolah</h2>
                <div class="row justify-content-center g-4">
                    <!-- Taman Kanak-Kanak -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <a href="maintenance.php" style ="text-decoration: none; background-image: url(upload/image/pattern.png)" class="card jenjang-card h-100 shadow-sm border-0 tk-card-border" >
                            <div class="card-body d-flex flex-column align-items-center justify-content-center p-4">
                                <img src="upload/image/title.png" alt="TK Icon" class="img-fluid mb-3" style="width: 90px; height: 90px;">
                                <h3 class="card-title h4 text-primary mb-2">Taman <br> Kanak-Kanak</h3>
                                <p class="card-text text-muted">Login untuk jenjang TK</p>
                            </div>
                        </a>
                    </div>
                    <!-- Sekolah Dasar -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <a href="jenjang.php" style ="text-decoration: none; background-image: url(upload/image/pattern.png)" class="card jenjang-card h-100 shadow-sm border-0 sd-card-border">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center p-4">
                                <img src="upload/image/title.png" alt="SD Icon" class="img-fluid mb-3" style="width: 90px; height: 90px;">
                                <br>
                                <h3 class="card-title h4 text-primary mb-2">Sekolah Dasar</h3>
                                <p class="card-text text-muted">Login untuk jenjang SD</p>
                            </div>
                        </a>
                    </div>
                    <!-- SMP -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <a href="maintenance.php" style ="text-decoration: none; background-image: url(upload/image/pattern.png)" class="card jenjang-card h-100 shadow-sm border-0 smp-card-border">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center p-4">
                                <img src="upload/image/title.png" alt="SMP Icon" class="img-fluid mb-3" style="width: 90px; height: 90px;">
                                <h3 class="card-title h4 text-primary mb-2">Sekolah Menengah Pertama</h3>
                                <p class="card-text text-muted">Login untuk jenjang SMP</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer bg-light text-center py-3 border-top">
            <p class="mb-0 text-muted">&copy;2025 BiSa Finance Modified By <a href="#" style="text-decoration: none;">Yos Sudarso Bandar Jaya</a></p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>