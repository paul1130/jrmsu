$(function () {
    //Textare auto growth
    autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false,
        minDate:new Date()
    });
    
    $('.datepicker2').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false,
        maxDate:new Date()
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
});


var app = {
    fetch_avail : function(){
//        alert($("#sched input[name=myDate]").val());
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "guest/get_available",
            data: {myDate : $("#sched input[name=myDate]").val()},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
//                console.log(app.gen_dropdown(data));
//                $("#sched select[name=myTime]").removeAttr("disabled");
                
                $("#sched select[name=myTime]").empty().html(app.gen_dropdown(data));
                $("#sched select[name=myTime]").selectpicker("destroy");
                $("#sched select[name=myTime]").selectpicker("refresh");
                $("#sign-up").removeClass("disabled");
            } else {
                console.log("fail load feedbacks");
            }
        });
    },
    
    gen_dropdown : function(data){
        var html = "";
        for (var i = 0; i < data.timex.length; i++) {
            html += data.timex[i];
        }
        
        return html;
    },

    sign_up : function(){
        var d = $("#sched input[name=myDate]").val();
        var t = $("#sched select[name=myTime]").val();

        // console.log(d + t);

         $("#sign-up-form input[name=xdate]").val(d);
         $("#sign-up-form input[name=xqueue]").val(t);

         $("#addAppointment").find(".modal-header small").text(d + "("+$("#sched select[name=myTime] .selected").text()+")");


         $("#addAppointment").modal("show"); 
    },

    add_appointment : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "guest/add_appointment",
            data: $("#sign-up-form").serialize(),
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                swal("Appointment Requested!","Please keep your lines active for 24 hours after "+
                    "sending the initial request for an appointment. Well get in touch with your "+
                    "to discuss the confirmation and other details of your appointment.","success");
                $("#sign-up").addClass("disabled");
            } else {
                if (data.error_name != null) {
                    $("#sign-up-form input[name=name]").closest(".input-group").find("small").html(data.error_name);
                }else{
                    $("#sign-up-form input[name=name]").closest(".input-group").find("small").html("");
                }
                
                if (data.error_contactno != null) {
                    $("#sign-up-form input[name=contactno]").closest(".input-group").find("small").html(data.error_contactno);
                }else{
                    $("#sign-up-form input[name=contactno]").closest(".input-group").find("small").html("");
                }

                if (data.error_bdate != null) {
                    $("#sign-up-form input[name=bdate]").closest(".input-group").find("small").html(data.error_bdate);
                }else{
                    $("#sign-up-form input[name=bdate]").closest(".input-group").find("small").html("");
                }

                if (data.error_emailadd != null) {
                    $("#sign-up-form input[name=emailadd]").closest(".input-group").find("small").html(data.error_emailadd);
                }else{
                    $("#sign-up-form input[name=emailadd]").closest(".input-group").find("small").html("");
                }

                if (data.error_address != null) {
                    $("#sign-up-form textarea[name=address]").closest(".input-group").find("small").html(data.error_address);
                }else{
                    $("#sign-up-form textarea[name=address]").closest(".input-group").find("small").html("");
                }

                if (data.error_gender != null) {
                    $("#sign-up-form input[name=gender]").closest(".input-group").find("small").html(data.error_gender);
                }else{
                    $("#sign-up-form input[name=gender]").closest(".input-group").find("small").html("");
                }
                
            }
        });
    }
};

$("#addAppointment").on("hidden.bs.modal", function(){
    $("#sign-up-form input[name=name]").closest(".input-group").find("small").html("");
    $("#sign-up-form input[name=contactno]").closest(".input-group").find("small").html("");
    $("#sign-up-form input[name=bdate]").closest(".input-group").find("small").html("");
    $("#sign-up-form input[name=emailadd]").closest(".input-group").find("small").html("");
    $("#sign-up-form textarea[name=address]").closest(".input-group").find("small").html("");
    $("#sign-up-form input[name=gender]").closest(".input-group").find("small").html("");


    $("#sign-up-form input[name=name]").val("");
    $("#sign-up-form input[name=contactno]").val("");
    $("#sign-up-form input[name=bdate]").val("");
    $("#sign-up-form input[name=emailadd]").val("");
    $("#sign-up-form textarea[name=address]").val("");
    $("#sign-up-form input[name=gender]").prop("checked", false);

});

// $(".dtp-btn-ok").click(function(){
//    console.log("hi");
//});