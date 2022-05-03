<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Dashboard</a></li>
                </ol>
            </div>
            <div class="row clearfix card hidden">
                <div class="col-sm-6">
                    <div class="form-group">
                        <!-- <span class="input-group-addon">    
                            <i class="material-icons">perm_contact_calendar</i>
                        </span> -->
                        <div class="form-line">
                            <input type="text" name="started" class="datepicker-started form-control" placeholder="Started">
                        </div>
                        <small style="color:red"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <!-- <span class="input-group-addon">    
                            <i class="material-icons">perm_contact_calendar</i>
                        </span> -->
                        <div class="form-line">
                            <input type="text" name="started" class="datepicker-started form-control" placeholder="Started">
                        </div>
                        <small style="color:red"></small>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">APPOINTMENT REQUEST</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">APPROVED APPOINTMENTS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">CANCELLED APPOINTMENTS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix card">
                <canvas id="myChart" style="height: 400px;"></canvas>
            </div>
        </div>
    </section>
</body>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    
    var sidemenu = $('#menu-dashboard').removeClass().addClass('active');
    $('.count-to').countTo();

    $('.datepicker-started').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD - HH:mm',
        clearButton: true,
        shortTime: true
    });

    $('.datepicker-ended').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD - HH:mm',
        clearButton: true,
        shortTime: true
    });

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                    label: "My Second dataset",
                    data: [28, 48, 40, 19, 86, 27, 90],
                    borderColor: 'rgba(233, 30, 99, 0.75)',
                    backgroundColor: 'rgba(233, 30, 99, 0.3)',
                    pointBorderColor: 'rgba(233, 30, 99, 0)',
                    pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                    pointBorderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            maintainAspectRatio: false
        }
    });
});
</script>