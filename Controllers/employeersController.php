<?php
Namespace Controllers;
use \Core\view;
use \Models\employees;

class employeersController{
    public function index(){
        $view = new view();
        $emp = new employees();
        if(isset($_POST['nome'])){
            $emp->addNewEmployeer($_POST['nome'],$_POST['idade'],$_POST['salario'],$_POST['cpf']);
        }
        if(isset($_POST['eNome'])){
            $emp->editEmployeer($_POST['eId'],$_POST['eNome'],$_POST['eIdade'],$_POST['eSalario'],$_POST['eCpf']);
        }
        $emp = $emp->getAllEmployees();
        $view->loadViewData("Vendedores","View/employees.php",$emp);
    }
    public function addNewEmployeer(){
        $view = new view();
        $view->loadModal("View/addNewEmployeer");
    }
    public function editEmployeer($id){
        $view = new view();
        $data = new employees();
        $data = $data->getIdEmployeer($id);
        $view->loadModalData("View/editEmployeer",$data);
    }
    public function delEmployeer($id){
        $del = new employees();
        $view = new view();
        $del->delEmployeer($id);
    }
    public function cpfExist(){
        $email = new employees();
        if($email->cpfExist($_POST['cpf']) == true){
            echo true;
        };
    }
    public function editCpf(){
        $email = new employees();
        if($email->editCpf($_POST['eId'],$_POST['eCpf']) == true){
            echo true;
        }
        if($email->cpfExist($_POST['eCpf']) == true){
            echo true;
        }
    }
    public function showEmp(){
        $emp = new employees();
        $emps = $emp->getIdEmployeer($_POST['id']);
        $view = new view();
        $view->loadModalData('View/tooltip',$emps);
    }
}