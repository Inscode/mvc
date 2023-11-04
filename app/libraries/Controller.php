<?php
    class Controller{
        //load the model

        public function model($model){
            require_once '../app/models/'.$model.'.php';

            //Instantiate the controller and pass it to the member variable
            return new $model();

        }

        //load the view

        public function view($view, $data = []){

            if(file_exists('../app/views/'.$view.'.php')){
                require_once '../app/views/'.$view.'.php';
            }
            else{
                die('corresponding view does not exist');
            }

        }
    }



?>