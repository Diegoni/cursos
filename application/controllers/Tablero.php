<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Tablero general
 *
 * @author jmarin
 */
class Tablero extends My_Controller{
    function index(){
        if(!getUserId()){
            salir();
        }

        $data = [
            'numeroPersonas'    => $this->personas_model->getCount(['eliminado = 0']),
            'numeroUsuarios'    => $this->usuarios_model->getCount()
        ];
        $this->cargaVistaDecorada("tableroGeneral", $data);
    }
}
