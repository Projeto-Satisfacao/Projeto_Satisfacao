<?php
require_once("ModelConexao.class.php");
class ModelLocal
{
    public function __construct()
    {
        $this->conexao = ModelConexao::conectar();
    }
    
    public function createLocal($local, $address, $url) {
        if (isset($local) and isset ($address) and isset($url) )
        {   
            $statement = $this->conexao->prepare("INSERT INTO local (local, address, url) VALUES (?,?,?)");           
            $statement->bind_param("sss",$local, $address, $url);
            $statement->execute();
            return true;
        } else{
            return false;
        }
    }
    public function deleteLocal($idlocal ) {

      $this->conexao->query("DELETE FROM local WHERE idlocal  = {$idlocal}");
    }

    public function updateLocal($local, $address, $url, $idlocal)
    {
        $result = $this->conexao->prepare("UPDATE local  SET local= ?, address = ?, url = ? WHERE idlocal = ?");
        $result->bind_param("sssi", $local, $address, $url, $idlocal);
        $result->execute();
    }  

    public function getByLocalname($namelocal) {

        $sql = "SELECT * FROM local WHERE local = $namelocal";
        try{
            $bynamelocal =  $this->conexao->query($sql);
            $result = $bynamelocal->fetch_assoc();
            return $result;
        }
        catch(exeption $e){
            return $e->getMessage();
        }
    }

    public function getByIdLocal($idlocal) {

        $sql = "SELECT * FROM local WHERE idlocal = $idlocal";
        try{
            $byidlocal = $this->conexao->query($sql);
            $result = $byidlocal->fetch_assoc();
            return $byidlocal;
        }
        catch(exeption $e){
        return $e->getMessage();
        }
    }

    public function getAllLocal() {
        
        $sql = "SELECT * FROM local";
        try{
            $alllocal = $this->conexao->query($sql);
            $result = $alllocal->fetch_assoc();
            return $alllocal;
        }
        catch(exeption $e){
            return $e->getMessage();
        }
    }
  
}