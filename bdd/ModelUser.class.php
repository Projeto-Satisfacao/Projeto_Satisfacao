<?php 
require_once("ModelConexao.class.php");
class ModelUser 
{
    public function __construct()
    {
        $this->conexao = ModelConexao::conectar();
    }

    public function createUser($username,$email,$password,$status) {
        if (isset($username) and isset ($password) and isset($email) and isset($status) )
        {   
            $statement = $this->conexao->prepare("INSERT INTO user (username,password ,email, status) VALUES (?,?,?,?)");           
            $statement->bind_param("sssd",$username,$email,$password,$status);
            $statement->execute();
            return true;

        } else{
            return false;
        }
    }

    public function deleteUser($username) {
      $this->conexao->query("DELETE FROM user WHERE username = {$username}");
    }

    public function updateUser($username,$email,$password,$status) {
        $eu = $result->prepare("UPDATE user SET username= $username, email=$email, password=$password, status=$status WHERE username = $status ");
        try{
        $result->execute();
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }  
    
    public function getByUsername($username) {

        $byusername = $this->conexao->prepare("SELECT * FROM user WHERE username={}");
        try{
        $byusername->execute();
        return $byusername;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }

    public function getByIdUser($iduser) {

        $byiduser = $this->conexao->prepare("SELECT * FROM user WHERE iduser={}");
        try{
        $byiduser->execute();
        return $byiduser;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }

    public function getByEmailUser($email) {

        $byemail = $this->conexao->prepare("SELECT * FROM user WHERE email={}");
        try{
        $byemail->execute();
        return $byemail;
        }
        catch(exeption $e){
        return $e->getMessage();
        }
    }

    public function getAllUser()
    {
        $alluser = $this->conexao->prepare("SELECT * FROM user");
        try{
        $alluser->execute();
        return $alluser;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }
}
    

