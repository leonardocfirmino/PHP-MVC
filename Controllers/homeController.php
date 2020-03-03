<?php
Namespace Controllers;
use \Core\view;
use \Models\sales;

class homeController{
    public function index(){
        $view = new view();
        $sale = new sales();
        $sale = $sale->getEmpSale();
        $view->loadViewData("Home","View/home.php",$sale); 
    }
 }