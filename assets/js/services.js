var services_table = $('#services-table').DataTable({
    dom: 'frtip',
    responsive: true,
    order: [[ 1, "asc" ]],
//    buttons: [
//        {
//            extend: 'pdf',
//            title: 'Proofsheet Summary'
//        }
//    ],
    columnDefs: [ 
        {
            orderable: false,
//            className: 'select-checkbox',
            targets:   3
//            width: "3%"
        }
    ],
//    select: {
//        style:    'multi',
//        selector: 'td:first-child'
//    }
});

var services = {
    load_services : function(data){
        var buttons = "";
        var services_table = $('#services-table').DataTable();
        services_table.clear().draw();
        for (var i = 0; i < data.services.length; i++) {
            services_table.row.add([
                data.services[i]['scode'],
                data.services[i]['description'],
                data.services[i]['price'],
                '<button type="button" class="btn btn-sm bg-green waves-effect btn-updt">Update</button> ' +
                '<button type="button" class="btn btn-sm bg-red waves-effect btn-del">Delete</button>'
                
            ]).draw(false);
        }
    },
    
    fetch_services : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/fetch_services",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                services.load_services(data);
            } else {
                console.log("fail get ros census");
            }
        });
    },
    
    add_service : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/add_service",
            data: $("#add-service-form").serialize(),
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                services.load_services(data);
                swal("Success!", "Service added!","success");
                $("#addService").modal("hide");
            } else {
                if (data.error_service != null || data.error_price != null) {
                    if (data.error_service != null) {
                        $("#add-service-form input[name=service]").closest(".form-group").find("small").text(data.error_service);
                    };

                    if (data.error_price != null) {
                        $("#add-service-form input[name=price]").closest(".form-group").find("small").text(data.error_price);
                    };
                    
                }else{
                    if (data.error_exist != null) {
                        $("#add-service-form input[name=service]").closest(".form-group").find("small").text(data.error_exist);
                    }else{
                        $("#add-service-form input[name=service]").closest(".form-group").find("small").text("");
                        $("#add-service-form input[name=price]").closest(".form-group").find("small").text("");
                    }
                }
                
            }
        });
    },
    
    update_service : function(){
        $.ajax({
           type: 'POST',
           url:  BASE_URL + "admin/updt_service",
           data: $("#update-service-form").serialize(),
           dataType: 'json'
       }).done(function(data) {
           console.log(data);
           if (data.status) {
               services.load_services(data);
               swal("Success!","Service Successfully updated","success");
               $("#upService").modal("hide");
           } else {
               if (data.error_service != null) {
                    $("#update-service-form input[name=service]").closest(".form-group").find("small").text(data.error_service);
                }else{
                    if (data.error_exist != null) {
                        $("#update-service-form input[name=service]").closest(".form-group").find("small").text(data.error_exist);
                    }else{
                        $("#update-service-form input[name=service]").closest(".form-group").find("small").text("");
                    }
                }
           }
       });
    },
    
    delete_service : function(data){
        $.ajax({
           type: 'POST',
           url:  BASE_URL + "admin/remove_services",
           data: { code : data[0]},
           dataType: 'json'
       }).done(function(data) {
           console.log(data);
           if (data.status) {
               services.load_services(data);
               swal("Success!","Service Successfully deleted","success");
           } else {
               swal("Failed!","Service deletion failed.","error");
           }
       });
    }
};

$('#services-table').on('click', '.btn-updt', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#services-table').dataTable().fnGetData(current_row);
    $("#update-service-form input[name=scode]").val(data[0]);
    $("#update-service-form input[name=service]").val(data[1]).parent('.form-line').addClass("focused");
    $("#update-service-form input[name=price]").val(data[2]).parent('.form-line').addClass("focused");
    
    swal({
            title: "Update?",
            text: "This will change your service information.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No",
            closeOnConfirm: true
        }, function () {
            $("#upService").modal("show");
    });
});

$('#services-table').on('click', '.btn-del', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#services-table').dataTable().fnGetData(current_row);
    
    swal({
            title: "Delete Service?",
            text: "You cannot undo this process.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            services.delete_service(data);
    });
});


$("#addService").on("hidden.bs.modal", function(){
    $("#add-service-form input[name=service]").closest(".form-group").find("small").text("");
    $("#add-service-form input[name=price]").closest(".form-group").find("small").text("");

    $("#add-service-form input[name=service]").val("");
    $("#add-service-form input[name=price]").val("");
});