<?php 
class m_cursos extends MY_Model 
{
	protected $_tablename	= 'cursos';     // Nombre de la tabla
	protected $_id_table	= 'id';         // Id de la tabla
	protected $_order		= 'id';         // Orden de la tabla
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
} 
?>