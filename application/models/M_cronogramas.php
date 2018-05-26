<?php
class m_cronogramas extends MY_Model
{
    protected $_tablename	= 'Cronograma';
	protected $_id_table	= 'id';     	
	protected $_order		= 'codmateria';
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