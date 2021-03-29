<?php
namespace src\controllers;
use src\controllers\router;
use src\config\template;



class post extends router{
    public function __construct (){
        session_start();
        $this->run();       
    }
    public function run(){

        parent::request("/productos",function(){
            echo "POST";
            
        });
        


    }
    //METODOS PARA MEJORAR EL RENDIMIENTO
    public function printTemplate($data){
        $template = new template("src/views/template.html",$data);
        echo $template;
    }

}