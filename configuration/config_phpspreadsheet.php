<?php
// Load file koneksi.php
include "config_connect.php";



$forward=$_GET['forward'];

// Load file autoload.php
require '../assets/vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
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



//Start Perulangan

if($forward=='report_bebas'){
$t=$_GET['t'];
$j=$_GET['j'];

$sql1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM jenis_bayar WHERE jenis_id='$j'"));
$c=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM periode WHERE no='$t'"));

$str1=$sql1['nama'];
$str2=$c['period_name'];

$namadokumen='Pembayaran ' .''. $str1 .''. $str2 ;




$sheet->setCellValue('A1', "Pembayaran ".$str1." Tahun Ajaran ".$str2." "); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
$sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$sheet->getStyle('A1')->getAlignment()->setHorizontal('center'); // Set text ditengah

// Buat header tabel nya pada baris ke 3
$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$sheet->setCellValue('B3', "KELAS"); // Set kolom B3 dengan tulisan "NIS"
$sheet->setCellValue('C3', "NIS"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('D3', "NAMA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$sheet->setCellValue('E3', "Sudah Dibayar"); // Set kolom E3 dengan tulisan "TELEPON"
$sheet->setCellValue('F3', "SISA"); // Set kolom F3 dengan tulisan "ALAMAT"
$sheet->setCellValue('G3', "STATUS"); // Set kolom F3 dengan tulisan "ALAMAT"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A3')->applyFromArray($style_col);
$sheet->getStyle('B3')->applyFromArray($style_col);
$sheet->getStyle('C3')->applyFromArray($style_col);
$sheet->getStyle('D3')->applyFromArray($style_col);
$sheet->getStyle('E3')->applyFromArray($style_col);
$sheet->getStyle('F3')->applyFromArray($style_col);
$sheet->getStyle('G3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
$sheet->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data
 $sql=mysqli_query($conn,"SELECT * from student order by kelas_id");


//$sql = $pdo->prepare("SELECT * FROM tabel");
//$sql->execute(); // Eksekusi querynya

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$row = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $sheet->setCellValue('A' . $row, $no);

$k= $data['kelas_id'];
$a=mysqli_fetch_assoc(mysqli_query($conn,"SELECT kelas FROM class WHERE no='$k'"));

    $sheet->setCellValue('B' . $row, $a['kelas']);
    $sheet->setCellValue('C' . $row, $data['nis']);
    $sheet->setCellValue('D' . $row, $data['nama']);


    $s=$data['student_id'];
    $sql2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bebasan WHERE period_id='$t' AND jenis_id='$j' AND student_id='$s'"));
    $sudah=$sql2['sudahbayar'];
    $belum=$sql2['bill'];
    $selisih=$belum-$sudah;

    if($belum==0){
        $status="";
    } else if($selisih==$belum){
        $status="BELUM DIBAYAR";
    } else if($selisih<=0){
        $status="LUNAS";
        $selisih=0;
    } else if(($selisih>0)&&($selisih<$belum)){
        $status="DICICIL";
    }


    // Khusus untuk no telepon. kita set type kolom nya jadi STRING
    $sheet->setCellValue('E' . $row, $sudah);
      //  \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $sheet->setCellValue('F' . $row, $selisih);
    $sheet->setCellValue('G' . $row, $status);

    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $sheet->getStyle('A' . $row)->applyFromArray($style_row);
    $sheet->getStyle('B' . $row)->applyFromArray($style_row);
    $sheet->getStyle('C' . $row)->applyFromArray($style_row);
    $sheet->getStyle('D' . $row)->applyFromArray($style_row);
    $sheet->getStyle('E' . $row)->applyFromArray($style_row);
    $sheet->getStyle('F' . $row)->applyFromArray($style_row);
    $sheet->getStyle('G' . $row)->applyFromArray($style_row);


    $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom No
    $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT); // Set text left untuk kolom NIS

    $sheet->getRowDimension($row)->setRowHeight(20); // Set height tiap row

    $no++; // Tambah 1 setiap kali looping
    $row++; // Tambah 1 setiap kali looping
}

// Set width kolom
$sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
$sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
$sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom F
$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom G


}
//End Perulangan





//Start Perulangan 2
if($forward=='report_trx'){
$start=$_GET['start'];
$end=$_GET['end'];
$tipe=$_GET['tipe'];

$namadokumen='Daftar Transaksi' ;




$sheet->setCellValue('A1', "Daftar Transaksi ".$start." Tahun Ajaran ".$end." "); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
$sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$sheet->getStyle('A1')->getAlignment()->setHorizontal('center'); // Set text ditengah

// Buat header tabel nya pada baris ke 3
$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$sheet->setCellValue('B3', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
$sheet->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('D3', "TIPE"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$sheet->setCellValue('E3', "JUMLAH"); // Set kolom E3 dengan tulisan "TELEPON"
$sheet->setCellValue('F3', "OLEH"); // Set kolom F3 dengan tulisan "ALAMAT"


// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A3')->applyFromArray($style_col);
$sheet->getStyle('B3')->applyFromArray($style_col);
$sheet->getStyle('C3')->applyFromArray($style_col);
$sheet->getStyle('D3')->applyFromArray($style_col);
$sheet->getStyle('E3')->applyFromArray($style_col);
$sheet->getStyle('F3')->applyFromArray($style_col);


// Set height baris ke 1, 2 dan 3
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
$sheet->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data
if( $tipe=='all' ){
$sql = mysqli_query($conn, "SELECT * FROM uang_masuk_keluar WHERE tgl_input BETWEEN '" . $start . "' AND  '" . $end ."'");
} else if ($tipe=='inc'){
$sql = mysqli_query($conn, "SELECT * FROM uang_masuk_keluar WHERE tipe !='out' AND tgl_input BETWEEN '" . $start . "' AND  '" . $end ."'");
} else if($tipe=='exp') {
    $sql = mysqli_query($conn, "SELECT * FROM uang_masuk_keluar WHERE tipe='out' AND tgl_input BETWEEN '" . $start . "' AND  '" . $end ."'");
}

$in="PEMASUKAN";
$out="PENGELUARAN";

//$sql = $pdo->prepare("SELECT * FROM tabel");
//$sql->execute(); // Eksekusi querynya

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$row = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $sheet->setCellValue('A' . $row, $no);

    $sheet->setCellValue('B' . $row, $data['tgl_update']);
    $sheet->setCellValue('C' . $row, $data['nama']);

if($data['tipe']=='out'){    
    $sheet->setCellValue('D' . $row, $out);

} else {
  $sheet->setCellValue('D' . $row, $in);

}

    $sheet->setCellValue('E' . $row, $data['jumlah']);
 

    $sheet->setCellValue('F' . $row, $data['kasir']);
    

    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $sheet->getStyle('A' . $row)->applyFromArray($style_row);
    $sheet->getStyle('B' . $row)->applyFromArray($style_row);
    $sheet->getStyle('C' . $row)->applyFromArray($style_row);
    $sheet->getStyle('D' . $row)->applyFromArray($style_row);
    $sheet->getStyle('E' . $row)->applyFromArray($style_row);
    $sheet->getStyle('F' . $row)->applyFromArray($style_row);



    $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom No
    $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT); // Set text left untuk kolom NIS

    $sheet->getRowDimension($row)->setRowHeight(20); // Set height tiap row

    $no++; // Tambah 1 setiap kali looping
    $row++; // Tambah 1 setiap kali looping
}

// Set width kolom
$sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
$sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
$sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom F



}
//End Perulangan






// Set orientasi kertas jadi LANDSCAPE
$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file worksheet nya
$sheet->setTitle("Data");

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data_'.$namadokumen.'.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>