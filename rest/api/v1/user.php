<?php

//localhost:8080/vue-class-03/rest/api/v1/employee.php
//htocs/vue-class-03/rest/api/v1/employee.php

require_once ("../../../inc/config.inc.php");
require_once ("../../../inc/Entities/Employee.class.php");
require_once ("../../../inc/Utilities/PDOAgent.class.php");
require_once ("../../../inc/Utilities/DAO/UserDAO.class.php");
require_once ("../../../inc/Utilities/UserConverter.class.php");

EmployeeDAO::startDb();

header("Access-Control-Allow-Origin: *");

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        echo json_encode(UserConverter::convertToStd(UserDAO::getAllUsers()));
    break;
    default:
        echo json_encode(UserConverter::convertToStd(UserDAO::getAllUsers()));

}