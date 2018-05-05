<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tableros extends My_Controller
{
	protected $_subject = 'tableros';
    protected $_model   = 'm_personas'; // ver si esta bien
	
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
            
        Funcion Principal
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/  
	
    function index(){
		$data = array(
            //'numeroPersonas'    => $this->m_personas->getCount(array('eliminado = 0')),
            'numeroPersonas'    => $this->m_personas->getCount(array('P.eliminado = 0')),
            'numeroUsuarios'    => $this->m_usuarios->getCount(),
        );
        $this->armarVista("tableroGeneral", $data);
    }
}
