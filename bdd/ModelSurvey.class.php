<?php 
require_once("ModelConexao.class.php");

class ModelSurvey extends ModelDepartment
{ 
    
    public function createSurveyResult($local,$department,$score,$reason,$comment) {
        if ( isset($local) and isset($department) and isset($score) and isset ($reason) and isset($comment))
        {   
            $statement = $this->conexao->prepare("INSERT INTO survey (local,department,score, reason, comment,) VALUES (?,?,?)");           
            $statement->bind_param("sss",$local,$department,$score,$reason,$comment);
            try{
            $statement->execute();
            return true;
            }
            catch (execption $e){
                return $e->getMessage();

            }
        } else{
                return false;
        }
    }

    public function deleteSurveyResult($idsurvey) {
        $this->conexao->query("DELETE FROM survey WHERE idsurvey = {}");
    }

    /**
     * O método getSurveyById ele vai pesquisar 
     * @return fetch_assoc
     */
    public function getSurveyById(int $idsurvey) {
       
        $sql = "SELECT s.*, d.department, d.description, d.local_idlocal, l.local, l.address, l.url FROM survey s
        INNER JOIN department d ON d.iddepartment = s.department_iddepartment
        INNER JOIN local l ON l.idlocal = d.local_idlocal
        WHERE s.idsurvey = $idsurvey";
        
        try{
            $statement = $this->conexao->query($sql);
            $result = $statement->fetch_assoc(); 
            return $result;
        }
        catch (execption $e){
            return $e->getMessage();
        }
    }
    

    public function getSurveyByScore(int $score) {

        $sql = "SELECT * FROM survey WHERE score = $score";        
        try{
            $statement = $this->conexao->query($sql);
            $result = $statement->fetch_assoc();
            return $result;
        }
        catch (exeption $e) {
            return $e->getMessage();
        }
    }

    public function getSurveyByReason($reason) {

        $sql = "SELECT * FROM survey WHERE reason = '$reason'";        
        try{
            $byreasonsurvey = $this->conexao->query($sql);
            $result = $byreasonsurvey->fetch_assoc();
            return $result;
        }
        catch (exeption $e) {
            return $e->getMessage();
        }
    }

    public function getSurveyByComment($comment) {

        $sql = "SELECT * FROM survey WHERE comment = '$comment'";
        try{ 
        $bycommentsurvey = $this->conexao->query($sql);
        $result = $bycommentsurvey->fetch_assoc();
        return $result;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }

    public function getSurveyByLocal($localsurvey) {

        $sql = "SELECT * FROM survey WHERE localsurvey = '$localsurvey'";
        try{ 
        $bylocalsurvey = $this->conexao->query($sql);
        $result = $bylocalsurvey->fetch_assoc();
        return $result;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }
    
    public function getSurveyByDepartment($departmentsurvey) {

        $sql = "SELECT * FROM survey WHERE department_iddepartment = '$departmentsurvey'";
        try{ 
        $bydepartmentsurvey = $this->conexao->query($sql);
        $result = $bydepartmentsurvey->fetch_assoc();
        return $result;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }

    public function getSurveyAll() {

        $sql = "SELECT * FROM survey";
        try{ 
        $surveyall = $this->conexao->query($sql);
        $result = $surveyall->fetch_assoc();
        return $result;
        }
        catch (exeption $e) {
        return $e->getMessage();
        }
    }

}