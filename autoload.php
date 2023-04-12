<?php

/**
 * Responsável pelo carregamento automático de classes na estrutura MVC
 */

spl_autoload_register(function ($className) {
  // Caminho base da aplicação
  $prefix = 'App\\';
  $baseDir = __DIR__ . '/app/';

  // Transforma o nome da classe em um caminho no sistema de arquivos
  $relativeClass = str_replace($prefix, '', $className);
  $relativeClass = ltrim($relativeClass, '\\');

  // Substitui as barras invertidas por barras do sistema de arquivos
  $classFile = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

  // Verifica se o arquivo da classe existe e o inclui
  if (file_exists($classFile)) {
    require_once $classFile;
  }
});
