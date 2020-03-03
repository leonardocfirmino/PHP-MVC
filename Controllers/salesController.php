<?php
Namespace Controllers;
use \Core\view;
use \Models\sales;
use \Models\employees;
use Dompdf\Dompdf;

class salesController{
    public function index(){
        $view = new view();
        $sale = new sales();
        if(isset($_POST['cliente'])){
            $sale->addNewSale($_POST['cliente'],$_POST['vendedor'],$_POST['preco']);
        }
        if(isset($_POST['eCliente'])){
            $sale->editSale($_POST['eId'],$_POST['eCliente'],$_POST['eVendedor'],$_POST['ePreco'],$_POST['eDate']);
        }
        $sale = $sale->getAllSales();
        $view->loadViewData("Vendas","View/sales.php",$sale);
    }
    public function addNewSale(){
        $view = new view();
        $emp = new employees();
        $emp = $emp->getAllEmployees();
        $view->loadModalData("View/addNewSale",$emp);
    }
    public function editSale($id){
        $view = new view();
        $edit = new sales();
        $emp = new employees();
        $emps = $emp->getAllEmployees();
        $data[0] = $edit->getIdSale($id);
        $idEmp = $emp->getIdEmployeer($data[0]['vendedor_venda']);
        $data[1] = $emps;
        $data[2] = $idEmp;
        $view->loadModalData("View/editSale",$data);
    }
    public function delSale($id){
        $del = new sales();
        $view = new view();
        $del->delSale($id);
    }
    public function getEmpPdf(){
        $view = new view();
        $emp = new employees();
        $emps = $emp->getAllEmployees();
        $view->loadModalData("View/newEmpPdf",$emps);
    }
    public function empPdf(){
        $view = new view();
        $emp = new employees();
        $domPdf = new Dompdf(['isRemoteEnabled' => true]);
        $pdf = $emp->createPdf($_POST['vendedor']);
        $emp->sendEmail($pdf,$_POST['email']);
        unlink($pdf);
    }
}