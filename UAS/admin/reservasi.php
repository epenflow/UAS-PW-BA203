<?php
require("../config.php");


if (isset($_POST['btncari'])) {
    $cari       = $_POST['cari'];
    $sql        = "select * from guest where nama_guest like '%" . $cari . "%' or email_guest like '%" . $cari . "%' or telp_guest like '%" . $cari . "%' ";
    $q          = mysqli_query($con, $sql);
} else {
    $cari       = "";
}
$jmlData         = 3;
$sql             = "select * from guest where nama_guest like '%" . $cari . "%' or email_guest like '%" . $cari . "%' or telp_guest like '%" . $cari . "%' ";
$q               = mysqli_query($con, $sql);
$totalData       = mysqli_num_rows($q);
$jmlhPage        = ceil($totalData / $jmlData);



if (isset($_GET['page'])) {
    $aktifPage  = $_GET['page'];
} else {
    $aktifPage  = 1;
}


$dataAwal       = ($aktifPage * $jmlData) - $jmlData;
$jmlLink        = 3;
if ($aktifPage > $jmlLink) {
    $startNo    = $aktifPage - $jmlLink;
} else {
    $startNo    = 1;
}
if ($aktifPage < ($jmlhPage - $jmlLink)) {
    $endNo      = $aktifPage + $jmlLink;
} else {
    $endNo      = $jmlhPage;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reservasi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../node_modules/startbootstrap-simple-sidebar/dist/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


</head>

<body id="body">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Dashboard Admin</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#body">Reservasi</a>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="statistik.php">Statistik Reservasi</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Dashboard Menu</button>
                    <!-- search button -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="cari">
                        <button class="btn btn-outline-primary" type="submit" name="btncari">Search</button>
                    </form>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <!-- pagination -->

                <nav aria-label="Page navigation example" style="margin-top: 5px;">
                    <ul class="pagination">

                        <!-- previus button -->
                        <?php
                        if ($aktifPage <= $jmlhPage) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $aktifPage - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                        <?php
                            if ($aktifPage == 0) {
                                header("Location: reservasi.php");
                            }
                        }
                        ?>
                        <!-- number page -->
                        <?php
                        for ($i = $startNo; $i <= $endNo; $i++) {
                            if ($aktifPage == $i) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $i ?>" style="color: red;"><?= $i ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                        </li>
                        <!-- next button -->
                        <?php
                        if ($aktifPage < $jmlhPage) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $aktifPage + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <!-- table -->
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>No Telp</td>
                            <td>Tgl Reservasi</td>
                            <td>Jumlah</td>
                            <td>Jam Reservasi</td>
                            <td>QR Code</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- output data php -->
                        <?php

                        $sqlperPage      = "select * from guest where nama_guest like '%" . $cari . "%' or email_guest like '%" . $cari . "%' or telp_guest like '%" . $cari . "%' limit $dataAwal,$jmlData;";
                        $q               = mysqli_query($con, $sqlperPage);
                        $no              = 1 + $dataAwal;
                        while ($row        = mysqli_fetch_array($q)) {
                            $namaGuest         = $row['nama_guest'];
                            $emailGuest        = $row['email_guest'];
                            $noTelp            = $row['telp_guest'];
                            $tgl               = $row['tgl_reservasi'];
                            $jmlh              = $row['jml_guest'];
                            $jam               = $row['jam_guest'];
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $namaGuest ?></td>
                                <td><?= $emailGuest ?></td>
                                <td><?= $noTelp ?></td>
                                <td><?= $tgl ?></td>
                                <td><?= $jmlh ?></td>
                                <td><?= $jam ?></td>
                                <td>
                                    <?php
                                    $qrcode                = $namaGuest . "/" . $emailGuest . "/" . $noTelp . "/" . $tgl;
                                    require_once('../lib/phpqrcode/qrlib.php');
                                    QRcode::png("$qrcode", "img/barcode/qrcode" . $namaGuest . ".png", "M", 2, 2);
                                    ?>
                                    <img src="img/barcode/qrcode<?= $namaGuest ?>.png" alt="<?= $namaGuest ?>" style="width: 100px">
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- end table -->

            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../node_modules/startbootstrap-simple-sidebar/dist/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>