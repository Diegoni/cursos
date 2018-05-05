<?php
/**
 * @author Javier Marin (jmarin@aden.org)
 */
class Cursos_model extends MY_Model{
    function __construct(){
        parent::__construct($tablename	= 'dbo.Cursos', $id_table = 'id');
    }
}
