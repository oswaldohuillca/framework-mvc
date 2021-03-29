<?php
namespace src\controllers;
use src\controllers\router;
use src\config\template;

class delete extends router{
    public function __construct(){
        $this->run();
    }
    public function run(){
        parent::request("/productos/eliminar/:id",function($id){
            $objProducts = new products;
            $deleted = $objProducts->deleteProduct(intval($id));
            if ($deleted) {
               echo "eliminado";
            }else{
                echo "nada";
            }
            echo "asdasd";
        });
    }
}