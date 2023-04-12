<?php

namespace App\Model;

/**
* Classe responsável por fazer a conexão com o banco de dados
*/

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
      self::$conexao = new \mysqli("localhost", "root", "", "survey");

      // Cria uma nova conexão com o banco de dados MySQL
      if (self::$conexao->connect_error) {
        // Em caso de erro, exibe uma mensagem de erro e encerra o script
        die("Erro ao conectar com o banco de dados: " . self::$conexao->connect_error);
      }
      // Define o charset da conexão para utf8
      self::$conexao->set_charset("utf8");
    }
    // Retorna a conexão com o banco de dados
    return self::$conexao;
  }
}

