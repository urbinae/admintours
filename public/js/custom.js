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

					var dataString = $('#createTour').serialize();

                	$.ajax({
			            url: $("#createTour").attr("action"),
			            type: 'POST', 
			            data: dataString,
			            success: function (response)
			            { 
			            	$('#createTour')[0].reset();
                    		alertify.success('Tour creada exitosamente');
			            },error: function (err) {

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

	//tabla dinamica datatable
	$('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ],
        //"url": "dataTables.german.lang"
        "language": {
            "url": "/js/datatable/Spanish.json"
        }
    } );



});


//ckeditor de crear tour
let editor;
ClassicEditor
	.create( document.querySelector( '#short_description' ), {
		toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
	} )
	.then( newEditor => {
        editor = newEditor;
    } )
	.catch( err => {
		console.error( err.stack );
	}
);

ClassicEditor
	.create( document.querySelector( '#long_description' ), {
		toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
	} )
	.then( newEditor2 => {
        editor2 = newEditor2;
    } )
	.catch( err => {
		console.error( err.stack );
	}
);


