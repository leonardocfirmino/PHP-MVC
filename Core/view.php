<?php
Namespace Core;
use Core\database;

class view{
    public function loadView($title,$view){
        $title = $title;
        $page = $view;
        include("View/template.php");
    }
    public function loadViewData($title,$view,$data = array()){
        $title = $title;
        $page = $view;
        $data = $data;
        include("View/template.php");
    }
    public function loadModal($modal){
        include($modal.".php");
    }
    public function loadModalData($modal,$data){
        $data = $data;
        include($modal.".php");
    }
}