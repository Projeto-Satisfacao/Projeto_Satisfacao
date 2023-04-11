<?php

/**
* Armazena os registros de LOG em TXT
*/

class Logger
{
  protected $filename;

  /**
  * Instancia um logger
  * @param $filename = local do arquivo de LOG
  */
  public function __construct($filename)
  {
    $this->filename = $filename;
    // Reseta o conteúdo do arquivo
    file_put_contents($filename, '');
  }

  /**
  * Escreve uma mensagem no arquivo de LOG
  * @param $message = mensagem a ser escrita
  */
  public function write($message)
  {
    date_default_timezone_set('America/Sao_Paulo');
    $time = date("Y-m-d H:i:s");

    // monta a string
    $text = "\n [$time]: $message \n";

    // adiciona ao final do arquivo
    $handler = fopen($this->filename, 'a');
    fwrite($handler, $text);
    fclose($handler);
  }
}
