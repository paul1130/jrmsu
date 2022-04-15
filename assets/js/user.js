var user = {
    validate_log_in : function(){
        var uname = $('#sign-in-form input[name=username]');
        var pass = $('#sign-in-form input[name=password]');
        var error = 0;
        
        if (uname.val() === "") {
            uname.parents('.form-line').removeClass('error success').addClass('error');
            uname.parents('.input-group').find('label').text('Please insert username!');
            error++;
        }else{
            uname.parents('.form-line').removeClass('error success').addClass('success');
            uname.parents('.input-group').find('label').text('');
        }
        
        if (!pass.val()) {
            pass.parents('.form-line').removeClass('error success').addClass('error');
            pass.parents('.input-group').find('label').text('Please insert password!');
            error++;
        }else{
            pass.parents('.form-line').removeClass('error success').addClass('success');
            pass.parents('.input-group').find('label').text('');
        }
//        
        if (error == 0) {
            user.login();
        }
    },
    
    login : function(){
//        alert('asdfd');
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "user/sign_in",
            data: $('#sign-in-form').serialize(),
            dataType: 'json'   
        }).done(function(data) {
//            console.log(data);
            if (data.status) {
               window.location.href =  BASE_URL + "program";
            } else {
                var form_username = $('#sign-in-form input[name=username]');
                var form_password = $('#sign-in-form input[name=password]');
                if (data.error_acct) {
                    form_username.parents('.form-line').removeClass('error success').addClass('error');
                    form_username.parents('.input-group').find('label').text('Account does not exist!');
                    
                    form_password.parents('.form-line').removeClass('error success').addClass('error');
                    form_password.parents('.form-line').find('small').text('');
                }else{
                    form_username.parents('.form-line').removeClass('error success').addClass('success');
                    form_username.parents('.input-group').find('label').text('');

                    if (data.error_pass) {
                        form_password.parents('.form-line').removeClass('error success').addClass('error');
                        form_password.parents('.input-group').find('label').text('Password in incorrect!');
                    }else{
                        form_password.parents('.form-line').removeClass('error success').addClass('success');
                        form_password.parents('.input-group').find('label').text('');
                    }
                }
            }
        });
    },
    
    under_development : function(){
        swal({
            title: "Sorry!",
            text: "This page is under development.",
            imageUrl: BASE_URL +"assets/img/development.png"
        });
    },
}


var users_table = $('#users-table').DataTable({
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
            targets:   1
//            width: "3%"
        }
    ],
//    select: {
//        style:    'multi',
//        selector: 'td:first-child'
//    }
});

var users = {
    load_users : function(data){
        var users_table = $('#users-table').DataTable();
        users_table.clear().draw();
        console.log(data.users);
        for (var i = 0; i < data.users.length; i++) {
            let active_btn = data.users[i]['is_active'] == 1 ? 
            '<button type="button" class="btn btn-sm bg-red waves-effect btn-del">Diactivate</button>' :
            '<button type="button" class="btn btn-sm bg-blue waves-effect btn-del">Activate</button>';

            users_table.row.add([
                data.users[i]['full_name'],
                data.users[i]['type'],
                '<button type="button" class="btn btn-sm bg-green waves-effect btn-updt">Update</button> ' +
                active_btn
                
            ]).draw(false);
        }
    },
    
    fetch_users : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "user/fetch_users",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            if (data.status) {
                users.load_users(data);
            } else {
                console.log("fail get ros census");
            }
        });
    },
    
    add_user : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "user/add_user",
            data: $("#add-user-form").serialize(),
            dataType: 'json'
        }).done(function(data) {
            if (data.status) {
                swal(
                    "Success",
                    "User successfully added!",
                    "success");
            } else {
                if (data.error_first_name != null) {
                    $("#add-user-form input[name=first_name]").closest(".form-group").find("small").html(data.error_first_name);
                }else{
                    $("#add-user-form input[name=first_name]").closest(".form-group").find("small").html("");
                }
                
                if (data.error_middle_name != null) {
                    $("#add-user-form input[name=middle_name]").closest(".form-group").find("small").html(data.error_middle_name);
                }else{
                    $("#add-user-form input[name=middle_name]").closest(".form-group").find("small").html("");
                }

                if (data.error_last_name != null) {
                    $("#add-user-form input[name=first_name]").closest(".form-group").find("small").html(data.error_last_name);
                }else{
                    $("#add-user-form input[name=first_name]").closest(".form-group").find("small").html("");
                }

                if (data.error_type != null) {
                    $("#add-user-form select[name=type]").closest(".form-group").find("small").html(data.error_type);
                }else{
                    $("#add-user-form select[name=type]").closest(".form-group").find("small").html("");
                }

                if (data.error_username != null) {
                    $("#add-user-form input[name=username]").closest(".form-group").find("small").html(data.error_username);
                }else{
                    $("#add-user-form input[name=username]").closest(".form-group").find("small").html("");
                }

                if (data.error_password != null) {
                    $("#add-user-form input[name=password]").closest(".form-group").find("small").html(data.error_password);
                }else{
                    $("#add-user-form input[name=password]").closest(".form-group").find("small").html("");
                }

                if (data.error_confirm_password != null) {
                    $("#add-user-form input[name=confirm_password]").closest(".form-group").find("small").html(data.error_confirm_password);
                }else{
                    $("#add-user-form input[name=confirm_password]").closest(".form-group").find("small").html("");
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
               users.load_users(data);
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
               users.load_users(data);
               swal("Success!","Medicine Successfully deleted","success");
           } else {
               swal("Failed!","Medicine deletion failed.","error");
           }
       });
    }
}

$('#users-table').on('click', '.btn-updt', function () {
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = $('#users-table').dataTable().fnGetData(current_row);
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

// $('#users-table').on('click', '.btn-del', function () {
//     var current_row = $(this).parents('tr');//Get the current row
//     if (current_row.hasClass('child')) {//Check if the current row is a child row
//         current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
//     }
//     var data = $('#users-table').dataTable().fnGetData(current_row);
    
//     swal({
//             title: "Delete Medicine?",
//             text: "You cannot undo this process.",
//             type: "warning",
//             showCancelButton: true,
//             confirmButtonColor: "#F44336",
//             confirmButtonText: "Yes, delete it!",
//             cancelButtonText: "No",
//             closeOnConfirm: false
//         }, function () {
//             users.delete_medicine(data);
//     });
// });

// $("#addMedicine").on("hidden.bs.modal", function(){
//     $("#add-medicine-form input[name=description]").closest(".form-group").find("small").text("");
//     $("#update-medicine-form input[name=price]").closest(".form-group").find("small").text("");

//     $("#add-medicine-form input[name=description]").val("");
//     $("#update-medicine-form input[name=price]").val("");
// });


$("#addUser").on("hidden.bs.modal", function(){
    $("#add-user-form input[name=first_name]").closest(".form-group").find("small").html("");
    $("#add-user-form input[name=middle_name]").closest(".form-group").find("small").html("");
    $("#add-user-form input[name=last_name]").closest(".form-group").find("small").html("");
    $("#add-user-form input[name=username]").closest(".form-group").find("small").html("");
    $("#add-user-form select[name=type]").closest(".form-group").find("small").html("");
    $("#add-user-form input[name=password]").closest(".form-group").find("small").html("");
    $("#add-user-form input[name=confirm_password]").closest(".form-group").find("small").html("");

    // $("#add-user-form input[name=first_name]").val("");
    // $("#add-user-form input[name=middle_name]").val("");
    // $("#add-user-form input[name=last_name]").val("");
    // $("#add-user-form input[name=username]").val("");
    // $("#add-user-form select[name=type]").val("none");
    // $("#add-user-form input[name=password]").val("");
    // $("#add-user-form input[name=confirm_password]").val("");

    $("#add-user-form").trigger("reset");
    console.log($("#add-user-form").find(".from-line"));
    $("#add-user-form").find(".from-line");

    // $("#add-user-form input[name=name]").val("");
    // $("#add-user-form input[name=contactno]").val("");
    // $("#add-user-form input[name=bdate]").val("");
    // $("#add-user-form input[name=emailadd]").val("");
    // $("#add-user-form textarea[name=address]").val("");
    // $("#add-user-form input[name=gender]").prop("checked", false);

});

