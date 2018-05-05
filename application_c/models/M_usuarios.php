<?php
class m_usuarios extends MY_Model
{
    protected $_tablename	= 'usuarios';        // Nombre de la tabla
	protected $_id_table	= 'codUsuario';     // Id de la tabla
	protected $_order		= 'nombre';        // Orden de la tabla
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
            
       Comprueba si usuario y pass coinciden
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/ 
		
	
	function login($username, $password)
	{
		//$password = encrypt($password);
        $correo = $password;
		
		$sql = 
		"SELECT 
			*
		FROM 
			$this->_tablename
		WHERE
			nombre  = '$username' AND
			correo = '$password' ";
		
		return $this->getQuery($sql);
	}
}