<?php
class m_usuarios extends MY_Model
{
    protected $_tablename	= 'SIS.Usuarios';        // Nombre de la tabla
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

	function getByCorreo($correo=""){
        $this->db->select("$this->_tablename.*");
        $this->db->select('SIS.Roles.permisos');
        $this->db->from("$this->_tablename");
        $this->db->join('SIS.UsuariosRoles',"$this->_tablename.codUsuario=SIS.UsuariosRoles.usuario");
				$this->db->join('SIS.Roles',"Roles.codRol=SIS.UsuariosRoles.rol");
				$this->db->where('correo',$correo);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getById($id=0){
        $this->db->select("$this->_tablename.*");
        $this->db->select('SIS.Roles.permisos');
        $this->db->from("$this->_tablename");
        $this->db->join('SIS.Roles',"$this->_tablename.rol=SIS.Roles.codRol");
        $this->db->where("$this->_id_table",$id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getRolById($id=0){
        $this->db->select('*');
        $this->db->from('SIS.Roles');
        $this->db->where('codRol',$id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function insertRol($datos=array()){
        $this->db->insert("SIS.Roles",$datos);  
    }

    function updateRolById($id,$datos=array()){
        $this->db->where('codRol',$id);
        $this->db->update('SIS.Roles',$datos);
    }
    
    function updateByCorreo($correo,$datos=array()){
        $this->db->where('correo',$correo);
        $this->db->update("$this->_tablename",$datos);
    }
    
}