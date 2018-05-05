<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class Autenticar {
    private $CI;

    // Son los permisos que requiere la aplicacion
    private $caracteristica = [
        'Configuracion'     => 0x10,
        'Borrar'            => 0x08,
        'Agregar'           => 0x04,
        'Editar'            => 0x02,
        'SoloPropias'       => 0x01
    ];

    function Autenticar(){
        $this->CI =& get_instance();
        log_message('debug', 'Authorization class initialized.');
    }

    function tryLogin($correo){
        $datosUsuario = $this->CI->usuarios_model->getByCorreo($correo);

        if($datosUsuario){
            ///graba los datos en la session
            $datos=[
                'user_id'   => $datosUsuario['codUsuario'],
                'perms'     => $datosUsuario['permisos']
            ];
            $this->CI->session->set_userdata($datos);
            return TRUE;
        }else{
            return false;
        }
    }

    function logout(){
        $datos=[
            'user_id'   =>'',
            'perms'     =>'',
            'image'     =>'',
            'sedeNombre'=>'',
            'sedeId'    =>''
        ];
        $this->CI->session->unset_userdata($datos);
        $this->CI->session->sess_destroy();
    }

    function getUserId(){
        return $this->CI->session->userdata('user_id');
    }

    function getPerms(){
        return $this->CI->session->userdata('perms');
    }

    function getUserImage(){
        return $this->CI->session->userdata('image');
    }

    function permiso($caracteristica){
        if($this->getUserId() and $this->getPerms()){
            if($this->caracteristica[$caracteristica] & $this->getPerms()){
                log_message('debug', "autenticar.php: permiso($caracteristica)=true");
                return true;
            }else{
                log_message('debug', "autenticar.php: permiso($caracteristica)=false");
                return false;
            }
        }else{
            return false;
        }
    }
}
/////////////////////////////////////////////
//////FIN