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
        
        $this->load->model($this->_model, 'model');
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function abm($id = NULL)
    {
        $db['campos']   = array(
            array('nombre', '', 'required'),
            array('abreviatura', '', ''),
            array('fecha', '', ''),
            array('fechaFin', '', ''),
            array('tipogral', '', ''),
            array('modalidad', '', ''),
        );

        $this->armarAbm($id, $db);
    }
	

/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
        Función para armar las vistas de tablas
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/

 	function table($mensaje = NULL, $db = NULL)
    {
    	if($mensaje != NULL) 
        {
            $db['mensaje'] = $mensaje;
        }
		
		$session = $this->session->userdata('logged_in');
		
		if(isset($session['sede']))
		{
			$db['registros']   = $this->model->getRegistros($session['sede']['codSede'], 'sede');
			}else
		{
			$db['registros']   = $this->model->getRegistros();
		}	
        
        
        $this->armarVista('table', $db);
 	}

    function tabla($mensaje = NULL)
    {
        
    }

}
?>