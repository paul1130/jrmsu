var beneficiary = {
    load_beneficiaries : function(data){
        var beneficiaries_table = $('#beneficiaries-table').DataTable();
        beneficiaries_table.clear().draw();
        for (var i = 0; i < data.beneficiaries.length; i++) {
            beneficiaries_table.row.add([
                `${data.beneficiaries[i]['first_name']} ${data.beneficiaries[i]['last_name']}`,
                `${data.beneficiaries[i]['title']}`,
                data.beneficiaries[i]['birth_date'],
                data.beneficiaries[i]['contact_no'],
                `<div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">More..
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="right: 4px; left: auto; top:67px">
                    <li><a href="${BASE_URL}beneficiary/details?id=${data.beneficiaries[i]['id']}">View Details</a></li>
                    <li><a href="javascript:void(0);" onclick="beneficiaries.delete_beneficiary(${data.beneficiaries[i]['id']})">Delete</a></li>
                    </ul>
                </div>`
                
            ]).draw(false);
        }
    },
    
    fetch_beneficiaries : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "beneficiary/fetch_beneficiaries",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            if (data.status) {
                beneficiary.load_beneficiaries(data);
            } else {
                console.log("fail get beneficiaries");
            }
        });
    },

    delete_attachment: function(att_id) {
        swal({
            title: "Warning!",
            text: "Are you sure you want to delete attachment?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                type: 'POST',
                url:  BASE_URL + "beneficiary/delete-attachment",
                data: {att_id : att_id},
                dataType: 'json'
            }).done(function(data) {
                console.log(data);
                if(data.status) {
                    swal({
                        title: "Success!",
                        text: "Attachment sucessfully deleted!",
                        type: "success"
                    }, function() {
                        location.reload();
                    });
                }else{
                    swal({
                        title: "Opps!",
                        text: "Uanble to delete attachment!",
                        type: "error"
                    });
                }
            })
        });
    },

    delete_beneficiary: function(beneficiary_id) {
        swal({
            title: "Warning!",
            text: "Are you sure you want to delete beneficiary?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                type: 'POST',
                url:  BASE_URL + "beneficiary/delete",
                data: {beneficiary_id : beneficiary_id},
                dataType: 'json'
            }).done(function(data) {
                if(data.status) {
                    swal({
                        title: "Success!",
                        text: "beneficiary sucessfully deleted!",
                        type: "success"
                    }, function() {
                        location.reload();
                    });
                }else{
                    swal({
                        title: "Opps!",
                        text: "Uanble to delete beneficiary!",
                        type: "error"
                    });
                }
            })
        });
    },

    add_attachment: function() {
        var form_data =  new FormData($("#attachment-form")[0]);
        console.log(form_data);
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "beneficiary/upload_file",
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
                    text: "Attachment successfully added!",
                    type: "success"
                }, function() {
                    location.reload();
                });
            }else{

            }
        })
    },
    
    add_beneficiary : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "beneficiary/add_beneficiary",
            data: $("#add-beneficiary-form").serialize(),
            dataType: 'json'
        }).done(function(data) {
            if (data.status) {
                let file = $("#profile-pic").val();
                if(file) {
                    var form_data =  new FormData($("#profile-pic-form")[0]);
                    form_data.append('record_id', data.id);
                    $.ajax({
                        type: 'POST',
                        url:  BASE_URL + "beneficiary/upload-profile-pic",
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
                                text: "New beneficiary added!",
                                type: "success"
                            }, function() {
                                window.location = BASE_URL + "beneficiary";
                            });
                        }else{
                            swal({
                                title: "Warning!",
                                text: "Some files are not uploaded due to some error, please reupload attachment in details section.",
                                type: "warning"
                            },function() {
                                swal({
                                    title: "Success!",
                                    text: "New beneficiary added!",
                                    type: "success"
                                }, function() {
                                    window.location = BASE_URL + "beneficiary";
                                });
                            });
                        }
                    })
                }else{
                    swal({
                        title: "Success!",
                        text: "New beneficiary added!",
                        type: "success"
                    }, function() {
                        window.location = BASE_URL + "beneficiary";
                    });
                }
            } else {
                if (data.error_first_name != null) {
                    $("#add-beneficiary-form input[name=first_name]").closest(".form-group").find("small").html(data.error_first_name);
                }else{
                    $("#add-beneficiary-form input[name=first_name]").closest(".form-group").find("small").html("");
                }
                
                if (data.error_middle_name != null) {
                    $("#add-beneficiary-form input[name=middle_name]").closest(".form-group").find("small").html(data.error_middle_name);
                }else{
                    $("#add-beneficiary-form input[name=middle_name]").closest(".form-group").find("small").html("");
                }

                if (data.error_last_name != null) {
                    $("#add-beneficiary-form input[name=last_name]").closest(".form-group").find("small").html(data.error_last_name);
                }else{
                    $("#add-beneficiary-form input[name=last_name]").closest(".form-group").find("small").html("");
                }

                if (data.error_dob != null) {
                    $("#add-beneficiary-form input[name=dob]").closest(".form-group").find("small").html(data.error_dob);
                }else{
                    $("#add-beneficiary-form input[name=dob]").closest(".form-group").find("small").html("");
                }

                if (data.error_contact != null) {
                    $("#add-beneficiary-form input[name=contact]").closest(".form-group").find("small").html(data.error_contact);
                }else{
                    $("#add-beneficiary-form input[name=contact]").closest(".form-group").find("small").html("");
                }

                if (data.error_address != null) {
                    $("#add-beneficiary-form input[name=address]").closest(".form-group").find("small").html(data.error_address);
                }else{
                    $("#add-beneficiary-form input[name=address]").closest(".form-group").find("small").html("");
                }

                if (data.error_civl_status != null) {
                    $("#add-beneficiary-form select[name=civil_status]").closest(".form-group").find("small").html(data.error_civl_status);
                }else{
                    $("#add-beneficiary-form select[name=civil_status]").closest(".form-group").find("small").html("");
                }

                if (data.error_program_id != null) {
                    $("#add-beneficiary-form select[name=program_id]").closest(".form-group").find("small").html(data.error_program_id);
                }else{
                    $("#add-beneficiary-form select[name=program_id]").closest(".form-group").find("small").html("");
                }
            }
        });
    },
    
    update_beneficiary : function(){
//        alert("asdfasd");
        $.ajax({
           type: 'POST',
           url:  BASE_URL + "beneficiary/update",
           data: $("#update-beneficiary-form").serialize(),
           dataType: 'json'
       }).done(function(data) {
           if (data.status) {
                swal({
                    title: "Success!",
                    text: "Beneficiary successfully updated!",
                    type: "success"
                }, function() {
                    location.reload();
                });
           } else {
                if (data.error_title != null) {
                    $("#update-beneficiary-form input[name=title]").closest(".form-group").find("small").html(data.error_title);
                }else{
                    $("#update-beneficiary-form input[name=title]").closest(".form-group").find("small").html("");
                }
                
                if (data.error_beneficiary != null) {
                    $("#update-beneficiary-form input[name=beneficiary]").closest(".form-group").find("small").html(data.error_beneficiary);
                }else{
                    $("#update-beneficiary-form input[name=beneficiary]").closest(".form-group").find("small").html("");
                }

                if (data.error_conducted != null) {
                    $("#update-beneficiary-form input[name=conducted]").closest(".form-group").find("small").html(data.error_conducted);
                }else{
                    $("#update-beneficiary-form input[name=conducted]").closest(".form-group").find("small").html("");
                }

                if (data.error_implementor != null) {
                    $("#update-beneficiary-form .implementor").closest(".form-group").find("small").html(data.error_implementor);
                }else{
                    $("#update-beneficiary-form .implementor").closest(".form-group").find("small").html("");
                }

                if (data.error_date != null) {
                    $("#update-beneficiary-form input[name=date]").closest(".form-group").find("small").html(data.error_date);
                }else{
                    $("#update-beneficiary-form input[name=date]").closest(".form-group").find("small").html("");
                }

                if (data.error_descriptive_rating != null) {
                    $("#update-beneficiary-form input[name=descriptive_rating]").closest(".form-group").find("small").html(data.error_descriptive_rating);
                }else{
                    $("#update-beneficiary-form input[name=descriptive_rating]").closest(".form-group").find("small").html("");
                }

                if (data.error_ended != null) {
                    $("#update-beneficiary-form input[name=ended]").closest(".form-group").find("small").html(data.error_ended);
                }else{
                    $("#update-beneficiary-form input[name=ended]").closest(".form-group").find("small").html("");
                }

                if (data.error_moa_status != null) {
                    $("#update-beneficiary-form input[name=moa_status]").closest(".form-group").find("small").html(data.error_moa_status);
                }else{
                    $("#update-beneficiary-form input[name=moa_status]").closest(".form-group").find("small").html("");
                }

                if (data.error_numerical_rating != null) {
                    $("#update-beneficiary-form input[name=numerical_rating]").closest(".form-group").find("small").html(data.error_numerical_rating);
                }else{
                    $("#update-beneficiary-form input[name=numerical_rating]").closest(".form-group").find("small").html("");
                }

                if (data.error_partner != null) {
                    $("#update-beneficiary-form input[name=partner]").closest(".form-group").find("small").html(data.error_partner);
                }else{
                    $("#update-beneficiary-form input[name=partner]").closest(".form-group").find("small").html("");
                }

                if (data.error_remarks != null) {
                    $("#update-beneficiary-form input[name=remarks]").closest(".form-group").find("small").html(data.error_remarks);
                }else{
                    $("#update-beneficiary-form input[name=remarks]").closest(".form-group").find("small").html("");
                }

                if (data.error_started != null) {
                    $("#update-beneficiary-form input[name=started]").closest(".form-group").find("small").html(data.error_started);
                }else{
                    $("#update-beneficiary-form input[name=started]").closest(".form-group").find("small").html("");
                }

                if (data.error_trained != null) {
                    $("#update-beneficiary-form input[name=trained]").closest(".form-group").find("small").html(data.error_trained);
                }else{
                    $("#update-beneficiary-form input[name=trained]").closest(".form-group").find("small").html("");
                }
           }
       });
    },

    update_profile_pic : function() {
        let file = $("#profile-pic").val();
        if(file) {
            var form_data =  new FormData($("#update-pic-form")[0]);
            $.ajax({
                type: 'POST',
                url:  BASE_URL + "beneficiary/update-profile-pic",
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
            }).done(function(data) {
                let result = JSON.parse(data);
                if(result.status) {
                    swal({
                        title: "Success!",
                        text: "Profile picture successfully updated!",
                        type: "success"
                    }, function() {
                        location.reload();
                    });
                }else{
                    swal({
                        title: "Oops!",
                        text: result.error,
                        html: true,
                        type: "error"
                    });
                }
            })
        }else{
            swal({
                title: "Warning!",
                text: "Please select new profile picture.",
                type: "warning"
            });
        }
    },

    update_pic : function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-pic').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // delete_beneficiary : function(data){
    //     $.ajax({
    //        type: 'POST',
    //        url:  BASE_URL + "admin/remove_beneficiary",
    //        data: { code : data[0]},
    //        dataType: 'json'
    //    }).done(function(data) {
    //        console.log(data);
    //        if (data.status) {
    //            beneficiaries.load_beneficiaries(data);
    //            swal("Success!","beneficiary Successfully deleted","success");
    //        } else {
    //            swal("Failed!","beneficiary deletion failed.","error");
    //        }
    //    });
    // }
}

$('#beneficiaries-table').on('click', '.btn-updt', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#beneficiaries-table').dataTable().fnGetData(current_row);
    $("#update-beneficiary-form input[name=mcode]").val(data[0]);
    $("#update-beneficiary-form input[name=description]").val(data[1]).parent('.form-line').addClass("focused");
    $("#update-beneficiary-form input[name=price]").val(data[2]).parent('.form-line').addClass("focused");
    
    swal({
            title: "Update?",
            text: "This will change your beneficiary information.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No",
            closeOnConfirm: true
        }, function () {
            $("#upbeneficiary").modal("show");
    });
});

$('#beneficiaries-table').on('click', '.btn-del', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#beneficiaries-table').dataTable().fnGetData(current_row);
    
    swal({
            title: "Delete beneficiary?",
            text: "You cannot undo this process.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F44336",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            beneficiaries.delete_beneficiary(data);
    });
});

$("#addbeneficiary").on("hidden.bs.modal", function(){
    $("#add-beneficiary-form input[name=description]").closest(".form-group").find("small").text("");
    $("#update-beneficiary-form input[name=price]").closest(".form-group").find("small").text("");

    $("#add-beneficiary-form input[name=description]").val("");
    $("#update-beneficiary-form input[name=price]").val("");
});


