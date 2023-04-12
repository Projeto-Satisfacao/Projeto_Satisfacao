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
    
    public function getByUsername(string $username) {
        
        $sql = "SELECT * FROM user WHERE username= '$username'";
        try{
        $byusername = $this->conexao->query($sql);
        $result = $byusername->fetch_assoc();
        return $result;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }

    public function getByIdUser(int $iduser) {

        $sql = "SELECT * FROM user WHERE iduser=$iduser";
        try{
        $byiduser = $this->conexao->query($sql);
        $result = $byiduser->fetch_assoc();
        return $result;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }

    public function getByEmailUser(string $email) {

        $sql = "SELECT * FROM user WHERE email='$email'";
        try{
        $byemail = $this->conexao->query($sql);
        $result = $byemail->fetch_assoc();
        return $result;
        }
        catch(exeption $e){
        return $e->getMessage();
        }
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM user";
        try{ 
            $alluser = $this->conexao->query($sql);
            $result = $alluser->fetch_assoc();
            return $result;
        }
        catch(exeption $e){
            return $e->getMessage();
        }
}
    

}