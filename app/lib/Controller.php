<?php

// main controller class
// loading the models and views

class Controller 
{
    // load model
    public function model($model) 
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) 
    {
        // load view
        if(file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('File View does not exists');
        }
    }
}

?>