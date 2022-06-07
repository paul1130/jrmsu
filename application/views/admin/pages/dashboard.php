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
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Conducted Programs</div>
                            <div class="number count-to" data-from="0" data-to="<?= intval($summary["program"]); ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">APPROVED APPOINTMENTS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">Program Beneficiaries</div>
                            <div class="number count-to" data-from="0" data-to="<?= intval($summary["beneficiary"]); ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix card">
                <div class="header">
                    <h2>
                        Records Graph
                    </h2>
                </div>
                <div class="body">
                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                        <canvas id="myChart" style="height: 400px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="row clearfix card">
                <div class="header">
                    <h2>
                        Accomplishments
                    </h2>
                </div>
                <div class="body">
                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                        <canvas id="myPieChart" style="height: 400px;"></canvas>
                    </div>
                </div>
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

    let years_obj = JSON.parse('<?php echo $years; ?>');
    let years = [];

    years_obj.forEach(year => {
        years.push(year.years)
    });

    
    let courses = JSON.parse('<?php echo $department; ?>');
    let programs_data = JSON.parse('<?php echo $year_data; ?>');
    let ced = [], ccs = [], ccje = [], cbm = [], coa = [];

    years.forEach(year => {
        //ced
        let ced_program = programs_data.filter(program => {
            return program.department == 'CED' && program.year == year;
        });

        let ced_count = ced_program.length > 0 ? ced_program[0].programs : 0;
        ced.push(ced_count);

        //ccs
        let ccs_program = programs_data.filter(program => {
            return program.department == 'CCS' && program.year == year;
        });

        let ccs_count = ccs_program.length > 0 ? ccs_program[0].programs : 0;
        ccs.push(ccs_count);
        
        //ccje
        let ccje_program = programs_data.filter(program => {
            return program.department == 'CCJE' && program.year == year;
        });

        let ccje_count = ccje_program.length > 0 ? ccje_program[0].programs : 0;
        ccje.push(ccje_count);

        //cbm
        let cbm_program = programs_data.filter(program => {
            return program.department == 'CBM' && program.year == year;
        });

        let cbm_count = cbm_program.length > 0 ? cbm_program[0].programs : 0;
        cbm.push(cbm_count);

        // coa
        let coa_program = programs_data.filter(program => {
            return program.department == 'COA' && program.year == year;
        });

        let coa_count = coa_program.length > 0 ? coa_program[0].programs : 0;
        coa.push(coa_count);
    });

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: years,
            datasets: [
                {
                    label: "CED",
                    backgroundColor: "rgb(179, 198, 255, 0.3)",
                    borderColor: "rgb(0, 0, 255)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgb(0, 0, 255)",
                    pointHoverBackgroundColor: "blue",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: ced
                },
                {
                    label: "CCS",
                    borderColor: "rgb(0, 204, 255)",
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgb(0, 204, 255)",
                    pointHoverBackgroundColor: "#687681",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: ccs
                },
                {
                    label: "CCJE",
                    backgroundColor: "rgb(128, 255, 223, 0.3)",
                    borderColor: "rgb(0, 153, 51)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgb(0, 153, 51)",
                    pointHoverBackgroundColor: "#687681",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: ccje
                },
                {
                    label: "CBM",
                    backgroundColor: "rgb(0, 153, 0, 0.3)",
                    borderColor: "rgb(255, 128, 255)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgb(255, 128, 255)",
                    pointHoverBackgroundColor: "#687681",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: cbm
                },
                {
                    label: "COA",
                    backgroundColor: "rgb(255, 26, 26, 0.3)",
                    borderColor: "#9acd32",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "#9acd32",
                    pointHoverBackgroundColor: "#687681",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: coa
                },
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: false,
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label;
                        return label + " : " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        });
                    }
                }
                
            },
        }
    });

    const ctx2 = document.getElementById('myPieChart').getContext('2d');
    const myPieChart = new Chart(ctx2, {
        "type": "pie",
        "data": {
            "labels": [
                    "Red",
                    "Blue",
                    "Yellow"
            ],
            "datasets": [
                {
                    "label":"My First Dataset",
                    "data":[300,50,100],
                    "backgroundColor":[
                        "rgb(255, 99, 132)",
                        "rgb(54, 162, 235)",
                        "rgb(255, 205, 86)"]
                }
            ]
        },
        "options": {
            "responsive": true,
            "maintainAspectRatio": false
        }
    });
});
</script>