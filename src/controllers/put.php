<?php
namespace src\controllers;
use src\controllers\router;
use src\config\template;

class put extends router{
    public function __construct (){
        $this->run();
    }
    public function run(){
        parent::request("/siseeg/api/profile/update/:id",function($id){
            parse_str(file_get_contents("php://input"),$_PUT);
            $data = json_decode(file_get_contents('php://input'), true);
            //print_r($data);
            if (isset($data)) {
                extract($data);
            }
            header("Content-Type:application/json");
            
            $res = [
                "id"=>$id,
                "data"=>isset($_PUT["username"])?$_PUT["username"]:$username
            ];
            echo json_encode($res);
        });



    }
    //METODOS PARA MEJORAR EL RENDIMIENTO
    public function printTemplate($data){
        $template = new template("src/views/template.html",$data);
        echo $template;
    }
   

}