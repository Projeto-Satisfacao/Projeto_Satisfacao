<?php

// requires
require_once("app/view/UserFormView.php");
require_once("app/view/LocalFormView.php");
require_once("app/view/DepartmentFormView.php");

// criando array "$form"
extract($_POST);
$form = $_POST;

// verifica quais infomações foram passadas no array "$form" 
if (array_key_exists('username', $form))
{
    $comando = new UserFormView();
    $comando->getUserFormData($_POST);

    //header("Location: index-cadastros.php");
} 

elseif (array_key_exists('local', $form)) 
{
    $comando = new LocalFormView();
    $comando->getLocalFormData($_POST);
    
    //header("Location: index-cadastros.php");

}

elseif (array_key_exists('department', $form)) 
{
    $comando = new DepartmentFormView();
    $comando->getDepartmentFormData($_POST);

    //header("Location: index-cadastros.php");

}
?>

