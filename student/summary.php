<!DOCTYPE html>
<html>
<?php

include "configuration/config_include.php";
include "configuration/config_all_stat.php";

?>
<head>
        <meta charset="utf-8" />
        <title>Ringkasan Tagihan | <?php echo $app;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aplikasi Kelola Sales dan Keuangan" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/title.png">
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

$halaman = "ringkasan"; // halaman
$dataapa = "Tagihan"; // data
$tabeldatabase = "kosong"; // tabel database
$chmod = 5; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman

$a=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM periode WHERE status='active'"));
$periode=$a['no'];
$id=$_SESSION['id'];
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
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Bulanan</h4>
                                    <p class="sub-header">
                                       Lakukan Pembayaran bulanan secara rutin untuk kelancaran kegiatan belajar mengajar
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th style="width:10px">No.</th>
                                                <th>Nama Pembayaran</th>
                                                <th>Belum Bayar</th>
                                                 <?php $sql=mysqli_query($conn,"SELECT * FROM months ORDER by month_id");

                                                while($rowt=mysqli_fetch_assoc($sql)){
                                                    if($rowt['status']=='inactive'){
                                                echo '<th>'.$rowt['month_name'].'</th>';
                                            } else {
                                                 echo '<th class="table-info">'.$rowt['month_name'].'</th>';
                                            }
                                            }
                                                ?>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           
                                            <?php $sql=mysqli_query($conn,"SELECT DISTINCT jenis_id FROM bulanan WHERE student_id='$id' ORDER by no");
                                              $no=0;
                                                while($row=mysqli_fetch_assoc($sql)){
                                                                                    

                                            ?>
                                            <tr >
                                                <th scope="row"><?php echo ++$no;?></th>
                                                <td><?php $j=$row['jenis_id'];
                                                 $qr=mysqli_fetch_assoc(mysqli_query($conn,"SELECT nama,tahunajar FROM jenis_bayar WHERE jenis_id='$j'"));
                                                 echo $qr['nama'];?>-T.A <?php echo $qr['tahunajar'];?>

                                                </td>
                                                <td>
                                                  <?php $qa=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(bulanan_bill) as bill FROM bulanan WHERE jenis_id='$j' AND period_id='$periode' AND student_id='$id' AND bulanan_status LIKE '%belum%'"));  
                                                  echo number_format($qa['bill']);?>

                                                </td>
                                                  <?php 

                                                    $i = 0;
                                                    while($i <= 11){
                                                     $i++; 
                                                $qs=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bulanan WHERE jenis_id='$j' AND period_id='$periode' AND student_id='$id' AND month_id='$i'"));
                                                if($qs['bulanan_status']=='sudah'){
                                                echo ' <td class="table-success"><a href="receipt?no='.$qs['no'].'&tipe=1">'.date('d/m/y',strtotime($qs['tgl_input'])).'</a><br>LUNAS </td>';
                                                        } else{
                                                  echo ' <td ><b>'.number_format($qs['bulanan_bill']).'</b></td>';           
                                                        }
                                            }
                                                    ?>
                                                
                                            </tr>

                                        <?php } ?>

                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                     



<?php 
$b=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM bebasan WHERE student_id='$id'"));

if($b>0){
?>
                         <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Non Bulanan</h4>
                                    <p class="sub-header">
                                       Lakukan Pembayaran sebelum jatuh tempo
                                    </p>


                                     <div class="table-responsive">

                                         <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pembayaran</th>
                                                <th>Tagihan</th>
                                                <th>Dibayar</th>
                                                 <th>Status</th>
                                                  <th>Lihat</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                             <?php $sqla=mysqli_query($conn,"SELECT * FROM bebasan WHERE student_id='$id' ORDER by no");
                                              $nom=0;
                                                while($rowa=mysqli_fetch_assoc($sqla)){?>
                                           
                                            <tr >
                                                <th scope="row"><?php echo ++$nom;?></th>
                                               <td><?php $j=$rowa['jenis_id'];
                                                 $qr=mysqli_fetch_assoc(mysqli_query($conn,"SELECT nama,tahunajar FROM jenis_bayar WHERE jenis_id='$j'"));
                                                 echo $qr['nama'];?>-T.A <?php echo $qr['tahunajar'];?>

                                                </td>
                                                <td><?php echo number_format($rowa['bill']);?></td>
                                                 <td><?php echo number_format($rowa['sudahbayar']);?></td>
                                                 <?php if($rowa['status']!='belum'){?>
                                                <td class="table-danger"><?php echo $rowa['status'];?></td>
                                            <?php } else {?>
                                                    <td ><?php echo $rowa['status'];?></td>
                                            <?php } ?>
                                                <td>
                                                   

                                                 <a href="summary_detail?no=<?php echo $rowa['no'];?>&j=<?php echo $j;?>" class="demo-delete-row btn btn-danger btn-sm btn-icon" ><i class="fa fa-eye"></i></a>


                                                  
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                     </div>


                                </div>
                            </div>
                        </div>
<?php } ?>
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


<!-- End Sidebar Kanan -->





<!-- Letak Kode PHP Bawah -->




<!-- END Letak Kode PHP bawah -->




<!-- Library & Pluggins-->
  <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <script src="../assets/libs/switchery/switchery.min.js"></script>
        <script src="../assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="../assets/libs/select2/select2.min.js"></script>
        <script src="../assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
        <script src="../assets/libs/autocomplete/jquery.autocomplete.min.js"></script>
        <script src="../assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="../assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="../assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="../assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>

         <script src="../assets/libs/moment/moment.min.js"></script>
        <script src="../assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="../assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="../assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
      

      <!-- Daterange dan Select2-->

       <script src="../assets/datepicker/bootstrap-datepicker.js"></script>
         <script src="../assets/daterangepicker/daterangepicker.js"></script>
            <script src="../assets/libs/select2/select2.min.js"></script>

              <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <script src="../assets/js/pages/sweet-alerts.init.js"></script>


         <!-- Init js-->
        <script src="../assets/js/pages/form-pickers.init.js"></script>

        <!-- Init js-->
        <script src="../assets/js/pages/form-advanced.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>

<!-- END Lib & Plugins-->






</body>
</html>