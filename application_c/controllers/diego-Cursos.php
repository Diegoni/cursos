<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cursos extends MY_Controller 
{
    protected $_subject = 'cursos';                 // Nombre con el que se va a identificar el modulo
    protected $_model   = 'm_cursos';               // Modelo principal, la vista tabla automatica
    
    function __construct() {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model');
		$this->load->model('m_categorias');
		$this->load->model('m_tutores');
		$this->load->model('m_alumnos');
		$this->load->model('m_cursos_alumnos');		
    }  

    function index($mensaje = NULL, $db = NULL) {

        if ($mensaje != NULL) {
            $db['mensaje'] = $mensaje;
        }

        $session = $this->session->userdata('logged_in');

        $db['registros'] = (isset($session['sede'])) ?  $this->model->getRegistros($session['sede']['codSede'], 'sede') : $this->model->getRegistros();

        $this->armarVista('table', $db);
    }

    function abm($id = NULL) {

        $db['campos']   = array(
            array('nombre', '', 'required'),
            array('modalidad', '', 'required'),
            array('abreviatura', '', ''),
            array('fecha', '', ''),
            array('fechaFin', '', ''),
            array('tipogral', '', ''),
        );

        $this->armarAbm($id, $db);
    }

    function curso($id = NULL) {

        $registros = $this->model->getRegistros($id);

        if(!isset($registros)) {
            $this->output->set_status_header(500);
        }

		$db['tutores']    = $this->m_tutores->getRegistros();
		$db['categorias'] = $this->m_categorias->getRegistros();
		$db['alumnos'] = $this->m_cursos_alumnos->getRegistros($id, 'codcurso');
		
		if($this->input->post('guardar_curso'))
		{
			$registro = array(
				'nombre' => $this->input->post('curso_nombre'),
				'abreviatura' => $this->input->post('curso_abreviatura'),
				'fecha'	=> $this->input->post('curso_comienza'),
				'fechaFin'	=> $this->input->post('curso_finaliza'),
				'tipogral'	=> $this->input->post('curso_tipogral'),
				'modalidad'	=> $this->input->post('curso_modalidad'),
			);
			
			$this->model->update($registro, $id);
			
		}

        foreach ($registros as $row) {
            $db['id']          = $row->id;
            $db['nombre']      = $row->nombre;
            $db['abreviatura'] = $row->abreviatura;
            $db['comienza']    = $row->fecha;
            $db['finaliza']    = $row->fechaFin;
            $db['tipogral']    = $row->tipogral;
            $db['modalidad']   = $row->modalidad;
        }

        $this->armarVista('curso', $db);
    }
}
?>