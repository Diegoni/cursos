<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sede
 *
 * @author Javier Marin (jmarin@aden.org)
 */
class Sede extends My_Controller{
    function index($sedeId=0){
        if(!$sedeId){
            show_404();
            return;
        }

        if(!getUserId()){
            salir();
        }
        
        $sede = $this->sedes_model->getById($sedeId);
        $this->session->sedeNombre = $sede['nombre'];
        $this->session->sedeId = $sedeId;

        $data = [
            'nombre'                => $sede['nombre'],
            'img'                   => $sede['img'],
            'nPersonas'             => $this->personas_model->getCount(['eliminado=0', 'codJerarquia='.$sedeId]),
            'nCursosIC'             => $this->cursos_model->getCount(['clase=5', 'sede='.$sedeId]),                                 // cursos IC
            'nCursosICAnioActual'   => $this->cursos_model->getCount(['clase=5', 'sede='.$sedeId, "fecha>='".date('Y')."-01-01'"]), // cursos IC año actual
            'nCursosPA'             => $this->cursos_model->getCount(['clase<>5', 'sede='.$sedeId]),                                // cursos PA
            'nCursosPAAnioActual'   => $this->cursos_model->getCount(['clase<>5', 'sede='.$sedeId, "fecha>='".date('Y')."-01-01'"]) // cursos PA año actual
        ];
        
        $this->cargaVistaDecorada("sede", $data);
    }
}