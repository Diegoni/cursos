<?php
class m_categorias extends MY_Model
{
    protected $_tablename	= 'categoria';
	protected $_id_table	= 'codcategoria';     	
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
}