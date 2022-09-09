<?php

$host                 = "localhost";
$server               = "resto";
$user                 = "root";
$pass                 = "";

$con                  = mysqli_connect($host, $user, $pass, $server);
if (!$con) {
    die('error koneksi database') . mysqli_error($con('error'));
}
$sukses               = "";
$error                = "";
