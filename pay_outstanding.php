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
        <!-- App favicon -->
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
                                    <h4 class="page-title">Tunggakan</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end halaman dan breadcrumbs --> 


<!-- ISI HALAMAN -->


                        	 <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                    <h4 class=" col-10 header-title">Data Tunggakan Pembayaran Bulanan (per <?php echo $namabulan;?>)</h4>
                                    <div class="col-2">
                                        <form method="get">
                                    <select class="form-contro;" data-toggle="select2" name="bulanaktif" onchange="this.form.submit()">
    <?php
        $sql=mysqli_query($conn,"select * from months");
        while ($row=mysqli_fetch_assoc($sql)){
          if ($cons==$row['month_id'])
          echo "<option value='".$row['month_id']."' selected='selected'>".$row['month_name']."</option>";
          else
          echo "<option value='".$row['month_id']."'>".$row['month_name']."</option>";
        }
      ?>
                    </select>
                </form>
</div>
</div>
<br>




<?php
              error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
             
            
                $sql    = "SELECT DISTINCT(student_id) FROM bulanan WHERE period_id='$t' AND month_id<='$cons' AND bulanan_status LIKE '%belum%'";
          
               $result = mysqli_query($conn, $sql);
               $rpp    = 15;
               $reload = "$halaman"."?pagination=true";
               $page   = intval(isset($_GET["page"]) ? $_GET["page"] : 0);

               if ($page <= 0)
               $page = 1;
               $tcount  = mysqli_num_rows($result);
               $tpages  = ($tcount) ? ceil($tcount / $rpp) : 1;
               $count   = 0;
               $i       = ($page - 1) * $rpp;
               $no_urut = ($page - 1) * $rpp;
               ?>
                                    <div class="table-responsive">
                                       <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" >
                                        <thead>
                                        <tr>
                                            <th>
                                                NO.
                                            </th>
                                            <th>
                                                NIS
                                            </th>
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

                                        <tr><td><?php echo ++$no_urut;?></td>
                                            <td><?php $id=$row['student_id'];
                                            $b3=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE student_id='$id'"));

                                            $subject =$b3['avatar'];
                                            $search = 'student/';
                                            $trimmed = str_replace($search, '', $subject) ;


                                            ;?>

                                                <b><?php echo $b3['nis'];?></b></td>
                                            <td>
                                                <a href="" class="text-body">
                                                   
                                                    <span class="ml-1"><b><?php echo $b3['nama'];?></b></span>
                                                </a>
                                            </td>

                                            <td>
                                               <?php $kls= $b3['kelas_id'];
                                                $b4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM class WHERE no='$kls'"));
                                                echo $b4['kelas']?>
                                            </td>

                                            <td>
                                               <?php 
                                                $b5=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(bulanan_bill) as oustand FROM bulanan WHERE student_id='$id' AND period_id='$t' AND month_id<='$cons' AND bulanan_status LIKE '%belum%'"));
                                                echo number_format($b5['oustand'])?>
                                            </td>

                                            <td>
                                                <?php 
                                                $b6=mysqli_fetch_assoc(mysqli_query($conn,"SELECT tgl_input FROM bulanan WHERE student_id='$id' AND period_id='$t' AND bulanan_status LIKE '%sudah%' ORDER BY tgl_input"));

                                                if($b6['tgl_input']==''){
                                                  echo 'belum ada pembayaran';
                                                } else {
                                                echo date('d/m/y',strtotime($b6['tgl_input']));
                                              }?>

                                            </td>

                                           
                                            <td>
                                               <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> Tindakan <i class="mdi mdi-chevron-down"></i> </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="pay_add?t=<?php echo $t;?>&s=<?php echo $b3['nis'];?>">Lihat</a>
                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=<?php echo $b3['nohp'];?>&text=Salam%20Baik%2C%0D%0A%0DKepada%20Bapak%2FIbu%20Wali Murid%2C%0D%0A%0D%0AKami%20Informasikan%20mengenai%20tagihan%20ananda%20<?php echo $b3['nama'];?>%20Sebesar%20Rp<?php echo number_format($b5['oustand'])?>&text=Salam%20Baik%2C%0D%0A%0DKepada%20Bapak%2FIbu%20Wali Murid%2C%0D%0A%0D%0AKami%20Informasikan%20mengenai%20tagihan%20ananda%20<?php echo $b3['nama'];?>%20Sebesar%20Rp<?php echo number_format($b5['oustand'])?>%2E%20Pembayaran%20dapat%20dilakukan%20dengan%20cara%3A%0D%0A%0D%0ATunai%3A%20Di sekolah%0D%0ATransfer%3A%20BRI%0D%0ANama%20Rekening%3A%20Yayasan%20Yos%20Sudarso%0D%0ANomor%20Rekening%3A%20035701003183305%2E%20Setelah%20Transfer%2C%20mohon%20konfirmasi%20melalui%20Whatsapp%20ke%20082178862003%2E%0D%0A%0D%0AUntuk%20melihat%20status%20pembayaran%20dapat%20diakses%20secara%20online%20melalui%20www%2Eyossudarsobandarjaya%2Emy%2Eid%0D%0ALogin%20ke%20siswa%20dengan%20NIS%20password%20123456%20%28silakan%20ubah%20password%20melalui%20menu%20pengaturan%20password%20setelah%20masuk%20ke%20akun%20siswa%29%0D%0AUntuk%20informasi%20penggunaan%20aplikasi%20lebih%20jelas%2C%20silakan%20hubungi%20bagian%20tata%20usaha%20sekolah%2E%0D%0ATerima%20kasih%2E%0D%0A%0D%0AYayasan%20Yos%20Sudarso%2E"
                                                target="_blank">Whatsapp Siswa</a>

                                                 <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=<?php echo $b3['waortu'];?>&text=Salam%20Baik%2C%0D%0A%0DKepada%20Bapak%2FIbu%20Wali Murid%2C%0D%0A%0D%0AKami%20Informasikan%20mengenai%20tagihan%20ananda%20<?php echo $b3['nama'];?>%20Sebesar%20Rp<?php echo number_format($b5['oustand'])?>%2E%20Pembayaran%20dapat%20dilakukan%20dengan%20cara%3A%0D%0A%0D%0ATunai%3A%20Di sekolah%0D%0ATransfer%3A%20BRI%0D%0ANama%20Rekening%3A%20Yayasan%20Yos%20Sudarso%0D%0ANomor%20Rekening%3A%20035701003183305%2E%20Setelah%20Transfer%2C%20mohon%20konfirmasi%20melalui%20Whatsapp%20ke%20082178862003%2E%0D%0A%0D%0AUntuk%20melihat%20status%20pembayaran%20dapat%20diakses%20secara%20online%20melalui%20www%2Eyossudarsobandarjaya%2Emy%2Eid%0D%0ALogin%20ke%20siswa%20dengan%20NIS%20password%20123456%20%28silakan%20ubah%20password%20melalui%20menu%20pengaturan%20password%20setelah%20masuk%20ke%20akun%20siswa%29%0D%0AUntuk%20informasi%20penggunaan%20aplikasi%20lebih%20jelas%2C%20silakan%20hubungi%20bagian%20tata%20usaha%20sekolah%2E%0D%0ATerima%20kasih%2E%0D%0A%0D%0AYayasan%20Yos%20Sudarso%2E"
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

<?php 

if(isset($_GET['bulanaktif'])){
    $bulan=$_GET['bulanaktif'];

    $a1=mysqli_query($conn,"UPDATE months SET status='inactive'");
    $a1=mysqli_query($conn,"UPDATE months SET status='active' WHERE month_id='$bulan'");

    echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
}

?>


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