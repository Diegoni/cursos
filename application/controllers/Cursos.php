<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cursos extends MY_Controller 
{
    protected $_subject = 'cursos';                 // Nombre con el que se va a identificar el modulo
    protected $_model   = 'm_cursos';               // Modelo principal, la vista tabla automatica
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function abm($id = NULL)                              // Funcion para abm
    {                           
        $db['campos']   = array(
            array('campo',    'restricciones', 'tags'), // cargar un input
            array('checkbox', 'campo'),                 // cargar un checkbox
        );

        $this->armarAbm($id, $db);                     // Envia todo a la plantilla de la pagina
    }
}
?>