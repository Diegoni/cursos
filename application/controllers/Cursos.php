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
		$this->load->model('m_estados');
		$this->load->model('m_cursos_alumnos');
		$this->load->model('m_cronogramas');
		$this->load->model('m_materias');
		$this->load->model('m_modulos');
		$this->load->model('m_moduloscursos');
    } 

/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Tabla de registros
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
 

    function index($mensaje = NULL, $db = NULL) 
    {
    	if ($mensaje != NULL) {
            $db['mensaje'] = $mensaje;
        }

        $sedeId = $this->session->userdata('sedeId');

       	if(isset($sedeId))
        {
            $db['registros']   = $this->model->getRegistros($sedeId, 'sede');
        }else
        {
            $db['registros']   = $this->model->getRegistros();
        }   
        $this->armarVista('table', $db);
    }
	
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       No esta en uso, para abm de cursos
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   

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
	
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Datos de un curso
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   

    function curso($id = NULL) 
    {
        $registros = $this->model->getRegistros($id);

        if(!isset($registros)) {
            $this->output->set_status_header(500);
        }

		// POST UPDATE
		if($this->input->post('guardar_curso'))
		{
			$registro = array(
				'nombre'        => $this->input->post('curso_nombre'),
                'abreviatura'   => $this->input->post('curso_abreviatura'),
                'fecha'         => $this->input->post('curso_comienza'),
                'fechaFin'      => $this->input->post('curso_finaliza'),
                'horas'         => $this->input->post('curso_horas'),
                'clase'         => $this->input->post('curso_clase'),
                'tipogral'      => $this->input->post('curso_tipogral'),
                'modalidad'     => $this->input->post('curso_modalidad'),
                'codtutor'      => $this->input->post('curso_tutor'),
                'semanas_teoricas' => $this->input->post('curso_semanas_teoricas'),
			);
			
			$this->model->update($registro, $id);
			
		}

		$db['tutores']    = $this->m_tutores->getRegistros();
		$db['categorias'] = $this->m_categorias->getRegistros();
		$db['alumnos']    = $this->m_cursos_alumnos->getRegistros($id, 'codcurso');
		$db['estados']    = $this->m_estados->getRegistros();

        foreach ($registros as $row) {
            $db['id']              = $row->id;
            $db['nombre']          = $row->nombre;
            $db['abreviatura']     = $row->abreviatura;
            $db['comienza']        = $row->fecha;
            $db['finaliza']        = $row->fechaFin;
            $db['horas']           = $row->horas;
            $db['clase']           = $row->clase;
            $db['tipogral']        = $row->tipogral;
            $db['modalidad']       = $row->modalidad;
            $db['codtutor']        = $row->codtutor;
            $db['curso_canvas']    = $row->canvas_course_id;
            $db['semanasteoricas'] = $row->semanas_teoricas;
            $db['cursocanvas']     = $row->cerrado;
        }

        $this->armarVista('curso', $db);
    }

/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
      Busca los alumnos por nombre o apellido
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   

    function buscarAlumnos() 
    {
    	$buscar_alumno = $this->input->post('buscar_alumnos');
		
		$alumnos = $this->m_alumnos->getAlumnos($buscar_alumno);
		
		$array_personas = array();
		$array_alumnos = array();

		if($alumnos)
		{
			
			foreach ($alumnos as $row) 
			{
				if(!in_array($row->codpersona, $array_personas))
				{
					$array_personas[] = $row->codpersona;
					
					$array_alumnos[] = array(
						'codpersona'=> $row->codpersona,
						'nombre'	=> $row->nombre,
						'apellido'	=> $row->apellido,
					);
				}
			}
		}
		
		echo json_encode($array_alumnos);
	}

/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
      Asigna los alumnos al curso
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   


    function insertAlumnosCursos() 
    {
    	$buscar_alumno = $this->input->post('alumnos_curso');
		
		$array_alumnos = json_decode($buscar_alumno);
		
		foreach ($array_alumnos as $alumno) 
		{
			$insert = array(
				'codpersona'	=> $alumno['codpersona'],
				'codcurso'		=> $alumno['codcurso'],
				'codestado'		=> 1,
				//'fechaa'
				//'fechaactual'
			);
			
			$this->m_cursos_alumnos->insert($insert);
		}
	}
	
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
      Busca los cronogramas de un curso
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   


    function getCronogramas($id = NULL) 
    {
    	if($id != NULL)
    	{
    		// MATERIAS 
    		
    		$materias = $this->m_materias->getRegistros($id, 'codcurso');
			
			$html = "
			SELECT 
				* 
			FROM 
				materias 
			WHERE 
				codcurso = '".$id."' <br>"; 
				
			$materias_array = array();
			
			if($materias)
			{
				$cabeceras = array(
					'id',
					'codcurso',
					'nombre',
					'programa',
					'asistencia',
					'horas',
					'oral',
					'cantrabajo',
					'abreviatura',
					'afecta',
					'tipo',
					'codigo',
					'fechareposicion',
					'TEMP',
					'fecha',    
				);
			
				$html .= startTable($cabeceras);
				
				foreach ($materias as $row) 
				{
					$registro = array(
        				$row->id,
						$row->codcurso,
						$row->nombre,
						$row->programa,
						$row->asistencia,
						$row->horas,
						$row->oral,
						$row->cantrabajo,
						$row->abreviatura,
						$row->afecta,
						$row->tipo,
						$row->codigo,
						$row->fechareposicion,
						$row->TEMP,
						$row->fecha,    
					);
					
					$materias_array[] = $row->id;
					
					$content = setTableContent($registro);

					$html .= $content;
				}
				
				$html .= endTable($cabeceras);
			}else
			{
				$html .= "NO hay materias asociados <br>";
			}
			
			
			// ModulosCursos 
			$moduloscursos = $this->m_moduloscursos->getModulos($id);
			$html .= "<br><br><hr>
			SELECT
				*
			FROM
				ModulosCursos
			INNER JOIN
				Modulos on(ModulosCursos.codmodulo = Modulos.id)
			WHERE
				ModulosCursos.codcurso = '".$id."'' <br>";
			
			if($moduloscursos)
			{
				unset($cabeceras); 
				
				$cabeceras = array(
					'id',
					'codcurso',
					'codmodulo',
				 	'nombre',
				 	'abreviatura',
					'codigo',
				);
				
				$html .= startTable($cabeceras);
				
				foreach ($moduloscursos as $row) 
				{
					$registro = array(
        				$row->id,
						$row->codcurso,
						$row->codmodulo,
						$row->nombre,
						$row->abreviatura,
						$row->codigo,
					);

					$content = setTableContent($registro);

					$html .= $content;
				}
				
				$html .= endTable($cabeceras);
			}else
			{
				$html .= "NO hay modulos asociados <br>";
			}
			
			
			
			$html .= "<br><br><hr>";
			
			//Cronogramas
			
			unset($cabeceras); 
			
			$cabeceras = array(
				'id',
		       'codmateria',
		       'horaI',
		       'horaF',
		       'codprofesor',
		       'autor',
		       'agenda',
		       'codmodulo',
		       'fechaemision',
		       'observaciones',
		       'confirmado',
		       'tipo',
		       'fechaI',
		       'fechaF',
			);
			
			foreach ($materias_array as $key => $value) 
			{
				$html .= "
				<br><hr>
				SELECT 
					* 
				FROM 
					materias 
				WHERE 
					codcurso = '".$value."' <br>"; 
					
				$cronogramas = $this->m_cronogramas->getRegistros($value, 'codmateria');
				
				if($cronogramas)
				{
					$html .= startTable($cabeceras);
					
					foreach ($cronogramas as $row) 
					{
						$registro = array(
	        			   $row->id,
					       $row->codmateria,
					       $row->horaI,
					       $row->horaF,
					       $row->codprofesor,
					       $row->autor,
					       $row->agenda,
					       $row->codmodulo,
					       $row->fechaemision,
					       $row->observaciones,
					       $row->confirmado,
					       $row->tipo,
					       $row->fechaI,
					       $row->fechaF,
						);
	
						$content = setTableContent($registro);
	
						$html .= $content;
					}
					
					$html .= endTable();
					
				}else
				{
					$html .= "NO hay cronogramas asociados <br>";
				}
				
			}
			
			echo $html;
		}
	}
}
?>