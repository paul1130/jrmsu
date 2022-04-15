var time = Array("0","10 am - 11 am","11 am - 12 pm","1 pm - 2 pm","2 pm - 3 pm","3 pm - 4 pm","4 pm - 5 pm", "5 pm - 6 pm");
var med_table = $('#pat-medicine-table').DataTable({dom : "ftip"});
var ser_table = $('#pat-service-table').DataTable({dom : "ftip"});
var appointment = {
    
	load_apps : function(data){
		$('#appointment-table').dataTable().fnDestroy();
        var app_table = $('#appointment-table').DataTable({dom : "ftip"});
        app_table.clear().draw();

        $('#approved-appointment-table').dataTable().fnDestroy();
        var approved_app_table = $('#approved-appointment-table').DataTable({
            dom : "ftip"
        });
        approved_app_table.clear().draw();

        $('#done-appointment-table').dataTable().fnDestroy();
        var done_app_table = $('#done-appointment-table').DataTable({dom : "ftip"});
        done_app_table.clear().draw();

        for (var i = 0; i < data.appointments.length; i++) {
        	if (parseInt(data.appointments[i]['status']) == 1)  {
        		approved_app_table.row.add([
	                data.appointments[i]['appointment_no'],
	                data.appointments[i]['name'],
	                data.appointments[i]['contact_no'],
	                data.appointments[i]['appointmentdate'],
	                time[data.appointments[i]['queue']],
	                '<button type="button" class="btn btn-sm bg-green waves-effect btn-proccess">Process</button> ' +
	                // '<button type="button" class="btn btn-sm bg-orange waves-effect btn-del">Move</button> ' +
	                '<button type="button" class="btn btn-sm bg-red waves-effect btn-cancel">Cancel</button>'
	                
	            ]).draw(false);
        	}else if(parseInt(data.appointments[i]['status']) == 2 || parseInt(data.appointments[i]['status']) == 0){
        		var btn = "";
        		if (parseInt(data.appointments[i]['status']) == 0) {
        			btn += '<span style="color:red">Cancelled</span> ';
                                btn += '<button type="button" class="btn btn-sm bg-red waves-effect btn-delete">Delete</button>';
        		}else{
        			btn += '<button type="button" class="btn btn-sm bg-green waves-effect btn-approve">Approve</button> ' +
	                '<button type="button" class="btn btn-sm bg-red waves-effect btn-cancel">Cancel</button> ' 
        		}

        		app_table.row.add([
	                data.appointments[i]['appointment_no'],
	                data.appointments[i]['name'],
	                data.appointments[i]['contact_no'],
	                data.appointments[i]['appointmentdate'],
	                time[data.appointments[i]['queue']],
	                btn
	                
	            ]).draw(false);
        	}
            
        }
    },

    fetch_apps : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/fetch_appointments",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                appointment.load_apps(data);
            } else {
                console.log("fail fetch appointments");
            }
        });
    },

    approve_app : function(code){
    	// console.log(code);
    	$.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/approve_app/" + code,
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                
                appointment.load_apps(data);
                swal.close();
            } else {
                if (data.not_available) {
                    appointment.load_apps(data);
                    swal("Sorry!","This appointment time is already taken.","error");
                }
//                console.log("fail approve appointment");
            }
        });
    },

    cancel_app : function(code){
    	$.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/cancel_app/" + code,
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                appointment.load_apps(data);
                swal.close();
            } else {
                console.log("fail canel appointment");
            }
        });
    },
    
    del_app : function(code){
    	$.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/delete_app/" + code,
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                appointment.load_apps(data);
                swal.close();
            } else {
                console.log("fail delete appointment");
            }
        });
    },

    process_app : function(){
        $('#pat-medicine-table').dataTable().fnDestroy();
        med_table = $('#pat-medicine-table').DataTable({dom : "ftip"});
        med_table.clear().draw();

        $('#pat-service-table').dataTable().fnDestroy();
        ser_table = $('#pat-service-table').DataTable({dom : "ftip"});
        ser_table.clear().draw();
    	$("#proccessApp").modal("show");
    },

    get_medicines : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/fetch_medicines",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {

                var html = "";
                for (var i = 0; i < data.medicines.length; i++) {
                    html += "<option value='"+data.medicines[i]["mcode"]+"'>"+data.medicines[i]["description"]+"</option>";
                };
                $("#medicine-codes").empty().html(html);
                $("#medicine-codes").selectpicker("destroy");
                $("#medicine-codes").selectpicker("refresh");
            } else {
                console.log("fail generate medecine dropdown");
            }
        });
    },

    add_med : function(){


        var code = $("#pres-form select[name=code]").val();
        var desc = $("#pres-form select[name=code]").find("option:selected").text();
        var dose = $("#pres-form input[name=dose]").val();
        var qty = $("#pres-form input[name=qty]").val();
        var price = 0.0;
        var remarks = $("#pres-form textarea[name=remark]").val();
        var btn = '<button type="button" class="btn btn-sm bg-red waves-effect btn-remove-med">Remove</button>';

        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/get_price/"+ code,
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                price = parseFloat(data.med.price);

                med_table.row.add([
                    code,
                    desc,
                    dose,
                    parseInt(qty),
                    parseFloat(price),
                    remarks,
                    btn
                    
                ]).draw(false);

            } else {
                console.log("fail getting price");
            }
        });
    },

    get_services : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/fetch_services",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {

                var html = "";
                for (var i = 0; i < data.services.length; i++) {
                    html += "<option value='"+data.services[i]["scode"]+"'>"+data.services[i]["description"]+"</option>";
                };
                $("#service-codes").empty().html(html);
                $("#service-codes").selectpicker("destroy");
                $("#service-codes").selectpicker("refresh");
            } else {
                console.log("fail generate services dropdown");
            }
        });
    },

    add_ser : function(){


        var code = $("#bill-form select[name=code]").val();
        var desc = $("#bill-form select[name=code]").find("option:selected").text();
        var type = $("#bill-form input[name=type]").val();
        var price = 0.0;
        var btn = '<button type="button" class="btn btn-sm bg-red waves-effect btn-remove-ser">Remove</button>';

        
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/get_ser_price/"+ code,
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                price = parseFloat(data.ser.price);

                ser_table.row.add([
                    code,
                    desc,
                    type,
                    price,
                    btn
                    
                ]).draw(false);

            } else {
                console.log("fail getting price");
            }
        });
    },

    proccess_pat : function(){

        var meds = med_table.rows().data();
        var sers = ser_table.rows().data();
        var totalMedBill = 0.0;
        var totalSerBill = 0.0;

        var myMeds = Array();
        var mySers = Array();

        for(var i = 0; i < meds.length; i++)
        {
            myMeds.push(meds[i]);
            totalMedBill += (meds[i][3] * meds[i][4]);
        }

        for(var i = 0; i < sers.length; i++)
        {
            mySers.push(sers[i]);
            totalSerBill += parseFloat(sers[i][3]);
        }

        var myBill = totalMedBill + totalSerBill;
        var prepBy = $("#consult-form input[name=prepare]").val();
        var examBy = $("#consult-form input[name=examine]").val();
        var type = $("#bill-form input[name=type]").val();
        var codex = $("#pres-form input[name=code").val();


        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/proccess_pat",
            data: {med : myMeds, ser : mySers, bill : myBill, pr : prepBy, ex : examBy, code : codex },
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                appointment.load_apps(data);
                $("#proccessApp").modal("hide");
                swal("Success","Patient transaction successfully done.");
            } else {
                console.log("fail proccess patient");
            }
        });
    }
}


$('#appointment-table').on('click', '.btn-approve', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#appointment-table').dataTable().fnGetData(current_row);
    
    swal({
            title: "Approve Request?",
            text: "This data will be transfered to approved table.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "green",
            confirmButtonText: "Yes, approve it!",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            appointment.approve_app(data[0]);
    });
});

$('#appointment-table').on('click', '.btn-delete', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#appointment-table').dataTable().fnGetData(current_row);
    appointment.del_app(data[0]);
});

$('#appointment-table').on('click', '.btn-cancel', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#appointment-table').dataTable().fnGetData(current_row);
    
    swal({
            title: "Cancel Request?",
            text: "You cannot undo this process.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "red",
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            appointment.cancel_app(data[0]);
    });
});


$('#approved-appointment-table').on('click', '.btn-cancel', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#approved-appointment-table').dataTable().fnGetData(current_row);
    
    swal({
            title: "Cancel appointment?",
            text: "You cannot undo this process.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "red",
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            appointment.cancel_app(data[0]);
    });
});

$('#approved-appointment-table').on('click', '.btn-proccess', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#approved-appointment-table').dataTable().fnGetData(current_row);

    $("#pres-form input[name=code]").val(data[0]);
    
    $(".patient-name h2").empty().html(data[1]);


    appointment.process_app();
});

$('#pat-medicine-table').on('click', '.btn-remove-med', function () {
    var current_row = $(this).parents('tr').get(0);//Get the current row
    var table = $('#pat-medicine-table').dataTable();
    var data = $('#pat-medicine-table').dataTable().fnGetPosition(current_row);

        table.fnDeleteRow(data);
});

$('#pat-service-table').on('click', '.btn-remove-ser', function () {
    var current_row = $(this).parents('tr').get(0);//Get the current row
    var table = $('#pat-service-table').dataTable();
    var data = $('#pat-service-table').dataTable().fnGetPosition(current_row);

        table.fnDeleteRow(data);
});


// $("#proccessApp").on("hidden.bs.modal", function(){
//     $("#add-service-form input[name=service]").closest(".form-group").find("small").text("");
//     $("#add-service-form input[name=price]").closest(".form-group").find("small").text("");

//     $("#add-service-form input[name=service]").val("");
//     $("#add-service-form input[name=price]").val("");
// });

