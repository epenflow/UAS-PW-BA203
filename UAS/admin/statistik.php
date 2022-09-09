<?php
require("../config.php");

$sql         = mysqli_query($con, "SELECT * FROM guest");
$sql1        = mysqli_query($con, "
                                SELECT tgl_reservasi, jml_guest, SUM(jml_guest) AS total
                                FROM guest
                                GROUP BY tgl_reservasi");
while ($rowX     = mysqli_fetch_assoc($sql)) {
    $tglX[]      = $rowX['tgl_reservasi'];
    $jmlX[]        = $rowX['jml_guest'];
    $idX[]          = $rowX['id_guest'];
}
while ($rowY     = mysqli_fetch_assoc($sql1)) {
    $jmlY[]      = $rowY['total'];
    $jml         = array_sum($jmlY);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Statistik Reservasi</title>
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="reservasi.php">Reservasi</a>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#body">Statistik Reservasi</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Dashboard Menu</button>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <!-- pagination -->
                <div class="card" style="width: 18rem; margin-bottom: 4px;">
                    <div class="card-header">
                        Total Reservasi
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $jml ?></li>
                    </ul>
                </div>
                <div class="chartCard">
                    <div class="chartBox">
                        <input type="date" onchange="startDateFilter(this)" value="2022-09-01" min="2022-09-01" max="2022-09-30">
                        <input type="date" onchange="endDateFilter(this)" value="2022-09-01" min="2022-09-01" max="2022-09-30">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../node_modules/startbootstrap-simple-sidebar/dist/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


    <!-- chart js -->

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script>
        const dataTgl = <?php echo json_encode($tglX); ?>;

        const tglChart = dataTgl.map((hari, index) => {
            let hariJS = new Date(hari);
            return hariJS.setHours(0, 0, 0, 0)
        });
        const labels = tglChart;

        const data = {
            labels: labels,
            datasets: [{
                label: 'Jml Reservasi',
                backgroundColor: ['rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: ['rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                data: <?= json_encode($jmlX); ?>,
                yAxisID: 'percentage'
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        type: 'linear',
                        min: 0,
                        max: 100
                    },
                    x: {
                        min: '2022-09-01',
                        max: '2022-09-30',
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    }
                }
            },
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        function startDateFilter(date) {
            const startDate = new Date(date.value);
            console.log(startDate.setHours(0, 0, 0, 0));
            myChart.config.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
            myChart.update;
        }

        function endDateFilter(date) {
            const endDate = new Date(date.value);
            console.log(endDate.setHours(0, 0, 0, 0));
            myChart.config.options.scales.x.min = endDate.setHours(0, 0, 0, 0);
            myChart.update;
        }
    </script>
</body>

</html>