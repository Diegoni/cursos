<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* -------------------------------------------------------------------------------
INDICE

- getClaseNombre        Devuelve el nombre de la clase con el id
- getTipoGralNombre     Devuelve el nombre de tipo general con el id
- getModalidadNombre    Devuelve el nombre de la modalidad con el id y el arreglo de modalidades
- setSpanEstadoAlumno	Carga el estilo del estado para el alumno
- setCss	       		Para cargar las librerias de CSS 
- setJs     			Para cargar las librerias de JS 

  -------------------------------------------------------------------------------*/


function getClaseNombre($id) 
{
    $nombre = '';

    switch ($id) {
        case 5:
            $nombre = 'Incompany';
            break;
        case 9:
            $nombre = 'Abierto';
            break;
        case 6:
            $nombre = 'Gestión';
            break;
        case 1:
        case 2:
        case 7:
        case 80:
            $nombre = 'Otro';
            break;
        default:
            $nombre = '';
            break;
    }

    return $nombre;
}

function getTipoGralNombre($id) 
{
    $nombre = '';

    switch ($id) {
        case 4:
            $nombre = 'Asignatura Inicio';
            break;
        case 5:
            $nombre = 'Asignatura B2C';
            break;
        case 6:
            $nombre = 'Transversal';
            break;
        case 7:
            $nombre = 'Cronograma';
            break;
        case 8:
            $nombre = 'TFAE';
            break;
        case 9:
            $nombre = 'TFM';
            break;
        case 10:
            $nombre = 'Asignatura B2B';
            break;
        default:
            $nombre = '';
            break;
    }

    return $nombre;
}

function getModalidadNombre($categorias, $id) 
{
    if(empty($categorias) || empty($id)) {
        return "";
    }

    
    foreach($categorias as $categoria) {
        if ($categoria->codcategoria == $id) {
            return $categoria->nombre;
        }
    }
    
    return "";
}

function setSpanEstadoAlumno($estado)
{
	 $abreviatura =	substr($estado['abreviatura'], 0, 3);        
	 switch ($abreviatura) {
	 	case 'TRI': // Traspaso por Incompleto
            $class = 'default';
            break;
	 	case 'TRD': // Traspaso por Desaprobado
            $class = 'default';
            break;
	 	case 'TR ': // Traspaso por Inactividad 
            $class = 'default';
            break;
	 	case 'PI ': // Preinscripto
            $class = 'info';
            break;
	 	case 'E  ': // Egresado
            $class = 'success';
            break;
        case 'I  ': // Interesado
            $class = 'info';
            break;
        case 'P  ': // Potencial
            $class = 'info';
            break;
        case 'B  ': // Baja
            $class = 'danger';
            break;
		case 'BC ': // Baja Confirmada
            $class = 'danger';
            break;
		case 'CW ': // Confirmado Web  
            $class = 'primary';
            break;
		case 'C  ': // Confirmado  
            $class = 'primary';
            break;
        default:
             $class = 'default';
            break;
    }

	return '<span class="label label-'.$class.'">'.$estado['nombre'].'</span>';
}

/*
function setCss($css)
{
	$directorio = base_url().'assets/'.$css;
	return '<link rel="stylesheet" href="'.$directorio.'">';
}



function setJs($js)
{
	$directorio = base_url().'assets/'.$js;
	return '<script src="'.$directorio.'"></script>';
}*/
