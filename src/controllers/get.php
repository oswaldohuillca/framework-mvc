<?php
namespace src\controllers;
use src\controllers\router;
use src\config\template;

class get extends router {
    private $currentSession;
    public function __construct(){
        session_start();
        $this->run();
    }

    public function run(){       

        parent::request("/",function(){
            $main = new template("src/views/home.phtml");
            $this->printTemplate(["main"=>$main]);
        });
        

        parent::request("/productos",function(){

            $main = "productos";
            $this->printTemplate(["main"=>$main]);
        });

        parent::request("/productos/:id",function($id){
            $this->printTemplate(["main"=>$id]);
        });

        parent::request("/login",function(){
            echo "LOGIN";
        });
        
    }


    //METODOS PARA MEJORAR EL RENDIMIENTO
    public function printTemplate($data=["main"=>"contenido aqui"]){
        //$dataUser = ["dataUser"=>$this->getUserSession()[0]];
        $data+=["uri"=>$_SERVER["REQUEST_URI"]];
        $template = new template("src/views/template.phtml",$data);
        echo $template;
    }
    
    
}