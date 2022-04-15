var time = Array("10 am - 11 am","11 am - 12 pm","1 pm - 2 pm","2 pm - 3 pm","3 pm - 4 pm","4 pm - 5 pm", "5 pm - 6 pm");
var his = {
	get_pat : function(){
		$.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/fetch_patients",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                his.load_pat_rec(data);
            } else {
                console.log("fail fetch appointments");
            }
        });
	},

	load_pat_rec : function(data){
		$('#pat-table').dataTable().fnDestroy();
        var my_table = $('#pat-table').DataTable({
            dom : "Bftip",
            buttons: [
                {
                    extend : 'print', 
                    orientation: 'portrait',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                    
                }
            ]
        });
        my_table.clear().draw();

        for (var i = 0; i < data.pats.length; i++) {
        		my_table.row.add([
	                data.pats[i]['appointment_no'],
	                data.pats[i]['name'],
	                data.pats[i]['contact_no'],
                    data.pats[i]['bill'],
	                data.pats[i]['appointmentdate'],
	                time[data.pats[i]['queue']],
	                '<button type="button" class="btn btn-sm bg-blue waves-effect btn-details">Details</button> ' 
	                
	            ]).draw(false);
    	}
	},

    get_pat_details : function(xdata){

        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/fetch_pat_details/" + xdata[0],
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                $("#pat-name").empty().text(xdata[1]);
                $("#pat-contact").empty().text(xdata[2]);
                $("#pat-date").empty().text(xdata[4]);
                $("#pat-time").empty().text(xdata[5]);
                $("#pat-bill").empty().text(xdata[3]);
                $("#pat-bday").empty().text(xdata[3]);

                $('#pat-meds-table').dataTable().fnDestroy();
                var my_table = $('#pat-meds-table').DataTable({dom : "t"});
                my_table.clear().draw();

                for (var i = 0; i < data.meds.length; i++) {
                        my_table.row.add([
                            data.meds[i]['description'],
                            data.meds[i]['dose'],
                            data.meds[i]['quantity']
                            
                        ]).draw(false);
                }

                $('#pat-sers-table').dataTable().fnDestroy();
                var my_table2 = $('#pat-sers-table').DataTable({dom : "t"});
                my_table2.clear().draw();

                for (var i = 0; i < data.sers.length; i++) {
                        my_table2.row.add([
                            data.sers[i]['description']
                            
                        ]).draw(false);
                }

                $('#patDetails').modal("show");
            } else {
                console.log("fail fetch appointments");
            }
        });
    }
};


$('#pat-table').on('click', '.btn-details', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#pat-table').dataTable().fnGetData(current_row);

    his.get_pat_details(data);
});
