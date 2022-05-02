var reports = {
    load_report_1 : function(data){
        var report_table = $('#report-table-1').DataTable();
        report_table.clear().draw();
        for (var i = 0; i < data.programs.length; i++) {
            report_table.row.add([
                i + 1,
                data.programs[i]['title'],
                data.programs[i]['partner'],
                data.programs[i]['beneficiary'],
                data.programs[i]['implementor'],
                data.programs[i]['remarks'],
                data.programs[i]['moa_status']
            ]).draw(false);
        }
    },
    
    fetch_reports : function(){
        $.ajax({
            type: 'GET',
            url:  BASE_URL + "report/programs",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            if (data.status) {
                reports.load_report_1(data);
            } else {
                console.log("fail get report 1");
            }
        });
    }
}