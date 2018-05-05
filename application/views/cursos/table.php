<?php

$html = '

<div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        CURSOS
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-university"></i> Cursos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">';

/*--------------------------------------------------------------------------------  
            Comienzo del contenido
 --------------------------------------------------------------------------------*/
 
$cabeceras = array(
	/*
    lang('identificacion_curso'),
    lang('nombre'),
    lang('abreviatura'),
    lang('comienza'),
    lang('finaliza'),
    lang('clase'),
    lang('tipogral'),
    lang('modalidad'),
    */
    lang('identificacion_curso'),
    lang('nombre'),
    lang('edicion').' '.lang('curso'),
   	lang('abreviatura'),
   	lang('comienza'),
    lang('finaliza'),
    lang('duracion'),
    lang('tutor'),
    lang('semanas').' '.lang('teoricas'),
    lang('aula_canvas'),
);

$html .= startContent();

/*if(isset($mensaje)) {
    $html .= setMensaje($mensaje);
}*/


/*--------------------------------------------------------------------------------  
            Tabla
 --------------------------------------------------------------------------------*/
/*if($permiso_editar == 1) {
    $html .= getExportsButtons($cabeceras, tableAdd($subjet));    
} else {
    $html .= getExportsButtons($cabeceras);
}*/

$html .= startTable($cabeceras);

if($registros) {
    foreach ($registros as $row) {
        $registro = array(
        	/*
            $row->id,
            $row->nombre,
            $row->abreviatura,
            $row->fecha,
            $row->fechaFin,
            $row->clase,
            $row->tipogral,
            $row->modalidad
            */
			$row->id,
            $row->nombre,
            $row->edicioncurso,
            $row->abreviatura,
           	$row->fecha,
            $row->fechaFin,
            $row->horas,
            $row->codtutor,
            $row->semanas_teoricas,
            $row->cerrado,            
        );

        $content = setTableContent($registro, "cursos-row");

        $html .= $content;
    }
}

$html .= endTable($cabeceras);

$html .= setDatatables();

/*--------------------------------------------------------------------------------  
            Fin del contenido
 --------------------------------------------------------------------------------*/
 
$html .= endContent();

$html .= setJs('main/cursos/js/cursos.js');

echo $html;

?>