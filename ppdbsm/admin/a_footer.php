
                </div>
                <!-- /.container-fluid -->
</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Fadli</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php
$sql = "SELECT * FROM datasiswa";
$result5 = $db->prepare($sql);
$result5->execute();
$chart = $result5->fetch();
?>


    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../asset/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/sbadmin/js/sb-admin-2.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>   
<script>
    Highcharts.chart('chartData', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Data Siswa 2022'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!!json_encode($chart)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Siswa berdasarkan sekolah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Siswa{!!json_encode($all)!!}',
        data: {!!json_encode($data)!!},
    }]
});
Highcharts.chart('pieData', {
    title: {
        text: 'Average'
    },
    xAxis: {
        categories: {!!json_encode($chart)!!}
    },
    labels: {
        items: [{
            html: '',
            style: {
                left: '50px',
                top: '18px',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'black'
            }
        }]
    },
    series: [{
        type: 'column',
        // name: {!!json_encode($char)!!},
        data: {!!json_encode($data)!!}
    }, {
        type: 'spline',
        name: 'Average',
        data: {!!json_encode($data)!!},
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }
]
});;
</script>

</body>

</html>