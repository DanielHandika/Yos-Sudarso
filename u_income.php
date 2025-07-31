<!DOCTYPE html>
<?php

// Pastikan file konfigurasi ada dan disertakan
include "configuration/config_include.php";
include "configuration/config_all_stat.php";

?>
<head>
    <meta charset="utf-8" />
    <title>Penerimaan | <?php echo htmlspecialchars($app); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi Kelola Sales dan Keuangan" name="description" />
    <meta name="author" content="Coderthemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/title.png">

    <?php
    // Fungsi-fungsi dari file konfigurasi
    connect();
    head();
    timing();
    session();
    pagination();
    ?>

    <?php
    // Pengecekan sesi login
    if (!login_check()) {
    ?>
    <meta http-equiv="refresh" content="0; url=logout" />
    <?php
    exit(0);
    }
    ?>

    <?php
    // Fungsi-fungsi tampilan dari file konfigurasi
    body();
    theader();
    etc();

    // Setting Halaman
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); // Matikan error notice dan warning untuk produksi
    include "configuration/config_chmod.php";

    $halaman = "u_income"; // halaman
    $dataapa = "Penerimaan"; // data
    $tabeldatabase = "uang_masuk_keluar"; // tabel database
    $chmod = $chmenu3; // Hak akses Menu
    $forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
    $forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
    $today = date('Y-m-d');

    //END Setting Halaman
    ?>

    <?php
    menu();
    ?>

</head>
<body>

    <div class="content-page">
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index">DashBoard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Jurnal Umum</a></li>
                                    <li class="breadcrumb-item active"><?php echo htmlspecialchars($dataapa); ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo htmlspecialchars($dataapa); ?></h4>
                        </div>
                    </div>
                </div>
                <script>
                    window.setTimeout(function() {
                        $("#myAlert").fadeTo(200, 0).slideUp(400, function(){
                            $(this).remove();
                        });
                    }, 2000);
                </script>

                <?php
                // Tampilan pesan notifikasi
                $msg = isset($_GET['insert']) ? $_GET['insert'] : '';
                if ($msg == "exist") { ?>
                    <div id="myAlert" class="alert alert-danger text-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Gagal!</strong> Sudah ada Kategori dengan nama yang sama
                    </div>
                <?php } else if ($msg == "false") { ?>
                    <div id="myAlert" class="alert alert-danger text-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>GAGAL!</strong> Terjadi kesalahan, Hubungi Admin jika perlu
                    </div>
                <?php } else if ($msg == "true") { ?>
                    <div id="myAlert" class="alert alert-success text-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Berhasil!</strong> Data telah disimpan
                    </div>
                <?php } else if ($msg == "update") { ?>
                    <div id="myAlert" class="alert alert-info text-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Berhasil!</strong> Data telah diupdate
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <?php if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                            <button type="button" class="btn btn-blue waves-effect waves-light" data-toggle="modal" data-target="#pemasukan">Tambah Penerimaan</button>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-8 col-xs-8">
                                    <h4 class="header-title">Daftar Penerimaan</h4>
                                </div>
                                <div class="col-lg-4 col-xs-4">
                                    <div class="form-group row">
                                        <form method="get" action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Cari" name="q" value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-dark waves-effect waves-light" type="submit"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#home" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                        <span class="d-none d-sm-block">Penerimaan</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                        <span class="d-none d-sm-block">Pembayaran Siswa</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane show active" id="home">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped mb-0">
                                            <thead>
                                                <tr>
                                                   <th style="width:10px">No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama</th>
                                                     <th>Jumlah(Rp)</th>
                                                     <th>Oleh</th>
                                                     <th>Kategori</th>
                                                     <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                                $q = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

                                                if (!empty($q)) {
                                                    $sql = "SELECT umk.*, uk.nama_kategori FROM uang_masuk_keluar AS umk INNER JOIN uang_kategori AS uk ON umk.kategori_id = uk.kategori_id WHERE umk.tipe='in' AND (umk.nama LIKE '%$q%' OR umk.keterangan LIKE '%$q%') ORDER BY umk.tgl_input DESC";
                                                } else {
                                                    $sql = "SELECT umk.*, uk.nama_kategori FROM uang_masuk_keluar AS umk INNER JOIN uang_kategori AS uk ON umk.kategori_id = uk.kategori_id WHERE umk.tipe='in' ORDER BY umk.tgl_input DESC";
                                                }

                                                $result = mysqli_query($conn, $sql);
                                                $rpp = 15;
                                                $reload = "$halaman" . "?pagination=true";
                                                $page = intval(isset($_GET["page"]) ? $_GET["page"] : 0);

                                                if ($page <= 0) {
                                                    $page = 1;
                                                }
                                                $tcount = mysqli_num_rows($result);
                                                $tpages = ($tcount) ? ceil($tcount / $rpp) : 1;
                                                $count = 0;
                                                $i = ($page - 1) * $rpp;
                                                $nom = ($page - 1) * $rpp;

                                                while (($count < $rpp) && ($i < $tcount)) {
                                                    mysqli_data_seek($result, $i);
                                                    $row = mysqli_fetch_array($result);
                                                ?>
                                                    <tr>
                                                        <td><?php echo ++$nom; ?></td>
                                                        <td><?php echo htmlspecialchars(date('d/m/y', strtotime($row['tgl_update']))); ?></td>
                                                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                                        <td><?php echo htmlspecialchars(number_format($row['jumlah'])); ?></td>
                                                        <td><?php echo htmlspecialchars($row['kasir']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['nama_kategori']); ?></td>
                                                        <td>
                                                            <?php if ($chmod >= 4 || $_SESSION['jabatan'] == 'admin') { ?>
                                                                <a href="u_edit?q=<?php echo htmlspecialchars($row['no']); ?>&ref=u_income" class="btn btn-icon waves-effect waves-light btn-purple"> <i class="fa fa-edit"></i> </a>
                                                            <?php } ?>
                                                            <?php if ($chmod >= 5 || $_SESSION['jabatan'] == 'admin') { ?>
                                                                <button class="demo-delete-row btn btn-danger btn-icon"
                                                                    onclick="window.location.href='component/delete/delete_biasa?no=<?php echo htmlspecialchars($row['no']); ?>&forward=<?php echo htmlspecialchars("uang_masuk_keluar"); ?>&forwardpage=<?php echo htmlspecialchars($halaman); ?>&chmod=<?php echo htmlspecialchars($chmod); ?>'">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                    $count++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div align="right"><?php if ($tcount >= $rpp) { echo paginate_one($reload, $page, $tpages); } ?></div>
                                </div>

                                <div class="tab-pane" id="profile">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="width:10px">No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama</th>
                                                    <th>Jumlah (Rp)</th>
                                                    <th>Oleh</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); // Pastikan error reporting diset dengan benar
                                                $sqla = "SELECT * FROM uang_masuk_keluar WHERE tipe='pay' ORDER BY tgl_input DESC";

                                                $result = mysqli_query($conn, $sqla);
                                                $rpp = 50;
                                                $reload = "$halaman" . "?pagination=true";
                                                $page = intval(isset($_GET["page"]) ? $_GET["page"] : 0);

                                                if ($page <= 0) {
                                                    $page = 1;
                                                }
                                                $tcount = mysqli_num_rows($result);
                                                $tpages = ($tcount) ? ceil($tcount / $rpp) : 1;
                                                $count = 0;
                                                $i = ($page - 1) * $rpp;
                                                $nom = ($page - 1) * $rpp; // Reset nom for this tab

                                                while (($count < $rpp) && ($i < $tcount)) {
                                                    mysqli_data_seek($result, $i);
                                                    $row = mysqli_fetch_array($result);
                                                ?>
                                                    <tr>
                                                        <td><?php echo ++$nom; ?></td>
                                                        <td><?php echo htmlspecialchars(date('d/m/y', strtotime($row['tgl_update']))); ?></td>
                                                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                                        <td><?php echo htmlspecialchars(number_format($row['jumlah'])); ?></td>
                                                        <td><?php echo htmlspecialchars($row['kasir']); ?></td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                    $count++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div align="right"><?php if ($tcount >= $rpp) { echo paginate_one($reload, $page, $tpages); } ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div> </div> <?php footer(); ?>
        </div>

    <div id="pemasukan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Penerimaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputNamaPenerimaan" class="control-label">Nama Penerimaan</label>
                                    <input type="text" class="form-control" id="inputNamaPenerimaan" name="nama" placeholder="Nama Pemasukan" required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputJumlah" class="control-label">Jumlah (Rp)</label>
                                    <input type="text" class="form-control" id="inputJumlah" name="jumlah" required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="selectKategori" class="control-label">Kategori</label>
                                    <select class="form-control" data-toggle="select2" style="width: 100%;" name="kate" id="selectKategori">
                                        <?php
                                        $sql_kategori = mysqli_query($conn, "SELECT * FROM uang_kategori WHERE jenis='in'");
                                        while ($row_kategori = mysqli_fetch_assoc($sql_kategori)) {
                                            // Asumsi $pelanggan adalah variabel yang menyimpan nilai terpilih, jika ada
                                            $selected = (isset($pelanggan) && $pelanggan == $row_kategori['akun']) ? 'selected="selected"' : '';
                                            echo "<option value='" . htmlspecialchars($row_kategori['kategori_id']) . "' " . $selected . ">" . htmlspecialchars($row_kategori['nama_kategori']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputTanggal" class="control-label">Tanggal</label>
                                    <input type="text" class="datepicker form-control" value="<?php echo htmlspecialchars($today); ?>" id="inputTanggal" name="tgl" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="inputKeterangan" class="control-label">Keterangan</label>
                                    <textarea class="form-control" id="inputKeterangan" name="ket"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" name="masuk" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div><?php
    right();
    ?>
    <?php
    if (isset($_POST['masuk'])) {
        // Pengecekan method POST sudah dilakukan oleh server, tapi bisa juga ditambahkan di sini
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $jml = mysqli_real_escape_string($conn, $_POST["jumlah"]);
        $kate = mysqli_real_escape_string($conn, $_POST["kate"]);
        $tgl = mysqli_real_escape_string($conn, $_POST["tgl"]);
        $ket = mysqli_real_escape_string($conn, $_POST["ket"]);

        $user = $_SESSION['nama'];
        $now = date('Y-m-d H:i:s'); // Menggunakan H:i:s untuk timestamp yang lebih akurat

        // Perbaikan: Mengganti NULL dengan 0 untuk kolom student_id, period_id, dan bebas_id
        $sql = "INSERT INTO " . $tabeldatabase . " (tipe, nama, keterangan, jumlah, kasir, kategori_id, tgl_update, tgl_input, student_id, period_id, bebas_id) VALUES ('in', '$nama', '$ket', '$jml', '$user', '$kate', '$tgl', '$now', 0, 0, 0)";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>window.location = '$forwardpage?insert=true';</script>";
        } else {
            // Untuk debugging, Anda bisa menampilkan error SQL
            echo "Error: " . mysqli_error($conn); // <-- Tetap aktifkan ini untuk debugging lebih lanjut
            // echo "<script type='text/javascript'>window.location = '$forwardpage?insert=false';</script>";
        }
        // } // Tutup if ($_SERVER["REQUEST_METHOD"] == "POST")
    }
    ?>
    <script src="assets/js/vendor.min.js"></script>

    <script src="assets/libs/switchery/switchery.min.js"></script>
    <script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="assets/libs/select2/select2.min.js"></script>
    <script src="assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="assets/libs/autocomplete/jquery.autocomplete.min.js"></script>
    <script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>

    <script src="assets/libs/moment/moment.min.js"></script>
    <script src="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>


    <script src="assets/datepicker/bootstrap-datepicker.js"></script>
    <script src="assets/daterangepicker/daterangepicker.js"></script>
    <script src="assets/libs/select2/select2.min.js"></script>

    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="assets/js/pages/form-pickers.init.js"></script>

    <script src="assets/js/pages/form-advanced.init.js"></script>

    <script src="assets/js/app.min.js"></script>

</body>
</html>
