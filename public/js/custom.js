$(document).ready(function(){
	//alerta para borrar usuario
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

	//Guardar formulario de crear tour
	$("#save-tour").click(function(event){
        
        alertify.confirm("¿Esta seguro que desea guardar este tour ",
            function (e) {
                if (e) { 

					$('#short_description').val(editor.getData());
					$('#long_description').val(editor2.getData());

					var dataString = new FormData($('#createTour')[0]);

					$.ajax({
			            url: $("#createTour").attr("action"),
			            type: 'POST', 
			            data: dataString,
		                processData: false,
		                contentType: false,
		                dataType: 'json',
		                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			            success: function (response)
			            { 
			            	$('#createTour')[0].reset();
                    		alertify.success('Tour creada exitosamente');
			            },error: function (err) {
			            	if (err.status === 200) {
			            		$('#createTour')[0].reset();
			            		alertify.success('Tour creada exitosamente');
			            	}
			            	if (err.status === 422) {
		                        $errors = err.responseJSON; //this will get the errors response data.
		                        //show them somewhere in the markup
		                        //e.g
		                        errorsHtml = '<div class="alert alert-danger" role="alert">';
		                        errorsHtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul>';

		                        $.each($errors.errors, function (key, value) {
		                            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
		                        });
		                        errorsHtml += '</ul></di>';

		                        $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form

		                        window.setTimeout(function () {
		                            $(".alert").fadeTo(500, 0).slideUp(500, function () {
		                                $(this).remove();
		                            });
		                        }, 4000);
		                        $('body,html').animate({scrollTop : 0}, 500);
		                    } else { 
		                    }
			            	
			            }, them: function (aa){
			            	console.log("them");
			            	console.log(aa);
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

	

	$(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });


//Guardar formulario de crear zona
$("#save-zona").click(function(event){
        
        alertify.confirm("¿Esta seguro que desea guardar esta zona ",
            function (e) {
                if (e) { 
					var dataStringZ = $('#createZonas').serialize();
					var name = $('#name').val();
					console.log(name);
					console.log(dataStringZ);
					$.ajax({
			            url: $("#createZonas").attr("action"),
			            type: 'POST', 
		                dataType: 'json',
		                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			            data: dataStringZ,
			            success: function (response)
			            { 
			            	console.log("susscess");
			            	$('#createZonas')[0].reset();
                    		alertify.success('Zona creada exitosamente');
			            },error: function (err) {
			            	if (err.status === 200) {
			            		$('#createZonas')[0].reset();
                    			alertify.success('Tour creada exitosamente');
			            	}
			            	if (err.status === 422) {
		                        $errors = err.responseJSON; //this will get the errors response data.
		                        //show them somewhere in the markup
		                        //e.g
		                        errorsHtml = '<div class="alert alert-danger" role="alert">';
		                        errorsHtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul>';

		                        $.each($errors.errors, function (key, value) {
		                            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
		                        });
		                        errorsHtml += '</ul></di>';

		                        $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form

		                        window.setTimeout(function () {
		                            $(".alert").fadeTo(500, 0).slideUp(500, function () {
		                                $(this).remove();
		                            });
		                        }, 4000);
		                        $('body,html').animate({scrollTop : 0}, 500);
		                    } else { 
		                    	console.log(err);
		                    }
			            	
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

//Guardar formulario de crear zona
$("#update-zona").click(function(event){
        
        alertify.confirm("¿Esta seguro que desea actualizar esta zona? ",
            function (e) {
                if (e) { 
					var dataStringZ = $('#updateZonas').serialize();
					$.ajax({
			            url: $("#updateZonas").attr("action"),
			            type: 'POST', 
		                dataType: 'json',
		                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			            data: dataStringZ,
			            success: function (response)
			            { 
			            	//$('#updateZonas')[0].reset();
                    		alertify.success('Zona actualizada exitosamente');
			            },error: function (err) {
			            	if (err.status === 200) {
			            		//$('#updateZonas')[0].reset();
                    			alertify.success('Zona actualizada exitosamente');
			            	}
			            	if (err.status === 422) {
		                        $errors = err.responseJSON; //this will get the errors response data.
		                        //show them somewhere in the markup
		                        //e.g
		                        errorsHtml = '<div class="alert alert-danger" role="alert">';
		                        errorsHtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul>';

		                        $.each($errors.errors, function (key, value) {
		                            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
		                        });
		                        errorsHtml += '</ul></di>';

		                        $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form

		                        window.setTimeout(function () {
		                            $(".alert").fadeTo(500, 0).slideUp(500, function () {
		                                $(this).remove();
		                            });
		                        }, 4000);
		                        $('body,html').animate({scrollTop : 0}, 500);
		                    } else { 
		                    	console.log(err);
		                    }
			            	
			            }
			        });

                } else {
                    alertify.error("Usted ha cancelado la solicitud");
	            }
	        },
	        function () {
	    	    var error = alertify.error('Cancel');
	    });

	    $('.days-multiple').select2();
	});

$('.days-multiple').select2();

});

