<?php
require_once("ModelConexao.class.php");
class ModelDepartment 
{

    public function __construct() {
        $this->conexao = ModelConexao::conectar();
    }

    public function createDepartment($department, $description, $idlocal) {
        
        if (isset($department) and isset ($description) and isset($idlocal)) {   
            $statement = $this->conexao->prepare("INSERT INTO department (department, description, local_idlocal) VALUES (?,?,?)");           
            $statement->bind_param("ssi", $department, $description, $idlocal);
            $statement->execute();
            return true;
        } else{
            return false;
        }
    }

    public function deleteDepartment(int $iddepartment) {

      $this->conexao->query("DELETE FROM department WHERE iddepartment = {$iddepartment}");
    }

    public function updateDepartment($department, $description, $idlocal, $iddepartment) {

        $result = $this->conexao->prepare("UPDATE department  SET department= ?, description= ?, local_idlocal = ? WHERE iddepartment = ?");
        $result->bind_param("ssii", $department, $description, $idlocal, $iddepartment);
        $result->execute();
    }  


    public function getBynameDepartment(string $namedepartment) {

        $sql = "SELECT * FROM department WHERE department = '$namedepartment'";
        try{ 
            $bynamedepartment = $this->conexao->query($sql);
            $result = $bynamedepartment->fetch_assoc();
            return $result;
        }
        catch(exeption $e){
            return $e->getMessage();
        }
    }

    public function getByIdDepartment(int $iddepartment) {
        
        $sql = "SELECT * FROM department WHERE iddepartment = $iddepartment";
        try{ 
            $byiddepartment = $this->conexao->query($sql);
            $result = $byiddepartment->fetch_assoc();
            return $result;
        }
        catch(exeption $e){
            return $e->getMessage();
        }
    }
    
    public function getAllDepartment(){

        $sql = "SELECT * FROM department";
        try{ 
            $alldepartment = $this->conexao->query($sql);
            $result = $alldepartment->fetch_assoc();
            return $result;
        }
        catch(exeption $e){
            return $e->getMessage();
        }
}
}