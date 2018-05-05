<?php 
class m_cursos_alumnos extends MY_Model 
{
    protected $_tablename   = 'PersonasEC';     // Nombre de la tabla
    protected $_id_table    = 'id';         // Id de la tabla
    protected $_order       = 'id';         // Orden de la tabla
    protected $_relation    = array(       // Relacion con otras tablas
        'codpersona' => array(                     // Campo de relacion
            'table'     => 'vSearchPersonas',           // Tabla de la relacion
            'subjet'    => 'nombre'            // Campo de la otra tabla de relacion
        ),
    );
	
    function __construct()
    {
        parent::__construct(
            $tablename      = $this->_tablename, 
            $id_table       = $this->_id_table, 
            $order          = $this->_order,
            $relation       = $this->_relation
        );
    }
} 
?>