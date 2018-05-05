<?php
/**
 * @author Javier Marin (jmarin@aden.org)
 */
class Sedes_model extends MY_Model{
    function __construct(){
        parent::__construct($tablename	= 'SIS.Sedes', $id_table = 'codSede');
    }
}
