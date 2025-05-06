<?php
include "../../configuration/config_connect.php";
include "../../configuration/config_session.php";
include "../../configuration/config_chmod.php";
include "../../configuration/config_etc.php";
$tipe =$_GET['tipe'];
$no = $_GET['no'];
$id = $_GET['id'];
$chmod = $_GET['chmod'];
$jumlah = $_GET['jumlah'];
$forwardpage ="pay_list";
?>
<link href="../../assets/libs/spinkit/spinkit.css" rel="stylesheet" type="text/css" >
                                   


<?php
if( $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] =='admin' || $_SESSION['jabatan'] == 'guru'){


if($tipe=='bulanan'){

$act1=mysqli_query($conn,"UPDATE bulanan SET bulanan_status='belum', bulanan_bayar='0' WHERE no='$id'");
$act2="DELETE FROM uang_masuk_keluar WHERE no='$no'";

 if (mysqli_query($conn, $act2)) {
      header("Location: ".$baseurl."/pay_list?msg=success");
   } else {
      header("Location: ".$baseurl."/pay_list?msg=failed");
   }


} else if($tipe=='bebas') {

$cek1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bebasan WHERE no='$id'"));
$sudahbayar=$cek1['sudahbayar']-$jumlah;

$act1=mysqli_query($conn,"UPDATE bebasan SET status='belum', sudahbayar='$sudahbayar' WHERE no='$id'");

$act2=mysqli_query($conn,"DELETE FROM bebasan_pay WHERE bebasan_id='$id' AND jumlah='$jumlah'");
$act3="DELETE FROM uang_masuk_keluar WHERE no='$no'";

 if (mysqli_query($conn, $act3)) {
      header("Location: ".$baseurl."/pay_list?msg=success");
   } else {
      header("Location: ".$baseurl."/pay_list?msg=failed");
   }


}







} else{

 header("Location: ".$baseurl."/pay_list?msg=error");
 
 }
?>
<table width="100%" align="center" cellspacing="0">
  <tr>
    <td height="500px" align="center" valign="middle">
      
       <div class="sk-wave">
                                        <div class="sk-rect sk-rect1"></div>
                                        <div class="sk-rect sk-rect2"></div>
                                        <div class="sk-rect sk-rect3"></div>
                                        <div class="sk-rect sk-rect4"></div>
                                        <div class="sk-rect sk-rect5"></div>
                                    </div>
    </td>
  </tr>
</table>


  