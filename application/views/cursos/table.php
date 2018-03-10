<?php
/*--------------------------------------------------------------------------------  
            Comienzo del contenido
 --------------------------------------------------------------------------------*/
 
$cabeceras = array(
    lang('identificacion_curso'),
    lang('nombre'),
    lang('abreviatura'),
    lang('comienza'),
    lang('finaliza'),
    //lang('clase'),
    lang('tipo_gral'),
    lang('modalidad'),
    //lang('aula_canvas'),
    //lang('curso_canvas'),

    //Clase (Tipo)
    //Aula Canvas (acredita)
    //Curso Canvas (cerrado)
);

$html = startContent();

if(isset($mensaje)){
    $html .= setMensaje($mensaje);
}

/*--------------------------------------------------------------------------------  
            Tabla
 --------------------------------------------------------------------------------*/

if($permiso_editar == 1)
{
    $html .= getExportsButtons($cabeceras, tableAdd($subjet));    
}else
{
    $html .= getExportsButtons($cabeceras);
}

$html .= startTable($cabeceras);

if($registros)
{
    foreach ($registros as $row) 
    {
        $registro = array(
            /*          ---- Array con los valores de la fila
            $row->nombre,
            $row->apellido,
            tableUpd($subjet, $row->id_usuario),
            */
        );
        
        $html .= setTableContent($registro);    
    }
}
            
$html .= endTable($cabeceras);         
$html .= setDatatables();           

/*--------------------------------------------------------------------------------  
            Fin del contenido
 --------------------------------------------------------------------------------*/
 
$html .= endContent();

echo $html;
?>