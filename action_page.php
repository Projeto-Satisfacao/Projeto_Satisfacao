<?php
header("Acess-Control-Allow-Origin: *");

// requires
require_once "autoload.php";

// criando array "$form"
extract($_POST);
$form = $_POST;

// verifica quais infomações foram passadas no array "$form" 
if (array_key_exists('username', $form))
{
    $comando = new \App\View\UserFormView();
    $comando->getUserFormData($_POST);

    //header("Location: index-cadastros.php");
} 

elseif (array_key_exists('local', $form)) 
{
    $comando = new \App\View\LocalFormView();
    $comando->getLocalFormData($_POST);
    
    //header("Location: index-cadastros.php");

}

elseif (array_key_exists('department', $form)) 
{
    $comando = new \App\View\DepartmentFormView();
    $comando->getDepartmentFormData($_POST);

    //header("Location: index-cadastros.php");

}

elseif (array_key_exists('score', $form)) 
{
    $comando = new \App\View\SurveyFormView();
    $comando->getSurveyFormData($_POST['departamento'], $_POST['score']);
}

?>