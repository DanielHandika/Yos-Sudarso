<!DOCTYPE html>
<html>
<?php

include "configuration/config_include.php";
include "configuration/config_all_stat.php";

?>
<head>
        <meta charset="utf-8" />
        <title>Daftar Tunggakan |<?php echo $app;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aplikasi Kelola Sales dan Keuangan" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/title.png">
<?php
connect();
head();timing();
session();pagination();
?>

<?php

if (!login_check()) {
?>
<meta http-equiv="refresh" content="0; url=logout" />
<?php
exit(0);
}
?>

<?php
body();
theader();
etc();


//Setting Halaman

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";

$halaman = "pay_outstanding"; // halaman
$dataapa = "Tunggakan Bulanan"; // data
$tabeldatabase = "kosong"; // tabel database
$chmod = $chmenu1; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman


$b1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT month_id,month_name FROM months WHERE status='active'"));
$cons=$b1['month_id'];
$namabulan=$b1['month_name'];
$b2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT no FROM periode WHERE status='active'"));
$t=$b2['no'];
//End Setting Halaman

// Fungsi helper untuk mendapatkan URL pengurutan
// Fungsi ini akan membuat URL dengan parameter orderBy dan orderDir
function getSortUrl($column, $currentOrderBy, $currentOrderDir, $bulan) {
    // Jika kolom yang sama diklik, balik arah pengurutan
    $newOrderDir = ($column == $currentOrderBy && $currentOrderDir == 'asc') ? 'desc' : 'asc';
    return "?orderBy=$column&orderDir=$newOrderDir&bulan=$bulan";
}

// Inisialisasi variabel pengurutan
// Ambil parameter orderBy dari URL, defaultnya 'nama'
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'nama';
// Ambil parameter orderDir dari URL, defaultnya 'asc'
$orderDir = isset($_GET['orderDir']) && in_array(strtolower($_GET['orderDir']), ['asc', 'desc']) ? strtolower($_GET['orderDir']) : 'asc';

// Validasi kolom yang bisa diurutkan untuk mencegah SQL Injection
// Pastikan hanya kolom yang valid yang bisa digunakan untuk ORDER BY
$allowedSortColumns = ['student_id', 'nis', 'nama', 'kelas', 'Tunggakan', 'PembayaranTerakhir'];

// Jika orderBy yang diminta tidak ada dalam daftar yang diizinkan, gunakan default
if (!in_array($orderBy, $allowedSortColumns)) {
    $orderBy = 'nama'; // Fallback ke pengurutan berdasarkan nama
}

// Menentukan kolom database yang sebenarnya untuk ORDER BY
// 'Tunggakan' dan 'PembayaranTerakhir' adalah alias dari subquery, jadi bisa diurutkan langsung
$actualOrderBy = '';
switch ($orderBy) {
    case 'student_id':
        $actualOrderBy = 's.student_id';
        break;
    case 'nis':
        $actualOrderBy = 's.nis';
        break;
    case 'nama':
        $actualOrderBy = 's.nama';
        break;
    case 'kelas':
        $actualOrderBy = 'c.kelas';
        break;
    case 'Tunggakan':
        $actualOrderBy = 'Tunggakan'; // Mengurutkan berdasarkan alias dari subquery
        break;
    case 'PembayaranTerakhir':
        $actualOrderBy = 'PembayaranTerakhir'; // Mengurutkan berdasarkan alias dari subquery
        break;
    default:
        $actualOrderBy = 's.nama'; // Default fallback
        break;
}

// Inisialisasi variabel pencarian
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$searchQuery = '';
if (!empty($search)) {
    $searchQuery = " AND (s.nama LIKE '%$search%' OR s.nis LIKE '%$search%' OR c.kelas LIKE '%$search%')";
}


// Kueri SQL utama untuk mengambil data tunggakan
// Menggunakan JOIN untuk mengambil data siswa dan kelas secara efisien
$sql = "SELECT
            s.student_id,
            s.nis,
            s.nama,
            s.nohp,
            s.waortu,
            c.kelas,
            (SELECT SUM(bulanan_bill) FROM bulanan WHERE student_id = s.student_id AND period_id='$t' AND month_id<='$cons' AND bulanan_status LIKE '%belum%') AS Tunggakan,
            (SELECT MAX(tgl_input) FROM bulanan WHERE student_id = s.student_id AND period_id='$t' AND bulanan_status LIKE '%sudah%') AS PembayaranTerakhir
        FROM student s
        JOIN class c ON s.kelas_id = c.no
        WHERE s.status='active'
        AND s.student_id IN (
            SELECT DISTINCT student_id FROM bulanan WHERE period_id='$t' AND month_id<='$cons' AND bulanan_status LIKE '%belum%'
        )
        $searchQuery
        ORDER BY c.kelas ASC, s.nama ASC"; // Urutan tetap: Kelas naik, Nama naik

// Kueri untuk menghitung total baris untuk pagination
// Penting agar COUNT menggunakan kueri yang sama dengan filter utama
$sql_count = "SELECT COUNT(DISTINCT s.student_id)
            FROM student s
            JOIN class c ON s.kelas_id = c.no
            WHERE s.status='active'
            AND s.student_id IN (
                SELECT DISTINCT student_id FROM bulanan WHERE period_id='$t' AND month_id<='$cons' AND bulanan_status LIKE '%belum%'
            )
            $searchQuery";

$result_count = mysqli_query($conn, $sql_count);
$tcount = mysqli_fetch_array($result_count)[0]; // Ambil total count

$rpp = 15; // rows per page
// URL reload pagination tidak perlu parameter orderBy dan orderDir lagi
$reload = "$halaman"."?pagination=true&search=$search"; // Tambahkan parameter pencarian ke reload URL
$page = intval(isset($_GET["page"]) ? $_GET["page"] : 0);

if ($page <= 0)
    $page = 1;
$tpages = ($tcount) ? ceil($tcount / $rpp) : 1;
$count = 0;
$i = ($page - 1) * $rpp;
$no_urut = ($page - 1) * $rpp;


// Batasi kueri SQL dengan LIMIT dan OFFSET untuk pagination
$sql .= " LIMIT $i, $rpp";
$result = mysqli_query($conn, $sql);

?>

<?php

menu();

?>




<div class="content-page">
                <div class="content">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index">DashBoard</a></li>
                                            <li class="breadcrumb-item"><a href="pay_add">Pembayaran</a></li>
                                            <li class="breadcrumb-item active"><?php echo $dataapa;?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Tunggakan</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                    <h4 class=" col-8 header-title">Data Tunggakan Pembayaran Bulanan (per <?php echo $namabulan;?>)</h4>
                                    <div class="col-2">
                                        <form method="get">
                                    <select class="form-contro;" data-toggle="select2" name="bulanaktif" onchange="this.form.submit()">
    <?php
        $sql_months=mysqli_query($conn,"select * from months");
        while ($row_month=mysqli_fetch_assoc($sql_months)){
          if ($cons==$row_month['month_id'])
          echo "<option value='".$row_month['month_id']."' selected='selected'>".$row_month['month_name']."</option>";
          else
          echo "<option value='".$row_month['month_id']."'>".$row_month['month_name']."</option>";
        }
      ?>
                    </select>
                </form>
</div>
<div class="col-3"> <form method="get" action="<?php echo $halaman; ?>">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari siswa..." value="<?php echo htmlspecialchars($search); ?>">
            <div class="input-group-append">
                <button class="btn btn-primary waves-effect waves-light" type="submit">Cari</button>
                <?php if (!empty($search)) { ?>
                    <a href="<?php echo $halaman; ?>?bulanaktif=<?php echo htmlspecialchars($cons); ?>" class="btn btn-warning waves-effect waves-light ml-1">Kembali</a>
                <?php } ?>
            </div>
        </div>
        <input type="hidden" name="bulan" value="<?php echo htmlspecialchars($cons); ?>">
    </form>
</div>

<br>




<?php
              error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


            // Pesan alert yang sudah ada
                $msg=$_GET['insert'] ?? ''; // Menggunakan null coalescing operator untuk menghindari undefined index
                if($msg=="true"){?>
                 <div id="myAlert" class="alert alert-success text-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button>
                <strong>Berhasil!</strong> Data Siswa telah disimpan</div>
                <?php } else if($msg=="update"){?>
                <div id="myAlert" class="alert alert-warning text-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button>
                <strong>Data siswa telah diperbarui</strong></div>
                <?php } else if($msg=="delete"){?>
                <div id="myAlert" class="alert alert-warning text-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button>
                <strong>Proses penghapusan selesai</strong> Data siswa telah dihapus</div>
                <?php } else if($msg=="import"){?>
                <div id="myAlert" class="alert alert-info text-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button>
                <strong>Proses Import Selesai!</strong> Silahkan cek kembali data hasil import apabila perlu</div>
                <?php } else if($msg=="false"){?>
                <div id="myAlert" class="alert alert-danger text-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button>
                <strong>GAGAL!</strong> Periksa kembali Input Anda</div>
                <?php } ?>

                                   <div class="table-responsive" style="overflow-x: auto;">
                                       <table class="table table-hover m-0 tickets-list table-actions-bar" >
                                        <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>NIS</th>
                                            <th>Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tunggakan</th>
                                            <th>Pembayaran Terakhir</th>
                                            <th class="hidden-sm">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>

 <?php        while(($count<$rpp) && ($i<$tcount)) {
               mysqli_data_seek($result,$i);
               $row = mysqli_fetch_array($result);
               ?>

                                        <tr>
                                            <td><?php echo ++$no_urut;?></td>
                                            <td>
                                                <b><?php echo mysqli_real_escape_string($conn, $row['nis']);?></b>
                                            </td>
                                            <td>
                                                <a href="pay_add?t=<?php echo $t;?>&s=<?php echo $row['nis'];?>" class="text-body">
                                                    <span class="ml-1"><b><?php echo mysqli_real_escape_string($conn, $row['nama']);?></b></span>
                                                </a>
                                            </td>

                                            <td>
                                               <?php echo mysqli_real_escape_string($conn, $row['kelas']);?>
                                            </td>

                                            <td>
                                               <?php
                                                // Data tunggakan sudah ada dari kueri utama melalui alias 'Tunggakan'
                                                echo number_format($row['Tunggakan']);
                                               ?>
                                            </td>

                                            <td>
                                                <?php
                                                // Data pembayaran terakhir sudah ada dari kueri utama melalui alias 'PembayaranTerakhir'
                                                if($row['PembayaranTerakhir'] == ''){
                                                  echo 'belum ada pembayaran';
                                                } else {
                                                  echo date('d/m/y',strtotime($row['PembayaranTerakhir']));
                                                }?>

                                            </td>


                                            <td>
                                               <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> Tindakan <i class="mdi mdi-chevron-down"></i> </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="pay_add?t=<?php echo $t;?>&s=<?php echo $row['nis'];?>">Lihat</a>
                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=<?php echo $row['nohp'];?>&text=Salam%20Baik%2C%0D%0A%0DKepada%20Bapak%2FIbu%20Wali Murid%2C%0D%0A%0D%0AKami%20Informasikan%20mengenai%20tagihan%20ananda%20<?php echo $row['nama'];?>%20Sebesar%20Rp<?php echo number_format($row['Tunggakan'])?>&text=Salam%20Baik%2C%0D%0A%0DKepada%20Bapak%2FIbu%20Wali Murid%2C%0D%0A%0D%0AKami%20Informasikan%20mengenai%20tagihan%20ananda%20<?php echo $row['nama'];?>%20Sebesar%20Rp<?php echo number_format($row['Tunggakan'])?>%2E%20Pembayaran%20dapat%20dilakukan%20dengan%20cara%3A%0D%0A%0D%0ATunai%3A%20Di sekolah%0D%0ATransfer%3A%20BRI%0D%0ANama%20Rekening%3A%20Yayasan%20Yos%20Sudarso%0D%0ANomor%20Rekening%3A%20035701003183305%2E%20Setelah%20Transfer%2C%20mohon%20konfirmasi%20melalui%20Whatsapp%20ke%20082178862003%2E%0D%0A%0D%0AUntuk%20melihat%20status%20pembayaran%20dapat%20diakses%20secara%20online%20melalui%20www%2Eyossudarsobandarjaya%2Emy%2Eid%0D%0ALogin%20ke%20siswa%20dengan%20NIS%20password%20123456%20%28silakan%20ubah%20password%20melalui%20menu%20pengaturan%20password%20setelah%20masuk%20ke%20akun%20siswa%29%0D%0AUntuk%20informasi%20penggunaan%20aplikasi%20lebih%20jelas%2C%20silakan%20hubungi%20bagian%20tata%20usaha%20sekolah%2E%0D%0ATerima%20kasih%2E%0D%0A%0D%0AYayasan%20Yos%20Sudarso%2E"
                                                target="_blank">Whatsapp Siswa</a>
                                                 <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=<?php echo $row['waortu'];?>&text=Salam%20Baik%2C%0D%0A%0DKepada%20Bapak%2FIbu%20Wali Murid%2C%0D%0A%0D%0AKami%20Informasikan%20mengenai%20tagihan%20ananda%20<?php echo $row['nama'];?>%20Sebesar%20Rp<?php echo number_format($row['Tunggakan'])?>%2E%20Pembayaran%20dapat%20dilakukan%20dengan%20cara%3A%0D%0A%0D%0ATunai%3A%20Di sekolah%0D%0ATransfer%3A%20BRI%0D%0ANama%20Rekening%3A%20Yayasan%20Yos%20Sudarso%0D%0ANomor%20Rekening%3A%20035701003183305%2E%20Setelah%20Transfer%2C%20mohon%20konfirmasi%20melalui%20Whatsapp%20ke%20082178862003%2E%0D%0A%0D%0AUntuk%20melihat%20status%20pembayaran%20dapat%20diakses%20secara%20online%20melalui%20www%2Eyossudarsobandarjaya%2Emy%2Eid%0D%0ALogin%20ke%20siswa%20dengan%20NIS%20password%20123456%20%28silakan%20ubah%20password%20melalui%20menu%20pengaturan%20password%20setelah%20masuk%20ke%20akun%20siswa%29%0D%0AUntuk%20informasi%20penggunaan%20aplikasi%20lebih%20jelas%2C%20silakan%20hubungi%20bagian%20tata%20usaha%20sekolah%2E%0D%0ATerima%20kasih%2E%0D%0A%0D%0AYayasan%20Yos%20Sudarso%2E"
                                                target="_blank">Whatsapp Wali Murid</a>
                                            </div>
                                        </div>
                                            </td>
                                        </tr>

                              <?php
               $i++;
               $count++;
               } ?>


                                        </tbody>
                                    </table>
                                     <div align="right"><?php if($tcount>=$rpp){ echo paginate_one($reload, $page, $tpages);}else{} ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

   </div> </div> <?php footer();?>

</div>



              <?php

right();

?>

<?php

if(isset($_GET['bulanaktif'])){
    $bulan=$_GET['bulanaktif'];

    $a1=mysqli_query($conn,"UPDATE months SET status='inactive'");
    $a1=mysqli_query($conn,"UPDATE months SET status='active' WHERE month_id='$bulan'");

    echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
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

        <script src="assets/js/pages/sweet-alerts.init.js"></script>


         <script src="assets/js/pages/form-pickers.init.js"></script>

        <script src="assets/js/pages/form-advanced.init.js"></script>

        <script src="assets/js/app.min.js"></script>

</body>
</html>