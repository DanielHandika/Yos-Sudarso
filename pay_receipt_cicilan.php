<!DOCTYPE html>
<html>
<?php

include "configuration/config_include.php";
include "configuration/config_all_stat.php";

?>
<head>
        <meta charset="utf-8" />
        <title>Bukti Pembayaran |<?php echo $app;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aplikasi Kelola Sales dan Keuangan" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/title.png">
<?php
connect();
head();timing();
session();
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

$halaman = "kosong"; // halaman
$dataapa = "Bukti Pembayaran Angsuran"; // data
$tabeldatabase = "kosong"; // tabel database
$chmod = $chmenu1; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman

$no=$_GET['no'];

$bid=$_GET['id'];

$sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM data"));


$tabel="bebasan_pay";
$a=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM $tabel WHERE no='$no'"));

$b=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bebasan WHERE no='$bid'"));

$siswa=$b['student_id'];
$t=$b['period_id'];
$jenis=$b['jenis_id'];

$c=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE student_id='$siswa'"));
$kelas=$c['kelas_id'];

$d=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM class WHERE no='$kelas'"));

$e=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM jenis_bayar WHERE jenis_id='$jenis'"));


//End Setting Halaman
 
?>

<?php

menu();

?>




<!-- Letak Kode PHP atas -->




<!-- END Letak Kode PHP atas -->





  <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->


            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- halaman dan breadcrumbs -->
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
                                    <h4 class="page-title"><?php echo $dataapa;?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end halaman dan breadcrumbs --> 


<!-- ISI HALAMAN -->


                        	 <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="clearfix">
                                        <div class="float-left mb-2">
                                           
                                        </div>
                                        <div class="float-right">

        <h3 class="m-0 d-print-none">Tanda Terima Pembayaran</h3>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-7 border-right">
                                            <div class="mt-3">
                                                <?Php
                                      echo       '<p><b>'.$sql['nama'].'</b></p>';
                                       echo      '<p style="width:70%">'.$sql['alamat'].'<br>P: '.$sql['notelp'].'<br>E: '.$sql['email'].' </p>';
                                                ?>
                                            </div>

                                        </div><!-- end col -->
                                        <div class="col-md-5">
                                           <table class="table mb-0 table-borderless">
                                       
                                       
                                        <tr>
                                            <th style="width:10%"><b>Siswa</b></th>
                                            <td >: <?php echo $c['nis'] ." / ". $c['nama'];?></td>
                                            
                                        </tr>
                                        <tr>
                                           <th style="width:10%"><b>Kelas</b></th>
                                            <td >: <?php echo $d['kelas'];?></td>
                                        </tr>

                                        <tr>
                                           <th style="width:10%"><b>Total Tagihan </b></th>
                                            <td >: <?php echo number_format($b['bill']);?></td>
                                        </tr>
                                        
                                           </table>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                               

                                                 <table class="table mt-4 table-centered">
                                                    <thead>
                                                    <tr><th>No.</th>
                                                        <th>Pembayaran</th>
                                                        <th>Jumlah Pembayaran</th>
                                                        
                                                        <th class="text-right">Sisa Tagihan</th>
                                                    </tr></thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <b>Angsuran <?php echo $e['nama'] ." T.A ". $e['tahunajar'];?></b> <br/>
                                                           diterima pada <?Php echo date('d/m/y', strtotime($a['tanggal']));?>
                                                        </td>
                                                        <td ><b><?Php echo number_format($a['jumlah']);?></b>
                                                           </td>

                                                        <td class="text-right"> <?Php echo number_format($a['sisa']);?></td>

                                                       
                                                        
                                                    </tr>
                                                   
                                                    </tbody>
                                                </table>

                                         

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="clearfix pt-4">
                                                

                                                <small>
                                        *Tanda Terima ini berlaku sebagai bukti pembayaran yang sah
                                                </small>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-md-center">
                                               <small>
                                                    <br>
                                                    <br>
                                                   <u style="text-align: center"><b> <?php echo $a['kasir'];?></b></u><br>
                                                    (Petugas)
                                                </small>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    

                                    <div class="hidden-print mt-4">
                                        <div class="text-right d-print-none">
                                            <a href="javascript:window.print()" class="btn btn-blue waves-effect waves-light"><i class="fa fa-print mr-1"></i> Print</a>
                                            <a href="pay_add?t=<?php echo $t;?>&s=<?php echo $c['nis'];?> " class="btn btn-danger waves-effect waves-light">Kembali</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->
                     


   <!-- END ISI HALAMAN -->


                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
<!--FOOTER-->
                
<?php footer();?>

<!-- END FOOTER-->

            </div>



              <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->






<!-- Sidebar Kanan -->
<?php

right();

?>

<!-- End Sidebar Kanan -->





<!-- Letak Kode PHP Bawah -->




<!-- END Letak Kode PHP bawah -->




<!-- Library & Pluggins-->
  <!-- Vendor js -->
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
      

      <!-- Daterange dan Select2-->

       <script src="assets/datepicker/bootstrap-datepicker.js"></script>
         <script src="assets/daterangepicker/daterangepicker.js"></script>
            <script src="assets/libs/select2/select2.min.js"></script>

              <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <script src="assets/js/pages/sweet-alerts.init.js"></script>


         <!-- Init js-->
        <script src="assets/js/pages/form-pickers.init.js"></script>

        <!-- Init js-->
        <script src="assets/js/pages/form-advanced.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

<!-- END Lib & Plugins-->






</body>
</html>