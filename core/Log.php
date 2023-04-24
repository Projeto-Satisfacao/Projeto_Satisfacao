<?php

namespace App\Core;

/**
* Armazena os registros de LOG em TXT
*/

class Logger {

  /**
  * Registra uma ação no arquivo de LOG do User
  * @param $message = mensagem a ser escrita
  */
  public static function logUser($message)
  {
    // REGISTRAR LOG
    date_default_timezone_set('America/Sao_Paulo');
    $ip = $_SERVER['REMOTE_ADDR'];
    $horaAtual = date("H:i:s");
    $dataAtual = date("d-m-Y");
    $log = fopen("docs/logs/user/logs.txt", "a+", 0);
    // Passar a mensagem como parametro
    // $mensagem = "Acessou o sistema";
    $texto = "[IP]: $ip \n[USUÁRIO]: {$_SESSION['usuario']} \n[DATA]: $dataAtual \n[HORA]: $horaAtual \n[AÇÃO]: $message\n\n";
    fwrite($log, $texto);
    fclose($log);
  }

  /**
  * Registra uma ação no arquivo de LOG do Local
  * @param $message = mensagem a ser escrita
  */
  public static function logLocal($message)
  {
    // REGISTRAR LOG
    date_default_timezone_set('America/Sao_Paulo');
    $ip = $_SERVER['REMOTE_ADDR'];
    $horaAtual = date("H:i:s");
    $dataAtual = date("d-m-Y");
    $log = fopen("docs/logs/local/logs.txt", "a+", 0);
    // Passar a mensagem como parametro
    // $mensagem = "Acessou o sistema";
    $texto = "[IP]: $ip \n[USUÁRIO]: {$_SESSION['username']} \n[DATA]: $dataAtual \n[HORA]: $horaAtual \n[AÇÃO]: $message\n\n";
    fwrite($log, $texto);
    fclose($log);
  }

  /**
  * Registra uma ação no arquivo de LOG do Setor
  * @param $message = mensagem a ser escrita
  */
  public static function logDepartment($message)
  {
    // REGISTRAR LOG
    date_default_timezone_set('America/Sao_Paulo');
    $ip = $_SERVER['REMOTE_ADDR'];
    $horaAtual = date("H:i:s");
    $dataAtual = date("d-m-Y");
    $log = fopen("../../docs/logs/department/logs.txt", "a+", 0);
    // Passar a mensagem como parametro
    // $mensagem = "Acessou o sistema";
    $texto = "[IP]: $ip \n[USUÁRIO]: {$_SESSION['username']} \n[DATA]: $dataAtual \n[HORA]: $horaAtual \n[AÇÃO]: $message\n\n";
    fwrite($log, $texto);
    fclose($log);
  }

  /**
  * Registra uma ação no arquivo de LOG do Survey
  * @param $message = mensagem a ser escrita
  */
  public static function logSurvey($message)
  {
    // REGISTRAR LOG
    date_default_timezone_set('America/Sao_Paulo');
    $ip = $_SERVER['REMOTE_ADDR'];
    $horaAtual = date("H:i:s");
    $dataAtual = date("d-m-Y");
    $log = fopen("../../docs/logs/survey/logs.txt", "a+", 0);
    // Passar a mensagem como parametro
    // $mensagem = "Acessou o sistema";
    $texto = "[IP]: $ip \n[USUÁRIO]: {$_SESSION['username']} \n[DATA]: $dataAtual \n[HORA]: $horaAtual \n[AÇÃO]: $message\n\n";
    fwrite($log, $texto);
    fclose($log);
  }
}


