<?php
/**
 * Description of VPersonas_model
 *
 * @author Javier Marin (jmarin@aden.org)
 */
class VSearchPersonas_model extends MY_Model{
    function __construct(){
        parent::__construct($tablename	= 'SIS.vSearchPersonas', $id_table = 'codpersona');
    }

    /**
     * Obtiene registros de la tabla para armar una fuente
     * de DataTable
     * @param array $opciones de la DataTable
     * @return array
     */
    function getDataTable($opciones=array()){
        // @TODO completar
        $default = [
            'start'         => 0,
            'length'        => 10,
        ];

        $opciones = array_merge($default, $opciones);

        // Selecciona los campos requeridos
        foreach($opciones['campos'] as $campo){
            $this->db->select($campo);
        }
        $this->db->from($this->_tablename);
        $this->filtrarDataTable($opciones);

        // Ordena según lo requerido
        foreach($opciones['order'] as $orden){
            $campo = $opciones['campos'][$orden['column']];
            $direccion = $orden['dir'] == 'desc' ? 'desc' : 'asc';
            $this->db->order_by($campo, $direccion);
        }

        $this->db->limit($opciones['length'], $opciones['start']);
        $query = $this->db->get();
        $sql=$this->db->last_query();

        /**
         * Quita las claves (nombre de campos) a los
         * resultados de la consulta
         */
        $result_array=[];
        foreach($query->result_array() as $row){
            $result_array[] = array_values($row);
        }
        /********************************************/
        $this->db->reset_query();
        $this->filtrarDataTable($opciones);
        $this->db->from($this->_tablename);

        $resultado = [
            'recordsFiltered' => $this->db->count_all_results(),
            'result_array'  => $result_array
        ];

        return $resultado;
    }

    private function filtrarDataTable($opciones=array()){
        $this->db->where('codsede', $opciones['sede']);
        
        // Aplica filtros de búsqueda
        $this->db->group_start();
        foreach($opciones['search'] as $busqueda){
            foreach($opciones['campos'] as $campo){
                $this->db->or_like($campo, $busqueda);
            }
        }
        $this->db->group_end();
    }
        /*
        select P.nombre, P.apellido, CJ.codJerarquia from PersonasClientes PC
inner join Personas P on P.id = PC.codPersona
inner join ClientesJerarquias CJ on PC.codCliente = CJ.codCliente
where P.eliminado=0 and codJerarquia=111*/
}
