<?php 
require_once("ModelConexao.class.php");
class ModelUser 
{
    public function __construct()
    {
        $this->conexao = ModelConexao::conectar();
    }

    public function createUser($username,$email,$password,$status)
    {
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

    public function deleteUser($username)
    {
      $this->conexao->query("DELETE FROM user WHERE username = {$username}");
    }

    public function updateUser($username,$email,$password,$status)
    {
        $result = $this->conexao->prepare("SELECT * FROM user WHERE username = $username");
        $eu = $result->prepare("UPDATE user SET username= $username, email=$email, password=$password, status=$status WHERE username = $status ");
        $result->execute();
    }  
    
    public function getAll()
    {
        $this->conexao->prepare("SELECT * FROM user");
    }
}
    

