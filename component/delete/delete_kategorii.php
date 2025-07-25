<?php
include "../../configuration/config_connect.php";
include "../../configuration/config_session.php";
include "../../configuration/config_chmod.php";
include "../../configuration/config_etc.php";
$forward =$_GET['forward'];
$no = $_GET['no'];
$chmod = 5;
$forwardpage = $_GET['forwardpage'];
$id = $_GET['id'];
mysqli_query($config_connect,"DELETE FROM user Where id = $id");

if (
    mysqli_affected_rows($config_connect) > 0 )
{
    echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = '../u_kate.php';
        </script>";
    
}

else {
    echo "<script> 
        alert('Data dihapus');
        document.location.href = '../u_expense.php';
        </script>"
        }
?>
<link href="../../assets/libs/spinkit/spinkit.css" rel="stylesheet" type="text/css" >

