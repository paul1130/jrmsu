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

    load_report_2 : function(data){
        var report_table = $('#report-table-2').DataTable();
        report_table.clear().draw();
        for (var i = 0; i < data.programs.length; i++) {
            report_table.row.add([
                i + 1,
                data.programs[i]['title'],
                data.programs[i]['beneficiary'],
                data.programs[i]['beneficiary'],
                data.programs[i]['started'],
                data.programs[i]['ended']
            ]).draw(false);
        }
    },

    load_report_3 : function(data){
        var report_table = $('#report-table-3').DataTable();
        report_table.clear().draw();
        for (var i = 0; i < data.programs.length; i++) {
            report_table.row.add([
                i + 1,
                data.programs[i]['title'],
                data.programs[i]['conducted'],
                data.programs[i]['beneficiary'],
                data.programs[i]['remarks']
            ]).draw(false);
        }
    },

    load_report_4 : function(data){
        var report_table = $('#report-table-4').DataTable();
        report_table.clear().draw();
        for (var i = 0; i < data.programs.length; i++) {
            report_table.row.add([
                i + 1,
                data.programs[i]['title'],
                data.programs[i]['beneficiary'],
                data.programs[i]['numerical_rating'],
                data.programs[i]['descriptive_rating']
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
                reports.load_report_2(data);
                reports.load_report_3(data);
                reports.load_report_4(data);
            } else {
                console.log("fail get report 1");
            }
        });
    }
}