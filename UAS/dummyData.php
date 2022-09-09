<?php
include('config.php');


require_once('lib/vendor/autoload.php');

$faker          = Faker\Factory::create('id_ID');
for ($i = 0; $i < 5; $i++) {
    $nama           = $faker->name;
    $email          = $faker->email;
    $tlp            = $faker->phoneNumber;
    $tgl            = $faker->date;

    $x              = mt_rand(1, 5);
    // $tgl            = date($tgl);
    // $tgl            = mt_rand(1, 30);
    // $bln            = mt_rand(1, 12);
    // $thn            = 2022;
    // $fix            = $thn . "-" . $tgl  . "-" . $bln;
    // echo $fix;
    // echo "<br>";

    $sql                   = mysqli_query($con, "SELECT  max(id_guest) as idGuest FROM guest");
    $idData                = mysqli_fetch_array($sql);
    $id                    = $idData['idGuest'];
    $urutanId              = (int) substr($id, 3, 5);
    $urutanId++;
    $hrf                   = "GST";
    $idGuest               = $hrf . sprintf("%03s", $urutanId);



    $sql        = "insert into guest(id_guest, nama_guest, email_guest, telp_guest, tgl_reservasi, jml_guest) values ('$idGuest','$nama', '$email', '$tlp', '$tgl','$x')";
    $q          = mysqli_query($con, $sql);
}
