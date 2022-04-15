var feedback = {
    get_feedbacks : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/get_feedback",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                var html ="";
                for (var i = 0; i < data.feedbacks.length; i++) {
                    html += '<div class="media">';
                        html += '<div class="media-body">';
                            html += '<h4 class="media-heading">'+data.feedbacks[i]["email"]+'</h4><small>'+data.feedbacks[i]["createddate"]+'</small>';
                            html += '<p><b>"'+data.feedbacks[i]["message"]+'"</b></p>';
                        html += '</div>';
                    html += '</div>';
                }
                
                $("#feedbacks").empty().html(html);
            } else {
                console.log("fail load feedbacks");
            }
        });
    },
    
    add_feedback : function(){
        $.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/add_feedback",
            data: $("#add-feedback-form").serialize(),
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                var html ="";
                for (var i = 0; i < data.feedbacks.length; i++) {
                    html += '<div class="media">';
                        html += '<div class="media-body">';
                            html += '<h4 class="media-heading">'+data.feedbacks[i]["email"]+'</h4><small>'+data.feedbacks[i]["createddate"]+'</small>';
                            html += '<p><b>"'+data.feedbacks[i]["message"]+'"</b></p>';
                        html += '</div>';
                    html += '</div>';
                }
                $("#feedbacks").empty().html(html);
                swal("Success!", "Feedback added!","success");
                $("#addFeedback").modal("hide");
            } else {
                if (data.error_email != null) {
                    $("#add-feedback-form input[name=emailad]").closest(".form-group").find("small").html(data.error_email);
                }else{
                    $("#add-feedback-form input[name=emailad]").closest(".form-group").find("small").html('');
                }
                
                if (data.error_message != null) {
                    $("#add-feedback-form textarea[name=message]").closest(".form-group").find("small").html(data.error_message);
                }else{
                    $("#add-feedback-form textarea[name=message]").closest(".form-group").find("small").html('');
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


$("#addFeedback").on("hidden.bs.modal", function(){
   $("#add-feedback-form input[name=emailad]").closest(".form-group").find("small").html('');
   $("#add-feedback-form textarea[name=message]").closest(".form-group").find("small").html('');

    $("#add-feedback-form input[name=emailad]").val("");
    $("#add-feedback-form textarea[name=message]").val("");
});