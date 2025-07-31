<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>Kategori Keuangan </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aplikasi Kelola Sales dan Keuangan" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/title.png">

        <!-- CSS Kustom untuk Kolom Keterangan agar tidak membuat baris baru -->
        <style>
            /*
             * Aturan CSS ini akan diterapkan pada sel (<td>) di dalam tabel
             * yang berada di dalam elemen dengan kelas 'table-responsive'.
             * Secara spesifik menargetkan kolom 'Keterangan' (kolom ke-4).
             */
            .table-responsive table td:nth-child(4) { /* Menargetkan kolom Keterangan (kolom ke-4) */
                white-space: nowrap; /* Mencegah teks membungkus ke baris baru */
                /*
                 * Jika Anda ingin teks yang terlalu panjang terpotong dan menampilkan elipsis (...)
                 * daripada membuat tabel melebar secara tak terbatas, Anda bisa menambahkan properti berikut:
                 * overflow: hidden;
                 * text-overflow: ellipsis;
                 * max-width: 250px; /* Atur lebar maksimum yang Anda inginkan jika menggunakan elipsis */
                 * Namun, berdasarkan gambar yang Anda berikan (image_779606.png),
                 * tampaknya Anda lebih memilih kolom melebar.
                 */
            }

            /* Opsional: Menyesuaikan lebar kolom Opsi agar tidak terlalu sempit dan tetap di tengah */
            .table-responsive table th:last-child,
            .table-responsive table td:last-child {
                width: 100px; /* Sesuaikan lebar kolom Opsi jika perlu */
                text-align: center; /* Pusatkan ikon opsi */
            }
        </style>

<?php

// File: u_kategori.php

include "configuration/config_include.php";
include "configuration/config_all_stat.php";

connect();
head();
timing();
session();

if (!login_check()) {
    echo "<meta http-equiv='refresh' content='0; url=logout' />";
    exit(0);
}

body();
theader();
etc();

// Setting Halaman
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";

$halaman = "u_kategori"; // halaman
$dataapa = "Kategori POS Keuangan"; // data
$tabeldatabase = "uang_kategori"; // tabel database
$chmod = $chmenu3; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman

menu();

// Ambil data untuk form edit jika ada parameter 'no'
$data_edit = [];
if (isset($_GET['no'])) {
    $no_edit = mysqli_real_escape_string($conn, $_GET["no"]);
    $sql_edit = "SELECT * FROM uang_kategori WHERE kategori_id='$no_edit'";
    $result_edit = mysqli_query($conn, $sql_edit);
    $data_edit = mysqli_fetch_assoc($result_edit);
}

// Inisialisasi variabel pencarian
$search_query = "";
if (isset($_GET['cari']) && !empty($_GET['cari'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['cari']);
}

// Inisialisasi variabel pengurutan
$sort_by = isset($_GET['sort_by']) ? mysqli_real_escape_string($conn, $_GET['sort_by']) : 'kategori_id'; // Default sort by ID
$sort_order = isset($_GET['sort_order']) ? mysqli_real_escape_string($conn, $_GET['sort_order']) : 'ASC'; // Default ascending
?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- Halaman dan breadcrumbs -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index">DashBoard</a></li>
                                <li class="breadcrumb-item"><a href="pay_add">Pembayaran</a></li>
                                <li class="breadcrumb-item active"><?php echo $dataapa; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo $dataapa; ?></h4>
                    </div>
                </div>
            </div>
            <!-- End halaman dan breadcrumbs -->

            <!-- Script untuk notifikasi -->
            <script>
                window.setTimeout(function() {
                    let alert = document.getElementById('myAlert');
                    if (alert) {
                        alert.style.transition = 'opacity 0.5s ease';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 6000);
            </script>

            <!-- Notifikasi -->
            <?php
            if (isset($_GET['status'])) {
                $msg = $_GET['status'];
                if ($msg == "deleted") {
                    echo '<div id="myAlert" class="alert alert-success text-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Berhasil!</strong> Data telah berhasil dihapus.
                          </div>';
                } else if ($msg == "delete_failed") {
                    echo '<div id="myAlert" class="alert alert-danger text-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>GAGAL!</strong> Data tidak dapat dihapus karena masih ada yang menggunakan kategori ini, di penerimaan/pengeluaran.
                          </div>';
                }
                // Anda bisa menambahkan notifikasi lain dari file asli jika diperlukan (insert, update, dll)
            }
            ?>

            <!-- ISI HALAMAN -->
            <div class="row">
                <!-- Form Tambah/Edit -->
                <?php if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title"><?php echo isset($data_edit['kategori_id']) ? 'Edit' : 'Tambah'; ?> Kategori</h4>
                            <form method="post" action="u_kategori.php">
                                <input type="hidden" name="no" value="<?php echo isset($data_edit['kategori_id']) ? $data_edit['kategori_id'] : ''; ?>">

                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo isset($data_edit['nama_kategori']) ? htmlspecialchars($data_edit['nama_kategori']) : ''; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select class="form-control" name="jenis">
                                        <option value="out" <?php echo (isset($data_edit['jenis']) && $data_edit['jenis'] == 'out') ? 'selected' : ''; ?>>Pengeluaran</option>
                                        <option value="in" <?php echo (isset($data_edit['jenis']) && $data_edit['jenis'] == 'in') ? 'selected' : ''; ?>>Pemasukan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="ket" value="<?php echo isset($data_edit['keterangan']) ? htmlspecialchars($data_edit['keterangan']) : ''; ?>">
                                </div>

                                <button type="submit" name="simpan" class="btn btn-block btn-success waves-effect width-md waves-light">SIMPAN</button>
                                <?php if (isset($data_edit['kategori_id'])) { ?>
                                    <a href="u_kategori.php" class="btn btn-block btn-secondary waves-effect width-md waves-light mt-1">Batal Edit</a>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                <?php } ?>

                <!-- Tabel Data -->
                <div class="col-lg-<?php echo ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') ? '8' : '12'; ?>">
                    <div class="card-box">
                        <h4 class="header-title">Daftar Kategori POS Keuangan</h4>

                        <!-- Form Pencarian dan Pengurutan -->
                        <form method="get" action="u_kategori.php" class="form-inline mb-3">
                            <div class="form-group mr-2">
                                <input type="text" class="form-control" name="cari" placeholder="Cari Kategori..." value="<?php echo htmlspecialchars($search_query); ?>">
                            </div>
                            <div class="form-group mr-2">
                                <select name="sort_by" class="form-control">
                                    <option value="kategori_id" <?php echo ($sort_by == 'kategori_id') ? 'selected' : ''; ?>>Default</option>
                                    <option value="nama_kategori" <?php echo ($sort_by == 'nama_kategori') ? 'selected' : ''; ?>>Urutkan Berdasarkan Nama</option>
                                    <option value="jenis" <?php echo ($sort_by == 'jenis') ? 'selected' : ''; ?>>Urutkan Berdasarkan Jenis</option>
                                </select>
                            </div>
                            <div class="form-group mr-2">
                                <select name="sort_order" class="form-control">
                                    <option value="ASC" <?php echo ($sort_order == 'ASC') ? 'selected' : ''; ?>>Kecil Ke Besar</option>
                                    <option value="DESC" <?php echo ($sort_order == 'DESC') ? 'selected' : ''; ?>>Besar Ke Kecil</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Terapkan</button>
                            <?php if (!empty($search_query) || ($sort_by != 'kategori_id' || $sort_order != 'ASC')) { ?>
                                <a href="u_kategori.php" class="btn btn-secondary waves-effect waves-light ml-2">Reset</a>
                            <?php } ?>
                        </form>
                        <!-- End Form Pencarian dan Pengurutan -->

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Masuk/Keluar</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nom = 0;
                                    // Modifikasi query SQL untuk fitur pencarian dan pengurutan
                                    $sql_select = "SELECT * FROM uang_kategori";
                                    $where_clauses = [];

                                    if (!empty($search_query)) {
                                        $where_clauses[] = "(nama_kategori LIKE '%$search_query%' OR keterangan LIKE '%$search_query%' OR jenis LIKE '%$search_query%')";
                                    }

                                    if (!empty($where_clauses)) {
                                        $sql_select .= " WHERE " . implode(" AND ", $where_clauses);
                                    }

                                    // Tambahkan pengurutan
                                    $sql_select .= " ORDER BY $sort_by $sort_order";

                                    $sqla = mysqli_query($conn, $sql_select);
                                    while ($row = mysqli_fetch_assoc($sqla)) {
                                        $nom++;
                                        echo '<tr>';
                                        echo '<td>' . $nom . '</td>';
                                        echo '<td>' . htmlspecialchars($row['nama_kategori']) . '</td>';

                                        if ($row['jenis'] == 'out') {
                                            echo '<td><span class="badge badge-danger">Pengeluaran</span></td>';
                                        } else if ($row['jenis'] == 'in') {
                                            echo '<td><span class="badge badge-success">Pemasukan</span></td>';
                                        } else {
                                            echo '<td>-</td>';
                                        }

                                        echo '<td>' . htmlspecialchars($row['keterangan']) . '</td>';
                                        echo '<td>';

                                        if (($chmod >= 4 || $_SESSION['jabatan'] == 'admin') && ($row['kategori_id'] != 1)) {
                                            // Tombol Edit
                                            echo '<a href="u_kategori.php?no=' . $row['kategori_id'] . '" class="btn btn-success btn-sm btn-icon"><i class="fa fa-edit"></i></a> ';

                                            // Tombol Hapus
                                            $delete_url = 'component/delete/delete_kategori.php?no=' . $row['kategori_id'] . '&forward=' . $forward . '&forwardpage=' . $forwardpage;
                                            echo '<a href="' . $delete_url . '" class="btn btn-danger btn-sm btn-icon" onclick="return confirm(\'Anda yakin ingin menghapus data ini?\');"><i class="fa fa-times"></i></a>';
                                        }

                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ISI HALAMAN -->
        </div> <!-- end container-fluid -->
    </div> <!-- end content -->
    <?php footer(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

<?php
right();

// Proses Simpan Data (Create/Update)
if (isset($_POST['simpan'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = mysqli_real_escape_string($conn, $_POST["nama_kategori"]);
        $j = mysqli_real_escape_string($conn, $_POST["jenis"]);
        $k = mysqli_real_escape_string($conn, $_POST["ket"]);
        $no = mysqli_real_escape_string($conn, $_POST["no"]);

        if (!empty($no)) {
            // Proses Update
            $sql1 = "UPDATE uang_kategori SET nama_kategori='$nama', jenis='$j', keterangan='$k' WHERE kategori_id='$no'";
            if (mysqli_query($conn, $sql1)) {
                echo "<script type='text/javascript'>window.location = '$forwardpage?status=update_success';</script>";
            } else {
                echo "<script type='text/javascript'>window.location = '$forwardpage?status=update_failed';</script>";
            }
        } else {
            // Proses Insert
            $sql2 = "SELECT * FROM uang_kategori WHERE nama_kategori='$nama'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                echo "<script type='text/javascript'>window.location = '$forwardpage?status=exist';</script>";
            } else {
                $sql3 = "INSERT INTO uang_kategori (nama_kategori, jenis, keterangan) VALUES ('$nama', '$j', '$k')";
                if (mysqli_query($conn, $sql3)) {
                    echo "<script type='text/javascript'>window.location = '$forwardpage?status=insert_success';</script>";
                } else {
                    echo "<script type='text/javascript'>window.location = '$forwardpage?status=insert_failed';</script>";
                }
            }
        }
    }
}
?>
</body>
</html>
