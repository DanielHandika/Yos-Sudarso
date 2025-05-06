<!DOCTYPE html>
<html>
<?php

include "configuration/config_include.php";
include "configuration/config_all_stat.php";

?>
<head>
        <meta charset="utf-8" />
        <title>Pembayaran |<?php echo $app;?></title>
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
$dataapa = "pembayaran"; // data
$tabeldatabase = "kosong"; // tabel database
$chmod = $chmenu1; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
$no=$_GET['no'];

//End Setting Halaman
 
?>

<?php

menu();

?>




<!-- Letak Kode PHP atas -->

<?php

if(isset($_POST['simpan'])){
   if($_SERVER["REQUEST_METHOD"] == "POST"){

    $no = mysqli_real_escape_string($conn, $_POST["no"]);
     $t = mysqli_real_escape_string($conn, $_POST["t"]);
      $s = mysqli_real_escape_string($conn, $_POST["s"]);
    $dibayar = mysqli_real_escape_string($conn, $_POST["dibayar"]);
      $kembali = mysqli_real_escape_string($conn, $_POST["kembali"]);
       $tagih = mysqli_real_escape_string($conn, $_POST["tagih"]);
      $now=date("Y-m-d");
      $user=$_SESSION['nama'];

      $nama = mysqli_real_escape_string($conn, $_POST["namapr"]);
       $stu = mysqli_real_escape_string($conn, $_POST["stu"]);

      if($dibayar>=$tagih){
      $sql=mysqli_query($conn,"UPDATE bulanan SET bulanan_status='sudah', bulanan_bayar='$tagih',kasir='$user',tgl_input='$now' WHERE no='$no'");

        $sql1=mysqli_query($conn,"INSERT INTO uang_masuk_keluar VALUES('','pay','$nama','pembayaran bulanan','$tagih','$user','1','$stu','$t','0','$no','$now','$now')");

       echo "<script type='text/javascript'>  alert('Pembayaran telah disimpan');</script>";
        echo "<script type='text/javascript'>window.location = 'pay_add?t=$t&s=$s';</script>";

  } else {
 echo "<script type='text/javascript'>  alert('Gagal, Jumlah bayar tidak boleh kurang dari yang ditagih');</script>";
  echo "<script type='text/javascript'>window.location = 'pay_save?no=$no';</script>";

  }

} } ?>

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
<?php if(!isset($_GET['bebas'])){



$sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bulanan WHERE no='$no'"));
$j=$sql['jenis_id'];
$s=$sql['student_id'];
$t=$sql['period_id'];

$sqla=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM jenis_bayar WHERE jenis_id='$j'"));
$sqlb=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE student_id='$s'"));


    ?>

<form method="post">
                        	 <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">Form Pembayaran Bulanan</h4>
                                   
                                    <div class="table-responsive">

                                         <div class="form-group">
                                                <label for="exampleInputPassword1">Nama Pembayaran</label>
                                                <input type="text" class="form-control" name="namapr" value="<?php echo $sqla['nama'] ." T.A ". $sqla['tahunajar'];?>" readonly>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Siswa</label>
                                                <input type="text" class="form-control" value="<?php echo $sqlb['nama'];?>" readonly>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Jumlah Tagihan</label>
                                                <input type="text" class="form-control" value="<?php echo $sql['bulanan_bill'];?>" id="tagih" name="tagih" readonly>
                                                 <input type="hidden" class="form-control" name="no" value="<?php echo $no;?>" readonly>
                                                  <input type="hidden" class="form-control" name="t" value="<?php echo $t;?>" readonly>
                                                   <input type="hidden" class="form-control" name="s" value="<?php echo $sqlb['nis'];?>" readonly>
                                                    <input type="hidden" class="form-control" name="stu" value="<?php echo $s;?>" readonly>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Jumlah Dibayarkan</label>
                                                <input type="text" class="form-control" id="dibayarkan" name="dibayar" onkeyup="sum();" autocomplete="off">
                                            </div>

                                       
                                    </div>
                                </div>
                            </div>

                             <script>
                                               function sum() {
                                                     var txtFirstNumberValue =  document.getElementById('dibayarkan').value
                                                     var txtSecondNumberValue = document.getElementById('tagih').value;
                                                     var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
                                                     if (!isNaN(result)) {
                                                        document.getElementById('kembalinye').value = result;
                                                     }
                                                   if (!$(jumlah).val()){
                                                     document.getElementById('kembalinye').value = "0";
                                                   }
                                                   if (!$(hargajual).val()){
                                                     document.getElementById('kembalinye').value = "0";
                                                   }
                                               }
                                               </script>

 <?php  if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                             <div class="col-lg-3">
                                <div class="card-box">
                                    <h4 class="header-title">Tindakan</h4>
                                   
                                    <div class="table-responsive">

                                         <div class="form-group">
                                                <label for="exampleInputPassword1">Uang Kembalian</label>
                                                <input type="text" class="form-control" id="kembalinye" name="kembali" readonly>
                                            </div>

                                             
                                             <button type="submit" name="simpan" class="btn btn-block btn-success waves-effect width-md waves-light">SIMPAN</button>

                                               <a href="pay_add?t=<?php echo $t;?>&s=<?php echo $sqlb['nis'];?>" class="btn btn-block btn-danger waves-effect width-md waves-light">KEMBALI</a>
                                       
                                    </div>
                                </div>
                            </div>
        <?php } ?>

                        </div>
        </form>             

<?php } else {


$sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bebasan WHERE no='$no'"));
$j=$sql['jenis_id'];
$s=$sql['student_id'];
$t=$sql['period_id'];

$sqla=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM jenis_bayar WHERE jenis_id='$j'"));
$sqlb=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE student_id='$s'"));


$sisa=$sql['bill']-$sql['sudahbayar'];

    ?>

<form method="post">
                             <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">Form Pembayaran Siswa</h4>
                                   
                                    <div class="table-responsive">

                                         <div class="form-group">
                                                <label for="exampleInputPassword1">Nama Pembayaran</label>
                                                <input type="text" class="form-control" name="namapr" value="<?php echo $sqla['nama'] ." T.A ". $sqla['tahunajar'];?>" readonly>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Siswa</label>
                                                <input type="text" class="form-control" value="<?php echo $sqlb['nama'];?>" readonly>
                                                <input type="hidden" class="form-control" name="stu" value="<?php echo $s;?>" readonly>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Tagihan</label>
                                                <input type="text" class="form-control" id="tagihan" value="<?php echo ($sql['bill']);?>" name="bill" readonly>
                                                <input type="hidden" class="form-control" name="no" value="<?php echo $no;?>" readonly>

                                                  <input type="hidden" class="form-control" name="t" value="<?php echo $t;?>" readonly>
                                                   <input type="hidden" class="form-control" name="s" value="<?php echo $sqlb['nis'];?>" readonly>

                                                   <input type="hidden" class="form-control" name="sisa" value="<?php echo $sisa;?>" readonly>
                                            </div>

                                              <div class="form-group">
                                                <label for="exampleInputPassword1">Sudah Dibayarkan</label>
                                                <input type="text" class="form-control" id="paid" value="<?php echo $sql['sudahbayar'];?>" name="sudah" readonly>
                                                 
                                            </div>

                                            

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Jumlah Bayar</label>
                                                <input type="text" class="form-control" id="dibayar" name="dibayar" autocomplete="off">
                                            </div>

                                            <button type="submit" name="save" class="btn btn-block btn-success waves-effect width-md waves-light">SIMPAN</button>
                                            <a href="pay_add?t=<?php echo $t;?>&s=<?php echo $sqlb['nis'];?>" class="btn btn-block btn-danger waves-effect width-md waves-light">KEMBALI</a>
                                       
                                    </div>
                                </div>
                            </div>


                            


                             <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">Riwayat Pembayaran</h4> 
                                   
                                    <div class="table-responsive">

                                        
                                             
                                             <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Diterima</th>
                                            <th>Jumlah</th>
                                            <th>Cetak</th>
                                        </tr>
                                        </thead>
                                        <tbody>
           <?php $nom=0;
                 $sqli=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(jumlah) as jml FROM bebasan_pay WHERE bebasan_id='$no'"));
                $sqlq=mysqli_query($conn,"SELECT * FROM bebasan_pay WHERE bebasan_id='$no'");
                while($row=mysqli_fetch_assoc($sqlq)){                                 
                      echo            '    <tr>
                                            <th scope="row">'.++$nom.'</th>
                                            <td>'.date('d-m-y',strtotime($row['tanggal'])).'</td>
                                            <td>'.$row['kasir'].'</td>
                                            <td>'.number_format($row['jumlah']).'</td>
                                             <td> <a href="pay_receipt_cicilan?id='.$no.'&no='.$row['no'].'" class="btn btn-warning waves-effect waves-light btn-sm"><i class="fas fa-print"></i></a></td>
                                        </tr>';
                  }?>                      
                   <?php          if($sqli['jml']>0){            
                        echo      '           <tr>
                                            <th scope="row">#</th>
                                            <td colspan="2"><b>Total</b></td>
                                            <td><b>'.number_format($sqli['jml']).'</b></td>

                                        </tr>';
                        } else {

                            echo '<tr><td colspan="4" style="text-align:center"> Belum Ada Pembayaran Tercatat</td></tr>';

                        }
                    ?>
                                        </tbody>
                                    </table>
                                               
                                       
                                    </div>
                                    <br>
          

                                </div>


                            </div>



                        </div>
        </form>             

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
<?php

right();

?>

<!-- End Sidebar Kanan -->





<!-- Letak Kode PHP Bawah -->


<?php

if(isset($_POST['save'])){
   if($_SERVER["REQUEST_METHOD"] == "POST"){

    $no = mysqli_real_escape_string($conn, $_POST["no"]);
     $t = mysqli_real_escape_string($conn, $_POST["t"]);
      $s = mysqli_real_escape_string($conn, $_POST["s"]);
       $sisa = mysqli_real_escape_string($conn, $_POST["sisa"]);
    $dibayar = mysqli_real_escape_string($conn, $_POST["dibayar"]);
      $bill = mysqli_real_escape_string($conn, $_POST["bill"]);
       $sudah = mysqli_real_escape_string($conn, $_POST["sudah"]);

       $bayar=$sudah+$dibayar;

    $sisanow=$sisa-$dibayar;


      $now=date("Y-m-d");
      $user=$_SESSION['nama'];


      $nama = mysqli_real_escape_string($conn, $_POST["namapr"]);
       $stu = mysqli_real_escape_string($conn, $_POST["stu"]);

      if($bayar>=$bill){
      $sql=mysqli_query($conn,"UPDATE bebasan SET status='sudah', sudahbayar='$bayar',kasir='$user',tgl_input='$now' WHERE no='$no'");

      $sql1=mysqli_query($conn,"INSERT INTO bebasan_pay VALUES('','$no','$t','$stu','$now','$user','$dibayar','$sisanow')");
   $sql2=mysqli_query($conn,"INSERT INTO uang_masuk_keluar VALUES('','pay','$nama','pembayaran cicilan','$dibayar','$user','1','$stu','$t','$no','0','$now','$now')");

       echo "<script type='text/javascript'>  alert('Pembayaran berhasil dilunasi');</script>";
        echo "<script type='text/javascript'>window.location = 'pay_add?t=$t&s=$s';</script>";

  } else {
    $sql=mysqli_query($conn,"UPDATE bebasan SET sudahbayar='$bayar',kasir='$user',tgl_input='$now' WHERE no='$no'");
    $sql1=mysqli_query($conn,"INSERT INTO bebasan_pay VALUES('','$no','$t','$stu','$now','$user','$dibayar','$sisanow')");

     $sql2=mysqli_query($conn,"INSERT INTO uang_masuk_keluar VALUES('','pay','$nama','pembayaran cicilan','$dibayar','$user','1','$stu','$t','$no','0','$now','$now')");
 echo "<script type='text/javascript'>  alert('Berhasil, Cicilan pembayaran telah disimpan');</script>";
   echo "<script type='text/javascript'>window.location = 'pay_save?no=$no&bebas=yes';</script>";

  }

} } ?>


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