<?php
class m_moduloscursos extends MY_Model
{
    protected $_tablename	= 'ModulosCursos';
	protected $_id_table	= 'id';     	
	protected $_order		= 'codcurso';
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
	
	
	function getModulos($codcurso)
	{
		$sql = "
		SELECT
			*
		FROM
			ModulosCursos
		INNER JOIN
			Modulos on(ModulosCursos.codmodulo = Modulos.id)
		WHERE
			ModulosCursos.codcurso = '".$codcurso."'
		";
		
		return $this->getQuery($sql);
	}
}