/*! @ curso - v1.0.0 - 2018-05-19 | (c) 2018 Cristian Nieto - Diego Nieto !*/

/**
 * This module is responsible for init select2 plugin, 
 * iCheck plugin, datepicker and multiselect
 * 
 */
(function($) {
	
	"use strict";

	// init select2 plugin
	$('.select2').select2();

	// init iCheck plugin
	$('input[type="checkbox"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal',
		radioClass: 'iradio_minimal',
	});

	// init datepicker
	$('.date').datepicker({
		format: 'yyyy-mm-dd'
	});

	// init multiselect
    $('#selectInscAlumnos').multiSelect();

}($));
/**
 * This module is responsible for init multiselect
 * 
 */
(function($) {

	"use strict";

	/**
	 * 
	 * 
	 * @ {object}
	 * @ {element} 
	 */
	var buscarAlumnosPromise = undefined;
	var buscarAlumnosRequest = undefined;
	const selectInscAlumnos   = $('#selectInscAlumnos')[0];
	const tituloInscAlumnos   = $('#modal-inscribir-alumnos').find('.modal-title')[0];
    const inputBuscarAlumnos  = $('#inputBuscarAlumnos')[0];
    const buttonBuscarAlumnos = $('#buttonBuscarAlumnos')[0];
    const spanLoadingIcon	  = (function() {
    	var span = document.createElement('SPAN');
    	span.classList.add("fa", "fa-circle-o-notch", "fa-spin", "text-aqua");
    	return span;
	}());

    var buscarAlumnos = function() {
    	// set search and url
    	var search = $(inputBuscarAlumnos).val();
    	var url = base_url() + 'cursos/buscarAlumnos';

		// end unresolved promise
		if (buscarAlumnosPromise !== undefined) {
			buscarAlumnosRequest.abort();
		}

		// append loading icon
		tituloInscAlumnos.appendChild(spanLoadingIcon);

		// create asynchronous xml request
		buscarAlumnosPromise = $.Deferred();
		buscarAlumnosRequest = new XMLHttpRequest();
		buscarAlumnosRequest.open("POST", url, true);
		buscarAlumnosRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		buscarAlumnosRequest.onreadystatechange = function() {
			if (buscarAlumnosRequest.readyState === XMLHttpRequest.DONE) {
				if (buscarAlumnosRequest.status === 200) {
					// TODO: FIX &#65279 Character
					var formatResponse = buscarAlumnosRequest.response.replace(/[\uFEFF]/g, '');
					buscarAlumnosPromise.resolve(JSON.parse(formatResponse));
				} else {
					buscarAlumnosPromise.reject();
				}
			}
        };
		buscarAlumnosRequest.onerror = function(event) {
			buscarAlumnosPromise.reject();
        };
		buscarAlumnosRequest.send("buscar_alumnos="+search);

		// resolve promise
		buscarAlumnosPromise.done(function(datos) {
	        // append data
	        datos.forEach(function(persona) {
	        	var option   = document.createElement("option");
	        	option.text  = persona.nombre + " " + persona.apellido;
	        	option.value = persona.codpersona;
	        	selectInscAlumnos.appendChild(option);
	        });
	        // refresh select
	        $(selectInscAlumnos).multiSelect('refresh');
	        // release cached promise and request
	        buscarAlumnosPromise = undefined;
			buscarAlumnosRequest = undefined;
			// remove loading icon
			tituloInscAlumnos.removeChild(spanLoadingIcon);
		});

		// reject promise
		buscarAlumnosPromise.fail(function() {
			console.log("terminamos");
			// release cached promise and request
	        buscarAlumnosPromise = undefined;
			buscarAlumnosRequest = undefined;
			// remove loading icon
			tituloInscAlumnos.removeChild(spanLoadingIcon);
		});
	};

    // trigger search if user press 'ENTER' on input
	$(inputBuscarAlumnos).on('keydown', function(event) {
    	if (event.keyCode === 13) {
    		buscarAlumnos();
    		return false;
    	}
    });

	// trigger search if user press button search
    $(buttonBuscarAlumnos).on('click', function() {
    	buscarAlumnos();
    	return false;
    });

}($));