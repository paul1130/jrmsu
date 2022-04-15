var medicines_table = $('#medicines-table').DataTable({
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

var medicines = {
    load_medicines : function(data){
        var medicines_table = $('#medicines-table').DataTable();
        medicines_table.clear().draw();
        for (var i = 0; i < data.medicines.length; i++) {
            medicines_table.row.add([
                data.medicines[i]['mcode'],
                data.medicines[i]['description'],
                data.medicines[i]['price'], 
                '<button type="button" class="btn btn-sm bg-green waves-effect btn-updt">Update</button> ' +
                '<button type="button" class="btn btn-sm bg-red waves-effect btn-del">Delete</button>'
                
            ]).draw(false);
        }
    },
    
    fetch_medicines : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/fetch_medicines",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                medicines.load_medicines(data);
            } else {
                console.log("fail get ros census");
            }
        });
    },
    
    add_medicine : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/add_medicine",
            data: $("#add-medicine-form").serialize(),
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                medicines.load_medicines(data);
                swal("Success!","New medicine added","success");
                $("#addMedicine").modal("hide");
            } else {
                if (data.error_desc != null) {
                    $("#add-medicine-form input[name=description]").closest(".form-group").find("small").text(data.error_desc);
                }else{
                    if (data.error_exist != null) {
                        $("#add-medicine-form input[name=description]").closest(".form-group").find("small").text(data.error_exist);
                    }else{
                        $("#add-medicine-form input[name=description]").closest(".form-group").find("small").text("");
                    }
                }
                
                if (data.error_price != null) {
                    $("#add-medicine-form input[name=price]").closest(".form-group").find("small").text(data.error_price);
                }else{
                    $("#add-medicine-form input[name=price]").closest(".form-group").find("small").text("");
                }
                
            }
        });
    },
    
    update_medicine : function(){
//        alert("asdfasd");
        $.ajax({
           type: 'POST',
           url:  BASE_URL + "admin/updt_medicine",
           data: $("#update-medicine-form").serialize(),
           dataType: 'json'
       }).done(function(data) {
           console.log(data);
           if (data.status) {
               medicines.load_medicines(data);
               swal("Success!","Medicine updated","success");
               $("#upMedicine").modal("hide");
           } else {
               if (data.error_desc != null) {
                    $("#update-medicine-form input[name=description]").closest(".form-group").find("small").text(data.error_desc);
                }else{
                    if (data.error_exist != null) {
                        $("#update-medicine-form input[name=description]").closest(".form-group").find("small").text(data.error_exist);
                    }else{
                        $("#update-medicine-form input[name=description]").closest(".form-group").find("small").text("");
                    }
                }
                
                if (data.error_price != null) {
                    $("#update-medicine-form input[name=price]").closest(".form-group").find("small").text(data.error_price);
                }else{
                    $("#update-medicine-form input[name=price]").closest(".form-group").find("small").text("");
                }
           }
       });
    },
    
    delete_medicine : function(data){
        $.ajax({
           type: 'POST',
           url:  BASE_URL + "admin/remove_medicine",
           data: { code : data[0]},
           dataType: 'json'
       }).done(function(data) {
           console.log(data);
           if (data.status) {
               medicines.load_medicines(data);
               swal("Success!","Medicine Successfully deleted","success");
           } else {
               swal("Failed!","Medicine deletion failed.","error");
           }
       });
    }
}

$('#medicines-table').on('click', '.btn-updt', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#medicines-table').dataTable().fnGetData(current_row);
    $("#update-medicine-form input[name=mcode]").val(data[0]);
    $("#update-medicine-form input[name=description]").val(data[1]).parent('.form-line').addClass("focused");
    $("#update-medicine-form input[name=price]").val(data[2]).parent('.form-line').addClass("focused");
    
    swal({
            title: "Update?",
            text: "This will change your medicine information.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No",
            closeOnConfirm: true
        }, function () {
            $("#upMedicine").modal("show");
    });
});

$('#medicines-table').on('click', '.btn-del', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#medicines-table').dataTable().fnGetData(current_row);
    
    swal({
            title: "Delete Medicine?",
            text: "You cannot undo this process.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            medicines.delete_medicine(data);
    });
});

$("#addMedicine").on("hidden.bs.modal", function(){
    $("#add-medicine-form input[name=description]").closest(".form-group").find("small").text("");
    $("#update-medicine-form input[name=price]").closest(".form-group").find("small").text("");

    $("#add-medicine-form input[name=description]").val("");
    $("#update-medicine-form input[name=price]").val("");
});


