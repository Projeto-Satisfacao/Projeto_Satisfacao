<?php
namespace App\Model;


/**
 * Classe responsável por fazer a conexão com o banco de dados
 */


use Exception;

class Database {

  protected static $conexao;

  /**
  * Método estático que retorna a conexão com o banco de dados, se ela já existir, ou cria uma nova conexão.
  * @return mysqli - Objeto de conexão com o banco de dados MySQL
  */
  public static function conectar()
  {
    // Código do método
    // Verifica se já existe uma conexão aberta com o banco de dados
    if (!isset(self::$conexao)) {
      // Cria uma nova conexão com o banco de dados MySQL
      try {
        self::$conexao = new \mysqli("localhost", "root", "", "survey");
      } catch (Exception $e) {
        //joga no logg o motivo
        return $e;
      }
      // Define o charset da conexão para utf8
      self::$conexao->set_charset("utf8");
    }
    // Retorna a conexão com o banco de dados
    return self::$conexao;
  }
}