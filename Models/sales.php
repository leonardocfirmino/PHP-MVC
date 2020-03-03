<?php
Namespace Models;
use \Core\database;

class sales{
    public function getAllSales(){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->query("SELECT * FROM venda ORDER BY data_venda DESC");
        $sql = $sql->fetchAll();
        return $sql;
    }
    public function addNewSale($client,$saler,$price){
        global $currentDate;
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("INSERT INTO venda(cliente_venda,vendedor_venda,preco_venda,data_venda) VALUES(?,?,?,?)");
        $sql->bindValue(1,$client);
        $sql->bindValue(2,$saler);
        $sql->bindValue(3,$price);
        $sql->bindValue(4,$currentDate);
        $sql->execute();

        return true;
    }
    public function getIdSale($id){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("SELECT * FROM venda WHERE id_venda = ?");
        $sql->bindValue(1,$id);
        $sql->execute();
        $sql = $sql->fetch();
        
        return $sql;
    }
    public function getEmpSale(){
        $sql = new database();
        $sql = $sql->con();
        $sql = $sql->prepare("SELECT V.vendedor_venda,COUNT(*),
                              F.nome_func,
                              F.idade_func,
                              F.salario_func,
                              cpf_func
                              FROM funcionario as F INNER JOIN venda as V ON F.id_func = V.vendedor_venda
                              GROUP BY V.vendedor_venda");
        $sql->execute();
        $sql = $sql->fetchAll();
        
        return $sql;
    }
    public function editSale($id,$client,$saler,$price,$date){
        $sql = new database();
        $sql = $sql->con();
        $query = "UPDATE venda SET
                  cliente_venda = ?,
                  vendedor_venda = ?,
                  preco_venda = ?,
                  data_venda = ?
                  WHERE id_venda = ?";
        $sql = $sql->prepare($query);
        $sql->bindValue(1,$client);
        $sql->bindValue(2,$saler);
        $sql->bindValue(3,$price);
        $sql->bindValue(4,$date);
        $sql->bindValue(5,$id);
        $sql->execute();

        return true;
    }
    public function delSale($id){
        try{
            $sql = new database();
            $sql = $sql->con();
            $sql = $sql->prepare("DELETE FROM venda WHERE id_venda = ?");
            $sql->bindValue(1,$id);
            $sql->execute();
        
            echo true;
        } catch(PDOException $e){
            echo false;
        }
    }
    
}