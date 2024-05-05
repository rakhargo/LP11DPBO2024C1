<!-- /*Saya Rakha Dhifiargo Hariadi
 NIM 2209489 mengerjakan soal 
 Latihan praktikum 11 dalam mata
 kuliah DPBO
 untuk keberkahanNya maka saya tidak
 melakukan kecurangan seperti 
 yang telah dispesifikasikan. Aamiin.*/ -->
<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
// include("model/Pasien.class.php");
// include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$tp = new TampilPasien();
if (isset($_GET['id_hapus'])) {
    $data = $tp->tampil($_GET);
}
$data = $tp->tampil($_POST);