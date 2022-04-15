var myFeed = {
	get_feedback : function(){
		$.ajax({
            type: 'POST',
            url:  BASE_URL + "admin/get_feedback",
            data: {},
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.status) {
                myFeed.load_feedback(data);
            } else {
                console.log("fail fetch feedbacks");
            }
        });
	},

	load_feedback : function(data){
		$('#feed-table').dataTable().fnDestroy();
        var my_table = $('#feed-table').DataTable({dom : "ftip"});
        my_table.clear().draw();

        for (var i = 0; i < data.feedbacks.length; i++) {
        		my_table.row.add([
	                data.feedbacks[i]['email'],
	                data.feedbacks[i]['message'],
	                data.feedbacks[i]['createddate']
	                
	            ]).draw(false);
    	}
	},
};