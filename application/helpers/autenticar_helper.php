<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

function getUserId() {
    $CI =& get_instance();
    return $CI->autenticar->getUserId();
}

function getCategoria_id() {
    $CI =& get_instance();
    return $CI->autenticar->getCategoria_id();
}

function getPerms() {
    $CI =& get_instance();
    return $CI->autenticar->getPerms();
}
function getUserImage() {
    $CI =& get_instance();
    return $CI->autenticar->getUserImage();
}
function permiso($caracteristica){
    $CI =& get_instance();
    return $CI->autenticar->permiso($caracteristica);
}
function puedeEditar($user_id="",$post_id="",$tipo=""){
    // @TODO revisar
    $CI =& get_instance();
    if(!getPerms()){
        return false;
    }

    $CI->db->select('user_id');
    $CI->db->from('posts');
    $CI->db->where("id",$post_id);
    $CI->db->where("user_id",$user_id);
    $CI->db->limit(1);
    $query = $CI->db->get();
    $resultado=$query->row_array();
    if($resultado){
            return true;
    }else{
            return false;
    }
}

function salir(){
    redirect('login/logout');
}

/////////////////////////////////////////////
//////FIN