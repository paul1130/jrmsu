var dental = {
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
            dental.login();
        }
    },
    
    login : function(){
//        alert('asdfd');
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/sign_in",
            data: $('#sign-in-form').serialize(),
            dataType: 'json'   
        }).done(function(data) {
//            console.log(data);
            if (data.status) {
               window.location.href =  BASE_URL + "admin/appointments";
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