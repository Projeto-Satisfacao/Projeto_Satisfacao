<?php 
require_once("ModelLocal.class.php");
require_once("ModelDepartment.class.php");
require_once("ModelSurvey.class.php");
require_once("ModelUser.class.php");

$objsurvey = new ModelUser();
$result = $objsurvey-> getAllUser() ;
var_dump($result);
