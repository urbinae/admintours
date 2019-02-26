$(document).ready(function(){
	$("button#delete-user").click(function(event){
	    event.preventDefault();
		var id = $(this).data("id");
		var name = $(this).data("name");
        var token = $(this).data("token");
        var url = $("form-delete").prevObject[0].URL;
        
		alertify.confirm("¿Esta seguro que desea eliminar al usuario "+name+"?",
            function (e) {
                if (e) { 
                	
                	$.ajax({
			            url: url+"/"+id,
			            type: 'POST', 
			            data: {
			                "id": id,
			                "_method": 'DELETE',
			                "_token": token,
			            },
			            success: function (response)
			            { 
			            	location.reload();
			            },error: function (err) {
			            	console.log("error");
			            	console.log(err);
			            }
			        });
			        
                } else {
                    alertify.error("Usted ha cancelado la solicitud");
	            }
	        },
	        function () {
	    	    var error = alertify.error('Cancel');
	    });
	});

});