<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sedes extends MY_Controller 
{
	protected $_subject = 'sedes';                 // Nombre con el que se va a identificar el modulo
    protected $_model   = 'm_sedes';               // Modelo principal, la vista tabla automatica
    
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
			array('nombre',    '', 'required'), 
			array('direccion',    '', 'required'), 
			array('telefono',    '', 'required'), 
			array('email',    '', 'required'), 
			array('abreviatura',    '', 'required'), 
			
	    );
        
        $this->armarAbm($id, $db);                     // Envia todo a la plantilla de la pagina
    }
	
	
	function seleccion($id)
	{
		$registros = $this->model->getRegistros($id);
		
		foreach ($registros as $row) 
		{
			$sede['nombre'] = $row->nombre;
			$sede['codSede'] = $row->codSede;
		}
		
		$session = $this->session->userdata('logged_in');
		
		$session['sede'] = $sede;
		
		$this->session->set_userdata('logged_in', $session);
		redirect($this->_subject.'/table/', 'refresh');
	}
}
?>