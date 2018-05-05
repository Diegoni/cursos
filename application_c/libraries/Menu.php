<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Menu
 *
 * @author Javier Marin (jmarin@aden.org)
 */

class Menu{
    private $titulo;
    protected $items=array();
    
    function __construct($titulo=''){
        $this->titulo = $titulo;
    }
    
    function agregaItem($item){
        $this->items[] = $item;
    }
    
    function render(){
        echo "\t\t".'<ul class="sidebar-menu" data-widget="tree"><!-- Sidebar Menu -->'."\n";
        echo "\t\t\t".'<li class="header">'.$this->titulo.'</li>'."\n";
        // Procesa los items que contenga
        foreach ($this->items as $item) {
            $item->render(1);
        }
        echo "\t\t</ul><!-- /.sidebar-menu -->\n";
    }
}

class MenuItem extends Menu{
    private $texto='';
    private $icono='';
    private $href='';
    
    function __construct($texto="", $icono="", $href=""){
        parent::__construct('');
        
        $this->texto = $texto;
        $this->icono = $icono;
        $this->href = $href;
    }

    function render($nivel=1){
        $tabs=str_repeat("\t", $nivel*2+1);

        
        if(empty($this->items)){
            echo $tabs.'<li>'."\n";
            echo $tabs."\t".'<a href="'.$this->href.'">';
        }else{
            echo $tabs.'<li class="treeview">'."\n";
            echo $tabs."\t".'<a href="#">';
        }
        
        if(!empty($this->icono)){
            echo '<i class="'.$this->icono.'"></i>';
        }
        echo '<span>'.$this->texto."</span>\n";
        if(!empty($this->items)){
            echo $tabs."\t\t".'<span class="pull-right-container">'."\n";
            echo $tabs."\t\t\t".'<i class="fa fa-angle-left pull-right"></i>'."\n";
            echo $tabs."\t\t</span>\n";
        }
        echo $tabs."\t</a>\n";
        if(!empty($this->items)){
            echo $tabs."\t".'<ul class="treeview-menu">'."\n";
            foreach($this->items as $item){
                $item->render($nivel+1);
            }
            echo $tabs."\t</ul>\n";
        }

        echo $tabs."</li>\n";
    }
}
