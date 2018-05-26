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

	

}($));
/**
 * This module is responsible for search
 *  
 */
(function($, window, document, undefined) {

	$.fn.quicksearch = function (target, opt) {
		
		var timeout, cache, rowcache, jq_results, val = '', e = this, options = $.extend({ 
			delay: 100,
			selector: null,
			stripeRows: null,
			loader: null,
			noResults: '',
			matchedResultsCount: 0,
			bind: 'keyup',
			onBefore: function () { 
				return;
			},
			onAfter: function () { 
				return;
			},
			show: function () {
				this.style.display = "";
			},
			hide: function () {
				this.style.display = "none";
			},
			prepareQuery: function (val) {
				return val.toLowerCase().split(' ');
			},
			testQuery: function (query, txt, _row) {
				for (var i = 0; i < query.length; i += 1) {
					if (txt.indexOf(query[i]) === -1) {
						return false;
					}
				}
				return true;
			}
		}, opt);
		
		this.go = function () {
			
			var i = 0,
				numMatchedRows = 0,
				noresults = true, 
				query = options.prepareQuery(val),
				val_empty = (val.replace(' ', '').length === 0);
			
			for (var i = 0, len = rowcache.length; i < len; i++) {
				if (val_empty || options.testQuery(query, cache[i], rowcache[i])) {
					options.show.apply(rowcache[i]);
					noresults = false;
					numMatchedRows++;
				} else {
					options.hide.apply(rowcache[i]);
				}
			}
			
			if (noresults) {
				this.results(false);
			} else {
				this.results(true);
				this.stripe();
			}
			
			this.matchedResultsCount = numMatchedRows;
			this.loader(false);
			options.onAfter();
			
			return this;
		};
		
		/*
		 * External API so that users can perform search programatically. 
		 * */
		this.search = function (submittedVal) {
			val = submittedVal;
			e.trigger();
		};
		
		/*
		 * External API to get the number of matched results as seen in 
		 * https://github.com/ruiz107/quicksearch/commit/f78dc440b42d95ce9caed1d087174dd4359982d6
		 * */
		this.currentMatchedResults = function() {
			return this.matchedResultsCount;
		};
		
		this.stripe = function () {
			
			if (typeof options.stripeRows === "object" && options.stripeRows !== null)
			{
				var joined = options.stripeRows.join(' ');
				var stripeRows_length = options.stripeRows.length;
				
				jq_results.not(':hidden').each(function (i) {
					$(this).removeClass(joined).addClass(options.stripeRows[i % stripeRows_length]);
				});
			}
			
			return this;
		};
		
		this.strip_html = function (input) {
			var output = input.replace(new RegExp('<[^<]+\>', 'g'), "");
			output = $.trim(output.toLowerCase());
			return output;
		};
		
		this.results = function (bool) {
			if (typeof options.noResults === "string" && options.noResults !== "") {
				if (bool) {
					$(options.noResults).hide();
				} else {
					$(options.noResults).show();
				}
			}
			return this;
		};
		
		this.loader = function (bool) {
			if (typeof options.loader === "string" && options.loader !== "") {
				 (bool) ? $(options.loader).show() : $(options.loader).hide();
			}
			return this;
		};
		
		this.cache = function () {
			
			jq_results = $(target);
			
			if (typeof options.noResults === "string" && options.noResults !== "") {
				jq_results = jq_results.not(options.noResults);
			}
			
			var t = (typeof options.selector === "string") ? jq_results.find(options.selector) : $(target).not(options.noResults);
			cache = t.map(function () {
				return e.strip_html(this.innerHTML);
			});
			
			rowcache = jq_results.map(function () {
				return this;
			});

			/*
			 * Modified fix for sync-ing "val". 
			 * Original fix https://github.com/michaellwest/quicksearch/commit/4ace4008d079298a01f97f885ba8fa956a9703d1
			 * */
			val = val || this.val() || "";
			
			return this.go();
		};
		
		this.trigger = function () {
			this.loader(true);
			options.onBefore();
			
			window.clearTimeout(timeout);
			timeout = window.setTimeout(function () {
				e.go();
			}, options.delay);
			
			return this;
		};
		
		this.cache();
		this.results(true);
		this.stripe();
		this.loader(false);
		
		return this.each(function () {
			
			/*
			 * Changed from .bind to .on.
			 * */
			$(this).on(options.bind, function () {
				
				val = $(this).val();
				e.trigger();
			});
		});
		
	};

}(jQuery, this, document));
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
			// clean last search
			$(selectInscAlumnos).find('option:not(:selected)').remove();
	        // append data
	        datos.forEach(function(persona) {
	        	// check if option exist
	        	if($(selectInscAlumnos).find('option[value="'+persona.codpersona+'"]:selected').length > 0) {
	        		return false;
	        	}
	        	// append new option
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

	// init multiselect
    $(selectInscAlumnos).multiSelect({
		selectableHeader: "<div class='select-insc-header'>Alumnos Disponibles</div>",
		selectionHeader:  "<div class='select-insc-header'>Alumnos A Inscribir</div>",
		selectableFooter: "<input type='text' class='select-insc-footer clearable' autocomplete='off' placeholder='Filtrar'>",
  		selectionFooter:  "<input type='text' class='select-insc-footer clearable' autocomplete='off' placeholder='Filtrar'>",
  		afterInit: function(container) {
			var localThis = this,
			$selectableSearch = localThis.$selectableUl.next(),
			$selectionSearch  = localThis.$selectionUl.next(),
			selectableSearchString = '#'+localThis.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
			selectionSearchString  = '#'+localThis.$container.attr('id')+' .ms-elem-selection.ms-selected';
			// do the search
	    	localThis.qs1 = $selectableSearch.quicksearch(selectableSearchString).on('change', function() {
	    		localThis.qs1.search(this.value);
	    	});
			localThis.qs2 = $selectionSearch.quicksearch(selectionSearchString).on('change', function() {
	    		localThis.qs2.search(this.value);
	    	});
  		},
  		afterSelect: function() {
			this.qs1.cache();
			this.qs2.cache();
		},
		afterDeselect: function() {
			this.qs1.cache();
			this.qs2.cache();
		}
    });

}($));
/**
 * This module is responsible for clean button filter
 * 
 */
(function($) {

	"use strict";

	function tog(v) {
		return v ? 'addClass' : 'removeClass'; 
	}

	$(document).on('input', '.clearable', function() {
    	$(this)[tog(this.value)]('x');
	}).on('mousemove', '.x', function( e ){
		$(this)[tog(this.offsetWidth - 30 < e.clientX-this.getBoundingClientRect().left)]('onX');
	}).on('touchstart click', '.onX', function( ev ) {
		ev.preventDefault();
	    $(this).removeClass('x onX').val('').change();
	});

}($));