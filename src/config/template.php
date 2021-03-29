<?php
namespace src\config;
class template{
    private $template;
    public function __construct($path,$data = []){
        extract($data);
        ob_start();
        include_once($path);
        $this->template = ob_get_clean();
    }
    public function __toString(){
        return $this->template;
    }
}