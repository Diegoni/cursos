<?php
class Usuarios_model extends MY_Model{
    function __construct(){
        parent::__construct($tablename	= 'SIS.Usuarios', $id_table = 'codUsuario');
    }
    function getByCorreo($correo=""){
        $this->db->select("$this->_tablename.*");
        $this->db->select('SIS.Roles.permisos');
        $this->db->from("$this->_tablename");
        $this->db->join('SIS.Roles',"$this->_tablename.rol=SIS.Roles.codRol");
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
/////////////////////////////////////////////
//////FIN