<?php

namespace App\Model;

/**
 * Classe responsável pelos dados das avaliações
 */

require_once "autoload.php";

use Exception;

class SurveyModel extends DepartmentModel
{
    private $idSurvey;
    private $idLocal;
    private $idDepartment;
    private $localName;
    private $departmentName;
    private $score;
    private $reason;
    private $comment;
    private $date;

    /**
    *  Metódo para definir o nome do local está vínculado a avaliação
    *  @param int $idDepartment - ID do Setor
    *  @return void
    */
    public function getLocalName($idDepartment)
    {
        // Método da classe LocalModel para definir o nome do Local
        $localData = (new \App\Model\LocalModel())->getById($idDepartment);
        $localName = $localData[0]['local'];
        return $localName;
    }

    /**
    *  Metódo para definir o nome do setor que está vínculado a avaliação
    *  @param int $idLocal - ID do Local
    *  @param int $idDepartment - ID do Setor
    *  @return void
    */
    public function getDepartmentName($idLocal, $idDepartment)
    {
        // Método da classe DepartmentModel para definir o nome do Setor
        $departmentData = (new DepartmentModel($idLocal))->getById($idDepartment);
        $departmentName = $departmentData[0]['department'];
        return $departmentName;
    }

    /**
     * Insere uma nova avaliação para um setor
     * @param string $local - Nome do local da avaliação
     * @param string $department - Nome do setor avaliado
     * @param int $score - Nota da avaliação
     * @param string $reason - Motivo da avaliação
     * @param string $comment - Comentários adicionais
     * @return int - ID da avaliação inserida
     */
    public function createResult($idDepartment, $score)
    {
        // Código do método
        $conexao = \App\Model\Database::conectar();

        if(get_class($conexao) == "mysqli") {
            // Prepara o comando SQL e vincula os parâmetros
            $createResult = $conexao->prepare("INSERT INTO survey (department_iddepartment, score) VALUES (?, ?)");
            $createResult->bind_param("ii", $idDepartment, $score);

            try {
                // Executa o comando SQL e retorna o ID do departamento inserido
                $createResult->execute();
                // Capturar id cadastrado
                $result = mysqli_insert_id($conexao);
                return ($result);
            } catch(\mysqli_sql_exception $e) {
                {
                    // Verifica se o erro é "Duplicate entry"
                    return $e;
                    if ($e->getCode() == 1062) {
                        // Trata o erro (exibindo uma mensagem de erro para o usuário)
                        return ($e->getCode());
                    } else {
                        // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o usuário)
                        return ($e->getCode());
                    }
                }
            }
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }

    }

    /**
     * Deleta uma avaliação para um setor
     * @param int $idSurvey - ID da avaliação
     * @return bool - True se a avaliação foi deletada com sucesso, False caso contrário
     */
    public function deleteResult($idSurvey)
    {
        $conexao = \App\Model\Database::conectar();
        if (get_class($conexao) == "mysqli") {
            // Código do método

            // Prepara o comando SQL e vincula os parâmetros
            $deleteSurvey = $conexao->prepare("DELETE FROM survey WHERE idsurvey = ?");
            $deleteSurvey->bind_param("i", $idSurvey);

            // Executa o comando SQL e verifica se houve algum erro
            try {
                $deleteSurvey->execute();
            } catch (\mysqli_sql_exception $e) {
                // Verifica se o erro é "Duplicate entry"
                if ($e->getCode() == 1062) {
                    // Trata o erro (exibindo uma mensagem de erro para o usuário)
                    return ($e->getCode());
                } else {
                    // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o usuário)
                    return ($e->getCode());
                }
            }
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Lista todas as avaliações existentes
     * @return array - Lista de todas as avaliações existentes
     */
    public function getAll()
    {
        $conexao = \App\Model\Database::conectar();
        // Código do método
        if (get_class($conexao) == "mysqli") {

            // Prepara o comando SQL e vincula os parâmetros
            $getAll = $conexao->prepare("SELECT * FROM survey");

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getAll->execute();
            $result = $getAll->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Filtra as avaliações pelo ID
     * @param int $idSurvey - ID da avaliação
     * @return array - Lista de avaliações filtradas pelo ID
     */

    public function getById($idSurvey)
    {
        // Código do método
        $conexao = \App\Model\Database::conectar();
        if (get_class($conexao) == "mysqli") {

            // Prepara o comando SQL e vincula os parâmetros
            $getById = $conexao->prepare("SELECT * FROM survey WHERE idsurvey = ?");
            $getById->bind_param("i", $idSurvey);

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getById->execute();
            $result = $getById->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Filtra as avaliações por nota
     * @param int $score - Nota da avaliação
     * @return array - Lista de avaliações filtradas pela nota
     */
    public function getByScore($score)
    {
        $conexao = \App\Model\Database::conectar();
        // Código do método
        if (get_class($conexao) == "mysqli") {
            // Prepara o comando SQL e vincula os parâmetros

            // Prepara o comando SQL e vincula os parâmetros
            $getByScore = $conexao->prepare("SELECT * FROM survey WHERE score = ?");
            $getByScore->bind_param("i", $score);

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getByScore->execute();
            $result = $getByScore->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Filtra as avaliações por motivo
     * @param string $reason - Motivo da avaliação
     * @return array - Lista de avaliações filtradas pelo motivo
     */
    public function getByReason($reason)
    {
        // Código do método
        $conexao = \App\Model\Database::conectar();
        if (get_class($conexao) == "mysqli") {
            // Prepara o comando SQL e vincula os parâmetros

            // Prepara o comando SQL e vincula os parâmetros
            $getByReason = $conexao->prepare("SELECT * FROM survey WHERE reason = ?");
            $getByReason->bind_param("s", $reason);

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getByReason->execute();
            $result = $getByReason->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Filtra as avaliações que possuem comentários adicionais
     * @param string $comment - Comentários adicionais
     * @return array - Lista de avaliações filtradas pelos comentários adicionais
     */
    public function getByComment($comment)
    {
        // Código do método
        $conexao = \App\Model\Database::conectar();
        if (get_class($conexao) == "mysqli") {
            // Prepara o comando SQL e vincula os parâmetros

            // Prepara o comando SQL e vincula os parâmetros
            $getSurveyByComment = $conexao->prepare("SELECT * FROM survey WHERE comment LIKE ?");
            $getSurveyByComment->bind_param("s", $comment);

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getSurveyByComment->execute();
            $result = $getSurveyByComment->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Filtra as avaliações por local
     * @param string $local - Nome do local da avaliação
     * @return array - Lista de avaliações filtradas pelo local
     */
    public function getByLocal($local)
    {
        // Código do método
        $conexao = \App\Model\Database::conectar();
        if (get_class($conexao) == "mysqli") {
            // Prepara o comando SQL e vincula os parâmetros

            // Prepara o comando SQL e vincula os parâmetros
            $getSurveyByLocal = $conexao->prepare("SELECT * FROM survey WHERE local LIKE ?");
            $getSurveyByLocal->bind_param("s", $local);

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getSurveyByLocal->execute();
            $result = $getSurveyByLocal->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Filtra as avaliações por setor
     * @param string $department - Nome do setor da avaliação
     * @return array - Lista de avaliações filtradas pelo setor
     */
    public function getByDepartment($department)
    {
        $conexao = \App\Model\Database::conectar();
        // Código do método
        if (get_class($conexao) == "mysqli") {
            // Prepara o comando SQL e vincula os parâmetros
            // Prepara o comando SQL e vincula os parâmetros
            $getSurveyByDepartment = $conexao->prepare("SELECT * FROM survey WHERE department_iddepartment IN (SELECT iddepartment FROM department WHERE iddepartment LIKE ?)");
            $getSurveyByDepartment->bind_param("i", $department);

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getSurveyByDepartment->execute();
            $result = $getSurveyByDepartment->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

    /**
     * Filtra as avaliações por data
     * @param string $date - Data da avaliação (formato: dd-mm-yyyy)
     * @return array - Lista de avaliações filtradas pela data
     */
    public function getByDate($date)
    {
        // Código do método
        $conexao = \App\Model\Database::conectar();
        if (get_class($conexao) == "mysqli") {

            // Prepara o comando SQL e vincula os parâmetros
            $getByDate = $conexao->prepare("SELECT * FROM survey WHERE date = ?");
            $getByDate->bind_param("s", $date);

            // Executa a consulta SQL e retorna os resultados em um array associativo
            $getByDate->execute();
            $result = $getByDate->get_result();
            $surveys = array();
            while ($row = $result->fetch_assoc()) {
                $surveys[] = $row;
            }
            return $surveys;
        } else {
            //retorna a conexao como erro de conexao
            return $conexao;
        }
    }

}