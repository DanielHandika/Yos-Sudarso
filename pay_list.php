<!DOCTYPE html>
<html>
<?php

include "configuration/config_include.php";
include "configuration/config_all_stat.php";

?>
<head>
        <meta charset="utf-8" />
        <title>Data Pembayaran |<?php echo $app;?></title>
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

$halaman = "pay_list"; // halaman
$dataapa = "Data Pembayaran Siswa"; // data
$tabeldatabase = "kosong"; // tabel database
$chmod = $chmenu1; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman



$ccsql="select * from backset";
$hasil2 = mysqli_query($conn,$ccsql);
while ($fill = mysqli_fetch_assoc($hasil2)){
$limit = $fill['harihapus'];
}

$lastnday=date('Y-m-d', strtotime('-'.$limit.' days'));
$today=date('Y-m-d');
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






 <script>
 window.setTimeout(function() {
    $("#myAlert").fadeTo(200, 0).slideUp(400, function(){
        $(this).remove();
    });
}, 2000);
</script>
<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$msg=$_GET['msg'];
if($msg=="success"){?>
 <div id="myAlert" class="alert alert-success text-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span> </button>
<strong>Berhasil!</strong>  Data Pembayaran telah dihapus permanen</div>
<?php } else if ($msg=="failed"){?>
<div id="myAlert" class="alert alert-danger text-danger alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span> </button>
<strong>GAGAL!</strong>  Terjadi kesalahan query ketika menghapus data, silahkan hubungi admin untuk tindakan lebih lanjut</div>

<?php } else if ($msg=="error"){?>
<div id="myAlert" class="alert alert-danger text-danger alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span> </button>
<strong>GAGAL!</strong>  data yang dikirimkan hilang ketika submit, silahkan ulangi dan pastikan anda memiliki hak untuk menghapus</div>

<?php } ?>



<!-- ISI HALAMAN -->


                        	 <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                    <h4 class=" col-8 header-title">Data Pembayaran Siswa (<?php echo $limit;?> hari terakhir) </h4>
                                    <div class="col-4">


                                        <div class="form-group row">
                                                            
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                        <input type="text" class="form-control" placeholder="NIS atau Nama Siswa">
                                                                    <div class="input-group-append">
                        <button class="btn btn-dark waves-effect waves-light" type="button"><i class="fa fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                      
</div>
</div>
<br>




<?php
              error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
             
            
                $sql="SELECT * FROM uang_masuk_keluar WHERE tipe='pay' AND tgl_input BETWEEN '" . $lastnday . "' AND  '" . $today ."' ORDER BY no DESC";
          
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
                                             <th>Tanggal</th>
                                              <th>Jumlah</th>
                                            <th>
                                                NIS
                                            </th>
                                            <th>Siswa</th>
                                             <th>Penerima</th>
                                           
                                           <th>Keterangan</th>
                                            
                                            <th >Hapus</th>
                                        </tr>
                                        </thead>

                                        <tbody>

 <?php        while(($count<$rpp) && ($i<$tcount)) {
               mysqli_data_seek($result,$i);
               $row = mysqli_fetch_array($result);
               ?>     

                                            <tr>
                                                <td><?php echo ++$no_urut;?> </td>
                                                <td><?php echo date('d/m/y',strtotime($row['tgl_update'])) ;?></td>
                                                <td><b><?php echo number_format($row['jumlah']);?></b></td>

                                               
                                                    <?php $id=$row['student_id'];
                                            $b3=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE student_id='$id'"));
                                            ;?>

                                                <td><?php echo $b3['nis'];?></td>

                                                 <td><b><?php echo $b3['nama'];?></b></td>

                                                 <?php if($row['bebas_id']!='0'){
                                                    $idtrx=$row['bebas_id'];
        $cc=mysqli_fetch_assoc(mysqli_query($conn,"SELECT kasir FROM bebasan WHERE no='$idtrx'"));
                                                 } else {
                                                 $idtrx=$row['bulanan_id'];
        $cc=mysqli_fetch_assoc(mysqli_query($conn,"SELECT kasir FROM bulanan WHERE no='$idtrx'"));
                                                 }?>

                                                  <td><?php echo $cc['kasir'];?></td>




                                                <td><?php echo $row['nama'];?></td>
                                                <td>

   <?php if($row['bebas_id']!='0'){?>

                                                    <a href="" data-toggle="modal" data-target="#hapusbebas" class="btn btn-xs btn btn-warning waves-effect waves-light"><i class="fa fa-trash"></i></a>

                                                     <div id="hapusbebas" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Konfirmasi hapus data?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <p>1. Data Pembayaran siswa akan dihapus permanen</p>
                                                     <p>2. Data pembayaran ini akan dihapus dari laporan transaksi</p>
                                                     <p>3. Wali murid mungkin masih memilki bukti pembayaran, pastikan sudah menarik kembali bukti tersebut sebelum menghapus</p>

                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                   <a href="component/delete/delete_pay_siswa.php?tipe=bebas&id=<?php echo $row['bebas_id'];?>&no=<?php echo $row['no'];?>&jumlah=<?php echo $row['jumlah'];?>&chmod=<?php echo $chmod;?>" class="btn btn-warning waves-effect waves-light">Ya, Hapus</a>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
<?php } else { ?>


 <a href="" data-toggle="modal" data-target="#hapusbulanan" class="btn btn-xs btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>

                                                     <div id="hapusbulanan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Konfirmasi hapus data?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <p>1. Data Pembayaran siswa akan dihapus permanen</p>
                                                     <p>2. Data pembayaran ini akan dihapus dari laporan transaksi</p>
                                                     <p>3. Wali murid mungkin masih memilki bukti pembayaran, pastikan sudah menarik kembali bukti tersebut sebelum menghapus</p>

                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                    <a href="component/delete/delete_pay_siswa.php?tipe=bulanan&id=<?php echo $row['bulanan_id'];?>&no=<?php echo $row['no'];?>&jumlah=<?php echo $row['jumlah'];?>&chmod=<?php echo $chmod;?>" class="btn btn-danger waves-effect waves-light">Ya, Hapus</a>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->


<?php } ?>
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