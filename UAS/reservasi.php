<?php
require('config.php');
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    @import url(css/root.css);
    @import url(css/navbar-index.css);
    @import url(css/reservasi.css);
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/TextPlugin.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="navbar-container">
      <div class="img-logo">
        <a href="index.php">
          <img src="img/logo.svg" />
        </a>
      </div>
      <div class="text-navbar">
        <a href="index.php">home</a>
      </div>
    </div>


    <div class="main-container">
      <div class="main-background"></div>
      <div class="main-content" style="margin-top: 100px">
        <div class="text-header">
          <h3 class="text-animasi-header">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem.</h3>
          <p class="text-animasi-p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non impedit at illum similique sint voluptatibus molestias cum soluta consequuntur neque.</p>
        </div>
        <div class="body-content">
          <h3>reservation</h3>
          <form action="reservasi.php" method="post">
            <div class="form-control">
              <label for="name">name</label>
              <input type="text" name="nama" id="name" placeholder="Enter your name" required="required" />
            </div>
            <div class="form-control">
              <label for="email">email</label>
              <input type="email" name="email" id="email" placeholder="Enter your email" required="required" />
            </div>
            <div class=" form-control">
              <label for="nohp">phone number</label>
              <input type="text" name="nohp" id="nohp" placeholder="Enter your phone number" required="required" />
            </div>
            <div class=" form-control">
              <label for="tgl">date</label>
              <input type="date" name="tgl_reservasi" id="tgl" value="<?php echo date("Y-F-d"); ?>" required="required">
            </div>
            <div class=" form-control">
              <label>number of guest</label>
              <select name="jml_guest" required="required">
                <option value="" disabled selected hidden>number of guest</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <div class=" form-control">
              <label>time</label>
              <select name="time_guest" required="required">
                <option value="" disabled selected hidden>time</option>
                <option value="08:00 am - 10:00 am">08:00 am - 10:00 am</option>
                <option value="11:00 am - 01:00 am">11:00 am - 01:00 am</option>
              </select>
            </div>
            <div class="form-control">
              <button type=" submit" name="submit" onclick="showConfirmBox()">reservation now</button>
              <script>
              </script>
            </div>
          </form>
        </div>
        <div class=" run-text" style="margin-top: 500px">
          <marquee onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll" direction="left">reservation right now and get discount</marquee>
        </div>
        <div class="run-text" style="margin-top: 600px">
          <marquee onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll" direction="right">reservation right now and get discount</marquee>
        </div>
        <div class="run-text" style="margin-top: 700px">
          <marquee onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll" direction="left">reservation right now and get discount</marquee>
        </div>
        <div class="run-text" style="margin-top: 800px">
          <marquee onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll" direction="right">reservation right now and get discount</marquee>
        </div>
      </div>
    </div>
    <div class="footer-container">
      <div class="text-container-footer">
        <div class="text-footer">
          <a href="index.php">
            <p>rm. pak bagong</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  gsap.registerPlugin(TextPlugin);
  gsap.to(".text-animasi-header", {
    duration: 15,
    text: "We are now accepting reservations and walk in guests.",
  });
  gsap.to(".text-animasi-p", {
    duration: 15,
    text: "We reserve 50% of our dining room for reservations. If your desired time is not available, you can join our waitlist remotely on the day of your visit.",
  });
</script>
<?php

use PHPmailer\PHPmailer\PHPmailer;
use PHPMailer\PHPmailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include('lib/phpmailer/src/Exception.php');
include('lib/phpmailer/src/PHPMailer.php');
include('lib/phpmailer/src/SMTP.php');
// cek post apakah ada data
if (isset($_POST['submit'])) {
  $namaGuest             = $_POST['nama'];
  $emailGuest            = $_POST['email'];
  $telpGuest             = $_POST['nohp'];
  $tglReservasi          = $_POST['tgl_reservasi'];
  $jmlGuest              = $_POST['jml_guest'];
  $jamGuest              = $_POST['time_guest'];
  // make id
  $sql                   = mysqli_query($con, "SELECT  max(id_guest) as idGuest FROM guest");
  $idData                = mysqli_fetch_array($sql);
  $id                    = $idData['idGuest'];
  $urutanId              = (int) substr($id, 3, 3);
  $urutanId++;
  $hrf                   = "GST";
  $idGuest               = $hrf . sprintf("%03s", $urutanId);

  if ($namaGuest && $emailGuest && $telpGuest && $tglReservasi && $jmlGuest) {
    $sql                   = "insert into guest
    (id_guest,nama_guest, email_guest, telp_guest, tgl_reservasi, jml_guest, jam_guest)
    values
    ('$idGuest','$namaGuest', '$emailGuest', '$telpGuest', '$tglReservasi', $jmlGuest, '$jamGuest')";
    $q                     = mysqli_query($con, $sql);
    if ($q) {
      $to                  = "$emailGuest";
      $subject             = "Reservasi di RM. PAK BAGONG";
      $pesan               = "Terima kasih sudah reservasi di RM. PAK BAGONG." .  "<br>" . "Pada tanggal : " . $tglReservasi;
      $emailPengirim       = "rmpakbagong@gmail.com";
      $namaPengirim        = "RM. Pak Bagong";

      $mail                = new PHPmailer;
      $mail->isSMTP();
      $mail->Host          = 'smtp.gmail.com';
      $mail->Username      = $emailPengirim;
      $mail->Password      = 'qidvnxzaslptjusa';
      $mail->Port          = 465;
      $mail->SMTPAuth      = true;
      $mail->SMTPSecure    = 'ssl';

      $mail->setFrom($emailPengirim, $namaPengirim);
      $mail->addAddress($emailGuest);
      $mail->isHTML(true);
      $mail->Subject       = $subject;
      $mail->Body          = $pesan;

      $send                = $mail->send();
      if ($send) {
        echo "
        <script>
        confirm('Thank for your Reservation : " . $namaGuest . "');
        </script>";
      } else {
        echo "
        <script>
        confirm('Data masuk ke sistem tapi email gagal dikirim : " . $namaGuest . "');
        </script>";
      }
    }
  }
} else {
  $error;
}
?>

</html>