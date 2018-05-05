<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sedes extends My_Controller
{
	protected $_subject = 'sedes';
    protected $_model   = 'm_sedes'; // ver si esta bien
	
	function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model');  
		$this->load->model('m_cursos');  

    } 
	
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
        Funcion Principal
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/  
    function index($sedeId=0){
        /*
        if(!$sedeId){
            show_404();
            return;
        }
        */
        $sedeId = 10;
        $sede = $this->model->getRegistros($sedeId);
        $this->session->sedeNombre = $sede['nombre'];
        $this->session->sedeId = $sedeId;

        $data = array(
            'nombre'                => $sede['nombre'],
            'img'                   => $sede['img'],
            'nPersonas'             => $this->m_personas->getCount(array('eliminado=0', 'codJerarquia='.$sedeId)),
            'nCursosIC'             => $this->m_cursos->getCount(array('clase=5', 'sede='.$sedeId)),                                 // cursos IC
            'nCursosICAnioActual'   => $this->m_cursos->getCount(array('clase=5', 'sede='.$sedeId, "fecha>='".date('Y')."-01-01'")), // cursos IC año actual
            'nCursosPA'             => $this->m_cursos->getCount(array('clase<>5', 'sede='.$sedeId)),                                // cursos PA
            'nCursosPAAnioActual'   => $this->m_cursos->getCount(array('clase<>5', 'sede='.$sedeId, "fecha>='".date('Y')."-01-01'")) // cursos PA año actual
        );
        
        $this->armarVista("sedes", $data);
    }
}