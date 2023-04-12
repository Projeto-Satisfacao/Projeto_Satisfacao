<?php 
require_once("ModelLocal.class.php");
require_once("ModelDepartment.class.php");
require_once("ModelSurvey.class.php");
$objsurvey = new ModelDepartment();
$result = $objsurvey->getAllDepartment(1) ;
var_dump($result);
