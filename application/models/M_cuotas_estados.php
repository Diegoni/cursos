<?php 
class m_cuotas_estados extends MY_Model 
{		
	protected $_tablename	= 'cuotas_estados';
	protected $_id_table	= 'id_estado';
	protected $_order		= 'estado';
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