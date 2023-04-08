<?php 
abstract class ModelConexao 
{
    public static $conexao;

    public static function conectar()
    {
        self::$conexao = new mysqli("localhost", "root", "", "survey");
        return self::$conexao;
    }
}