$(function () {
    //Textare auto growth
    // autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    
});


var programs = {
    load_programs : function(data){
        var programs_table = $('#programs-table').DataTable();
        programs_table.clear().draw();
        for (var i = 0; i < data.programs.length; i++) {
            programs_table.row.add([
                data.programs[i]['title'],
                data.programs[i]['date'],
                data.programs[i]['implementor'],
                data.programs[i]['remarks'],
                data.programs[i]['moa_status'],
                data.programs[i]['created_date'],
                `<div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">More..
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                    <li><a href="${BASE_URL}program/details?id=${data.programs[i]['id']}">View Details</a></li>
                    <li><a href="#">Delete</a></li>
                    </ul>
                </div>`
                
            ]).draw(false);
        }
    },
    
    fetch_programs : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "program/fetch_programs",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                programs.load_programs(data);
            } else {
                console.log("fail get programs");
            }
        });
    },
    
    add_program : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "program/add_program",
            data: $("#add-program-form").serialize(),
            dataType: 'json'
        }).done(function(data) {
            if (data.status) {
                var form_data =  new FormData($("#attachment-form")[0]);
                form_data.append('record_id', data.id);

                $.ajax({
                    type: 'POST',
                    url:  BASE_URL + "program/upload_file",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        swal({
                            title: "Uploading...",
                            text: "Please wait while we are uploading you attachements",
                            type: "info",
                            showConfirmButton: false
                        });
                    },
                }).done(function(data2) {
                    let result = JSON.parse(data2);

                    if(result.status) {
                        swal({
                            title: "Success!",
                            text: "New program added!",
                            type: "success"
                        }, function() {
                            window.location = BASE_URL + "program";
                        });
                    }else{
                        swal({
                            title: "Warning!",
                            text: "Some files are not uploaded due to some error, please reupload attachment in details section.",
                            type: "warning"
                        },function() {
                            swal({
                                title: "Success!",
                                text: "New program added!",
                                type: "success"
                            }, function() {
                                window.location = BASE_URL + "program";
                            });
                        });
                    }
                })
            } else {
                if (data.error_title != null) {
                    $("#add-program-form input[name=title]").closest(".form-group").find("small").html(data.error_title);
                }else{
                    $("#add-program-form input[name=title]").closest(".form-group").find("small").html("");
                }
                
                if (data.error_beneficiary != null) {
                    $("#add-program-form input[name=beneficiary]").closest(".form-group").find("small").html(data.error_beneficiary);
                }else{
                    $("#add-program-form input[name=beneficiary]").closest(".form-group").find("small").html("");
                }

                if (data.error_conducted != null) {
                    $("#add-program-form input[name=conducted]").closest(".form-group").find("small").html(data.error_conducted);
                }else{
                    $("#add-program-form input[name=conducted]").closest(".form-group").find("small").html("");
                }

                if (data.error_implementor != null) {
                    $("#add-program-form .implementor").closest(".form-group").find("small").html(data.error_implementor);
                }else{
                    $("#add-program-form .implementor").closest(".form-group").find("small").html("");
                }

                if (data.error_date != null) {
                    $("#add-program-form input[name=date]").closest(".form-group").find("small").html(data.error_date);
                }else{
                    $("#add-program-form input[name=date]").closest(".form-group").find("small").html("");
                }

                if (data.error_descriptive_rating != null) {
                    $("#add-program-form input[name=descriptive_rating]").closest(".form-group").find("small").html(data.error_descriptive_rating);
                }else{
                    $("#add-program-form input[name=descriptive_rating]").closest(".form-group").find("small").html("");
                }

                if (data.error_ended != null) {
                    $("#add-program-form input[name=ended]").closest(".form-group").find("small").html(data.error_ended);
                }else{
                    $("#add-program-form input[name=ended]").closest(".form-group").find("small").html("");
                }

                if (data.error_moa_status != null) {
                    $("#add-program-form input[name=moa_status]").closest(".form-group").find("small").html(data.error_moa_status);
                }else{
                    $("#add-program-form input[name=moa_status]").closest(".form-group").find("small").html("");
                }

                if (data.error_numerical_rating != null) {
                    $("#add-program-form input[name=numerical_rating]").closest(".form-group").find("small").html(data.error_numerical_rating);
                }else{
                    $("#add-program-form input[name=numerical_rating]").closest(".form-group").find("small").html("");
                }

                if (data.error_partner != null) {
                    $("#add-program-form input[name=partner]").closest(".form-group").find("small").html(data.error_partner);
                }else{
                    $("#add-program-form input[name=partner]").closest(".form-group").find("small").html("");
                }

                if (data.error_remarks != null) {
                    $("#add-program-form input[name=remarks]").closest(".form-group").find("small").html(data.error_remarks);
                }else{
                    $("#add-program-form input[name=remarks]").closest(".form-group").find("small").html("");
                }

                if (data.error_started != null) {
                    $("#add-program-form input[name=started]").closest(".form-group").find("small").html(data.error_started);
                }else{
                    $("#add-program-form input[name=started]").closest(".form-group").find("small").html("");
                }

                if (data.error_trained != null) {
                    $("#add-program-form input[name=trained]").closest(".form-group").find("small").html(data.error_trained);
                }else{
                    $("#add-program-form input[name=trained]").closest(".form-group").find("small").html("");
                }
            }
        });
    },
    
    update_program : function(){
//        alert("asdfasd");
        $.ajax({
           type: 'POST',
           url:  BASE_URL + "admin/updt_program",
           data: $("#update-program-form").serialize(),
           dataType: 'json'
       }).done(function(data) {
           console.log(data);
           if (data.status) {
               programs.load_programs(data);
               swal("Success!","program updated","success");
               $("#upprogram").modal("hide");
           } else {
               if (data.error_desc != null) {
                    $("#update-program-form input[name=description]").closest(".form-group").find("small").text(data.error_desc);
                }else{
                    if (data.error_exist != null) {
                        $("#update-program-form input[name=description]").closest(".form-group").find("small").text(data.error_exist);
                    }else{
                        $("#update-program-form input[name=description]").closest(".form-group").find("small").text("");
                    }
                }
                
                if (data.error_price != null) {
                    $("#update-program-form input[name=price]").closest(".form-group").find("small").text(data.error_price);
                }else{
                    $("#update-program-form input[name=price]").closest(".form-group").find("small").text("");
                }
           }
       });
    },
    
    delete_program : function(data){
        $.ajax({
           type: 'POST',
           url:  BASE_URL + "admin/remove_program",
           data: { code : data[0]},
           dataType: 'json'
       }).done(function(data) {
           console.log(data);
           if (data.status) {
               programs.load_programs(data);
               swal("Success!","program Successfully deleted","success");
           } else {
               swal("Failed!","program deletion failed.","error");
           }
       });
    }
}

$('#programs-table').on('click', '.btn-updt', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#programs-table').dataTable().fnGetData(current_row);
    $("#update-program-form input[name=mcode]").val(data[0]);
    $("#update-program-form input[name=description]").val(data[1]).parent('.form-line').addClass("focused");
    $("#update-program-form input[name=price]").val(data[2]).parent('.form-line').addClass("focused");
    
    swal({
            title: "Update?",
            text: "This will change your program information.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No",
            closeOnConfirm: true
        }, function () {
            $("#upprogram").modal("show");
    });
});

$('#programs-table').on('click', '.btn-del', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#programs-table').dataTable().fnGetData(current_row);
    
    swal({
            title: "Delete program?",
            text: "You cannot undo this process.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            programs.delete_program(data);
    });
});

$("#addprogram").on("hidden.bs.modal", function(){
    $("#add-program-form input[name=description]").closest(".form-group").find("small").text("");
    $("#update-program-form input[name=price]").closest(".form-group").find("small").text("");

    $("#add-program-form input[name=description]").val("");
    $("#update-program-form input[name=price]").val("");
});


