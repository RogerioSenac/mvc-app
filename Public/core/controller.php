<?php
class Controller{
    //Metodo para carregar o modelo
    public function models($model) {
        //Requerer o arquivo do modelo
        require_once '../app/Models/'.$model.'.php';
        //Retorna uma nova instancia do modelo
        return new $model();
    }
    //Metodo para carregar a view
    public function view($view, $data=[]){
        //Requerer o arquivo da view
        require_once '../app/Views/'.$view.'.php';
    }
}
?>