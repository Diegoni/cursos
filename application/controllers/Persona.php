<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Persona
 *
 * @author Javier Marin (jmarin@aden.org)
 */
class Persona extends My_Controller{
    function index(){
        if(!getUserId()){
            salir();
        }
        
        /*$sede = $this->sedes_model->getById($sedeId);
        $this->session->sedeNombre = $sede['nombre'];
        $this->session->sedeId = $sede['sedeId'];

        $data = [
            'nombre'                => $sede['nombre'],
            'img'                   => $sede['img'],
            'nPersonas'             => $this->personas_model->getCount(['eliminado=0', 'codJerarquia='.$sedeId]),
            'nCursosIC'             => $this->cursos_model->getCount(['clase=5', 'sede='.$sedeId]),                                 // cursos IC
            'nCursosICAnioActual'   => $this->cursos_model->getCount(['clase=5', 'sede='.$sedeId, "fecha>='".date('Y')."-01-01'"]), // cursos IC año actual
            'nCursosPA'             => $this->cursos_model->getCount(['clase<>5', 'sede='.$sedeId]),                                // cursos PA
            'nCursosPAAnioActual'   => $this->cursos_model->getCount(['clase<>5', 'sede='.$sedeId, "fecha>='".date('Y')."-01-01'"]) // cursos PA año actual
        ];*/
        
        $data = [
            'nombre'                => $this->session->sedeNombre,
            'sedeId'                => $this->session->sedeId
        ];

        $this->cargaVistaDecorada("persona", $data);
    }

    function ajax(){
        if(!getUserId()){
            salir();
        }

        $opciones = [
            'campos'            => [
                'codpersona',
                'apellido',
                'nombre',
                'emailparticular',
                'tellaboral',
                'fecha_alta',
                'login_id',
                'puntos',
                'estadopersona'
            ],
            'start'             => (int)$this->input->get_post('start'),
            'length'            => (int)$this->input->get_post('length'),
            'search'            => $this->input->get_post('search'),
            'order'             => $this->input->get_post('order'),
            'sede'              => $this->session->sedeId
        ];

        $this->load->model('vSearchPersonas_model');
        $resultados = $this->vSearchPersonas_model->getDataTable($opciones);
        $data = [
            'draw'              => (int)$this->input->get_post('draw'),
            'recordsTotal'      => $this->vSearchPersonas_model->getCount(['codsede='.$this->session->sedeId]),
            'recordsFiltered'   => $resultados['recordsFiltered'],
            'data'              => $resultados['result_array']
        ];
        
        echo json_encode($data);
    }
}