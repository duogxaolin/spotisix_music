<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once('includes/head.php');
require_once('includes/nav.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="row">
            <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Lượt nghe ngày <?= date("d-m-Y", time()) ?></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <?php
                        $count = $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) 
                                    AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())");
                        $count_un = $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) 
                                    AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) AND `ListenerID` IS NULL");
                        $unf = $count_un / $count * 100;
                        ?>

                        <!-- /.card-body -->
                    </div>
                    <!-- 
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Thống kê lượt nghe hôm nay</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                       
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong><?= date("d-m-Y", time()) ?></strong>
                                    </p>
                                    <?php
                                    $count = $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) 
                                    AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())");
                                    $count_un = $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) 
                                    AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) AND `ListenerID` IS NULL");
                                    $unf = $count_un / $count * 100;
                                    ?>
                                    <div class="progress-group">
                                        Tổng lượt nghe hôm nay
                                        <span class="float-right"><b><?= $count ?></b>/<?= $count ?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                                        </div>
                                    </div>
                                   
                                    <div class="progress-group">
                                       Lượt nghe từ người dùng chưa đăng nhập
                                        <span class="float-right"><b><?= $count_un ?></b>/<?= $count ?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: <?= $unf ?>%"></div>
                                        </div>
                                    </div>

                                  
                                    <div class="progress-group">
                                        <span class="progress-text">Lượt nghe từ người dùng đã đăng nhập</span>
                                        <span class="float-right"><b><?= $count - $count_un ?></b>/<?= $count ?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: <?= 100 - $unf ?>%"></div>
                                        </div>
                                    </div>
                                   
                                </div>
                             
                            </div>
                            <!-- /.row -->
                            </div>


                            <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Lượt nghe Tháng <?= date("m-Y", time()) ?></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChartt" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <?php
                        $countt = $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())");
                        $countt_un = $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE   MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) AND `ListenerID` IS NULL");
                        $unf = $count_un / $count * 100;
                        ?>

                        <!-- /.card-body -->
                    </div>
                   
                            </div>
                            </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">

                                <h5 class="description-header"><?= $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) 
                                    AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())"); ?></h5>
                                <span class="description-text">Tuần này</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">

                                <h5 class="description-header"><?= $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                                    AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())"); ?></h5>
                                <span class="description-text">Tháng <?= date("m", time()) ?></span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">

                                <h5 class="description-header"><?= $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE  YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())"); ?></h5>
                                <span class="description-text">Năm <?= date("Y", time()) ?></span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">

                                <h5 class="description-header"><?= $duogxaolin->num_rows("SELECT * FROM `playcount` "); ?></h5>
                                <span class="description-text">Tổng</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div> 
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
</div>
</section>
</div>
<?php
require_once('includes/foot.php');
?>
<script>
    $(function() {
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Đăng nhập',
                'Không đăng nhập'
            ],
            datasets: [{
                data: [<?= $count - $count_un ?>, <?= $count_un ?>],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    });

    $(function() {
        var donutChartCanvast = $('#donutChartt').get(0).getContext('2d')
        var donutDatat = {
            labels: [
                'Đăng nhập',
                'Không đăng nhập'
            ],
            datasets: [{
                data: [<?= $countt - $countt_un ?>, <?= $countt_un ?>],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var donutOptionst = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvast, {
            type: 'doughnut',
            data: donutDatat,
            options: donutOptionst
        })
    });
</script>