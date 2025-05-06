<!DOCTYPE html>
<html>
<?php

include "configuration/config_include.php";
include "configuration/config_all_stat.php";

?>
<head>
        <meta charset="utf-8" />
        <title>Pembayaran untuk Semua Siswa |<?php echo $app;?></title>
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

$halaman = "pos_setting_byall"; // halaman
$dataapa = "Semua Siswa"; // data
$tabeldatabase = "bebasan"; // tabel database
$chmod = $chmenu2; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman



$jenis_id=$_GET['q'];
$a=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM jenis_bayar WHERE jenis_id='$jenis_id'"));


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
                                            <li class="breadcrumb-item"><a href="pos_setting?q=<?php echo $jenis_id;?>">Atur Pembayaran</a></li>
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

                            <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Detail Jenis Pembayaran</h4>
    
                                        <form class="form-horizontal" >

                                             <div class="form-group row">
                                                <label for="inputPassword3" class="col-3 col-form-label">Jenis Pembayaran</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $a['nama']." - T.A ".$a['tahunajar'];?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-3 col-form-label">Tahun Ajaran</label>
                                                <div class="col-9">
                                                    <input type="email" class="form-control" id="inputEmail3" value="<?php echo $a['tahunajar'];?>" readonly>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label for="inputPassword4" class="col-3 col-form-label">Tipe Pembayaran</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $a['jenis_pembayaran'];?>" readonly>
                                                </div>
                                            </div>

                                             <div class="form-group row">
                                                <label for="inputPassword4" class="col-3 col-form-label">Kelas</label>
                                                <div class="col-9">
                                                     
                                                    <input type="text" class="form-control" value="Semua Kelas" readonly>
                                                
                                                </div>
                                            </div>

                                              <div class="form-group row">
                                                <label for="inputPassword4" class="col-3 col-form-label">Siswa</label>
                                                <div class="col-9">
                                                     
                                                    <input type="text" class="form-control" value="Semua Siswa" readonly>
                                                
                                                </div>
                                            </div>
                                           
                                           
                                        </form>
                                    </div>

                                   

                                      <div class="card-box">
                                        <h4 class="header-title mb-3">Pembayaran Bebas</h4>
                                                    
                                                   
                                           
                                       
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-3 col-form-label"><b>Jumlah (Rp)</b></label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" id="bebas1" placeholder="200000" onkeyup="sync1();">
                                                </div>
                                            </div>
                                          


                                            <script>
                                   function sync1() {
                                        
                                         var txtSecondNumberValue = document.getElementById('bebas1').value;
                                         var result = parseFloat(txtSecondNumberValue);
                                         if (!isNaN(result)) {
                                           
                                            document.getElementById('bebas2').value = txtSecondNumberValue;
                                           
                                         }
                                     
                                   }
                                   </script>


                                            <div class="form-group mb-0 row">
                                                <div class="offset-3 col-9">
                                                    <button data-toggle="modal" data-target="#myModal" class="btn btn-success waves-effect waves-light">Simpan</button>
                                                     <a href="pos_setting?q=<?php echo $jenis_id;?>" class="btn btn-secondary waves-effect waves-light">Batal</a>
                                                </div>
                                            </div>

                                       
                                    </div>
                                  </form>

                                    



 


                        </div>



<!--MODAL-->

 <!-- sample modal content -->
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Anda Yakin?</h4>
                                                </div>
                                                <div class="modal-body">

                                                    Hal ini akan membuat semua siswa ditagih dengan jumlah yang sama. Apabila ada Data dan nominal pembayaran yang sebelumnya akan ditimpa oleh nominal tagihan ini.<br><br>

                                                    Pilih  <span class="badge badge-danger">LANJUTKAN</span> apabila anda sudah memahami

                                                     <form method="post">
                                                     <input type="hidden" name="jenis" value="<?php echo $jenis_id;?>">
                                            <input type="hidden" name="period" value="<?php echo $a['period_id'];?>">

                                            <input type="hidden" class="form-control" id="bebas2" name="bebas" placeholder="200000">


                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                    <button type="submit" name="setting" class="btn btn-danger waves-effect waves-light">Ya, Lanjutkan</button>

                                                </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

<!--END MODAL-->



                     


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
if(isset($_POST['setting'])){
   if($_SERVER["REQUEST_METHOD"] == "POST"){

     
          $period = mysqli_real_escape_string($conn, $_POST["period"]);
           $jenis = mysqli_real_escape_string($conn, $_POST["jenis"]);
            $bayar = mysqli_real_escape_string($conn, $_POST["bebas"]);

           $user=$_SESSION['nama'];
           $now=date('Y-m-d');

        $query=mysqli_query($conn,"SELECT * FROM student");
        while($row=mysqli_fetch_assoc($query)){
            $murid=$row['student_id'];

            $sql=mysqli_query($conn,"SELECT * FROM bebasan WHERE period_id='$period' AND student_id='$murid' AND jenis_id='$jenis'");

            if(mysqli_num_rows($sql)>0){

              $sql1=mysqli_query($conn,"UPDATE bebasan SET bill='$bayar',status='belum', sudahbayar='0', kasir='$user', tgl_input='$now' WHERE period_id='$period' AND student_id='$murid' AND jenis_id='$jenis'");

            } else {
              $sql1=mysqli_query($conn,"INSERT INTO bebasan VALUES('','$period','$murid','$jenis','$bayar','belum','0','$user','$now')");

            }

echo "<script type='text/javascript'>window.location = 'pos_setting?q=$jenis&insert=true';</script>";


}
   }  } ?>



<!-- END Letak Kode PHP bawah -->

 <script src="assets/jQuery/jquery-2.2.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


<script type="text/javascript">
$(document).ready(function () {

    $("#class").change(function () {
  var cntrol = $(this);
  
  var kelas =cntrol.find(':selected').data('no');

  
  $("#kelas").val(kelas);
 
 });

});
</script>


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