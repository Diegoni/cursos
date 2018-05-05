<?php
class m_alumnos extends MY_Model
{
    protected $_tablename	= 'SIS.vSearchPersonas';
	protected $_id_table	= 'codpersona';     	
	protected $_order		= 'nombre';
	protected $_relation    = '';
		
	function __construct()
	{
		parent::__construct(
			$tablename		= $this->_tablename, 
			$id_table		= $this->_id_table, 
			$order			= $this->_order,
			$relation		= $this->_relation
		);
	}
	
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Datos de un curso
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   

    function buscarAlumnos($buscar_alumno) 
    {
    	$sql = "
		SELECT
			codpersona,
			nombre,
			apellido
		FROM
			SIS.vSearchPersonas
		WHERE ";
			
    	$array_busqueda = explode(' ', $buscar_alumno);
		
		if($array_busqueda)
		{
			foreach ($array_busqueda as $busqueda) 
			{
				$sql .= " nombre LIKE '%".$buscar_alumno."%' OR
				apellido LIKE '%".$buscar_alumno."%' OR";
			}
			
			$sql = substr($sql, 0, -2);
			
			return $this->getQuery($sql);
		}else
		{
			return FALSE;
		}
	}
}