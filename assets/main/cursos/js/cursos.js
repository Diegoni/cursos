/*! @ cursos - v1.0.0 - 2018-04-02 | (c) 2018 Cristian Nieto - Diego Nieto !*/

(function($) 
{

	"use strict";

	// string mapping
	var eventHandler = 'click';
	var rowClass = 'cursos-row';
	// get DOM elements
	var elements = document.getElementsByClassName(rowClass);

	// remove and add event handler
	$(elements).off(eventHandler);
	$(elements).on(eventHandler, function(event) {
		// get datatable data
		var dataTable = getTable();
		var rowData = dataTable.row(this).data();
		// set window path location
		var pathName = window.location.pathname;
		var controller = '/curso/' + rowData[0];
		// check if need to open or just focus window
		openJustOnce(pathName + controller, 'CURSO' + rowData[0]);
	});

	/**
	 * Comprueba si el curso ya fue abierto en una pestaña
	 * para no volver a abrirlo.
	 * 
	 * @param {string} url (url con la que se abre el curso)
	 * @param {string} target (nombre que se le asigna a la página)
	 */
	function openJustOnce(url, target) {
		// open a blank "target" window
		// or get the reference to the existing "target" window
		var winref = window.open('', target, '', true);
		// if the "target" window was just opened, change its url
		if( winref.location.href === 'about:blank' ) {
			winref.location.href = url;
		} else {
			winref.focus();
		}
		// return window object
		return winref;
	}

}($));