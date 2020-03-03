<?php
Namespace Models;
use \Core\database;
use PHPMailer\PHPMailer\PHPMailer;
use \Core\view;
use Dompdf\Dompdf;

class employees{
    public function cpfExist($cpf){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("SELECT cpf_func FROM funcionario WHERE cpf_func = ?");
        $sql->bindValue(1,$cpf);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return false;
        }
        return true;
    
    }
    public function editCpf($id,$cpf){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("SELECT cpf_func FROM funcionario WHERE cpf_func = ? AND id_func = ?");
        $sql->bindValue(1,$cpf);
        $sql->bindValue(2,$id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return true;
        }
        return false;
         
    }
    public function getAllEmployees(){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->query("SELECT * FROM funcionario ORDER BY id_func DESC");
        $sql = $sql->fetchAll();
        return $sql;
    }
    public function addNewEmployeer($name,$age,$salary,$cpf){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("INSERT INTO funcionario(nome_func,idade_func,salario_func,cpf_func) VALUES(?,?,?,?)");
        $sql->bindValue(1,$name);
        $sql->bindValue(2,$age);
        $sql->bindValue(3,$salary);
        $sql->bindValue(4,$cpf);
        $sql->execute();

        return true;
    }
    public function getIdEmployeer($id){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("SELECT * FROM funcionario WHERE id_func = ?");
        $sql->bindValue(1,$id);
        $sql->execute();
        $sql = $sql->fetch();
        
        return $sql;
    }
    public function editEmployeer($id,$name,$age,$salary,$cpf){
        $sql = new database();
        $sql = $sql->con();
        $query = "UPDATE funcionario SET
                  nome_func = ?,
                  idade_func = ?,
                  salario_func = ?,
                  cpf_func = ?
                  WHERE id_func = ?";
        $sql = $sql->prepare($query);
        $sql->bindValue(1,$name);
        $sql->bindValue(2,$age);
        $sql->bindValue(3,$salary);
        $sql->bindValue(4,$cpf);
        $sql->bindValue(5,$id);
        $sql->execute();

        return true;
    }
    public function delEmployeer($id){
        try{
            $sql = new database();
            $sql = $sql->con();
            $sql = $sql->prepare("DELETE FROM funcionario where id_func = ?");
            $sql->bindValue(1,$id);
            $sql->execute();
        
            echo true;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }
    public function empSales($vend){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("SELECT * FROM venda WHERE vendedor_venda = ?");
        $sql->bindValue(1,$vend);
        $sql->execute();
        $sql = $sql->fetchAll();
        
        return $sql;
    }
    public function sendEmail($file,$email){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = '8c67c75c1fc3b7';
        $mail->Password = '5eaa67db16f0d6';
        $mail->Port = 587;
        $mail->setFrom("admin@gmail.com");
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Relatorio';
        $mail->Body = 'Relatorio do vendededor';
        $mail->addAttachment($file);
        $mail->send();
    }
    public function createPdf($vendedor){
        $emp = new employees();
        $view = new view();
        $sales = array();
        $domPdf = new Dompdf(['isRemoteEnabled' => true]);
        ob_start();
        $sales[0] = $emp->empSales($vendedor);
        $sales[1] = $emp->getIdEmployeer($vendedor);
        $view->loadModalData("View/empPdf",$sales);
        $domPdf->loadHtml(ob_get_clean());
        $domPdf->setPaper("A4",'portrait');
        $domPdf->render();
        $file_name = md5(rand()) . '.pdf';
        $pdfString = $domPdf->output();
        file_put_contents($file_name, $pdfString);

        return $file_name;
    }
}