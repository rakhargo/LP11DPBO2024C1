<?php

include("model/Template.class.php");
include("model/DB.class.php");
// include("model/Pasien.class.php");
// include("model/TabelPasien.class.php");
include("view/TampilFormPasien.php");


$tp = new TampilFormPasien();
$data = $tp->tampil($_POST);
