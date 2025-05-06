<?php


include "config_connect.php";

// Load plugin PHPSpreadsheet nya
require '../assets/vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$t=$_GET['t'];
$c=$_GET['c'];

    
//style header table
$style_col = [
    'font' => ['bold' => true], // Set font nya jadi bold
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];


// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = [
    'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];



 
 $sql1=mysqli_query($conn,"SELECT * FROM jenis_bayar WHERE period_id='$t' AND jenis_pembayaran='bulanan'");



$sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT kelas FROM class WHERE no='$c'"));

/* Create new object*/
$spreadsheet = new Spreadsheet();

$actsheet=0;
while($row=mysqli_fetch_assoc($sql1)){
//-------------------------------------------------------------------------------------------//
$j=$row['jenis_id'];
$jname=$row['nama'];

$ta=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM jenis_bayar WHERE period_id='$t' AND jenis_pembayaran='bulanan'"));
/* Create a first sheet, representing sales data*/
$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(''.$actsheet++.'');

$spreadsheet->getActiveSheet()->setCellValue('A1', "Data Pembayaran ".$jname." T.A ".$ta['tahunajar']." "); // Nama Kolom A1
$spreadsheet->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai F1
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center'); // Set text ditengah



$spreadsheet->getActiveSheet()->setCellValue('A3', 'NO');
$spreadsheet->getActiveSheet()->setCellValue('B3', 'Kelas');
$spreadsheet->getActiveSheet()->setCellValue('C3', 'NIS');
$spreadsheet->getActiveSheet()->setCellValue('D3', 'NAMA');

$i="E";
$sql=mysqli_query($conn,"SELECT * FROM months");
while($bulan=mysqli_fetch_assoc($sql)){
    
    $spreadsheet->getActiveSheet()->setCellValue(''.$i.'3', $bulan['month_name']);
$i++;
}



$i=4;
$nom=1;
$sql2=mysqli_query($conn,"SELECT * FROM student WHERE kelas_id='$c'");
while($row = mysqli_fetch_array($sql2)) {
    
    $name=$row['nama'];
    $nis=$row['nis'];
    $kelas=$sql4['kelas'];
    $s=$row['student_id'];

    $spreadsheet->getActiveSheet()->setCellValue("A$i",$nom++);
    $spreadsheet->getActiveSheet()->setCellValue("B$i",$kelas);
    $spreadsheet->getActiveSheet()->setCellValue("C$i",$nis);
    $spreadsheet->getActiveSheet()->setCellValue("D$i",$name);



$m="E";
$sql=mysqli_query($conn,"SELECT * FROM months");
while($bulan=mysqli_fetch_assoc($sql)){

    $b=$bulan['month_id'];

    $sql5=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bulanan WHERE period_id='$t' AND student_id='$s' AND jenis_id='$j' AND month_id='$b'"));
    
    $spreadsheet->getActiveSheet()->setCellValue(''.$m.''.$i.'', $sql5['bulanan_status']);

    
    if($sql5['bulanan_status']=='belum'){
    $spreadsheet->getActiveSheet()->getStyle(''.$m.''.$i.'')->applyFromArray($style_col);
}



$m++;
}




$i++;
}

/*Rename sheet*/
$spreadsheet->getActiveSheet()->setTitle(''.$jname.'');


//---------------------------------------------------------------------------------------//
}




// Set orientasi kertas jadi LANDSCAPE
//$spreadsheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

$namadokumen="laporan";
// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data_'.$namadokumen.'.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>
