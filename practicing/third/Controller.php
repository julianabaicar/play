<?php
require "View.php";
require "Model.php";

class Controller
{
    // junção das duas classes
    // passar a string da Model na View
    // e a view vai retornar o print na tela
    public function index()
    {
        $model= new Model();
        $view= new View();
        $string= $model->get_string();
        $view->render($string);
    }
}