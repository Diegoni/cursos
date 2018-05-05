<?php
/**
 * Description of Personas_model
 *
 * @author Javier Marin (jmarin@aden.org)
 */
class Personas_model extends MY_Model{
    function __construct(){
        parent::__construct($tablename	= 'dbo.Personas', $id_table = 'id');
    }
    
    function getCount($filtros = array()){
        if(empty($filtros)){
            parent::getCount();
        }else{
            $this->db->select('count(*)');
            $this->db->from('dbo.PersonasClientes PC');
            $this->db->join('dbo.Personas P', 'P.id=PC.codPersona');
            $this->db->join('ClientesJerarquias CJ', 'PC.codCliente=CJ.codCliente');
            foreach($filtros as $filtro){
                $this->db->where($filtro);
            }
            $query = $this->db->get();
            $result =  $query->row_array();
            return reset($result);
        }
    }
        /*
        select P.nombre, P.apellido, CJ.codJerarquia from PersonasClientes PC
inner join Personas P on P.id = PC.codPersona
inner join ClientesJerarquias CJ on PC.codCliente = CJ.codCliente
where P.eliminado=0 and codJerarquia=111*/
}