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
header("Access-Control-Allow-Methods: GET,POST,HEAD,OPTIONS,POST,PUT,DELETE ");
header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        echo json_encode(UserConverter::convertToStd(UserDAO::getAllUsers()));
    break;
    case "POST":
        $data = json_decode(file_get_contents('php://input'));
        UserDAO::insertUser(
            UserConverter::convertToObj($data)
        );
        header("Location: http://localhost:8080");
    break;
    case "DELETE":
        $user = json_decode(file_get_contents('php://input'));
        UserDAO::deleteUserById($user);
        echo "User Deleted!";
        // header("Location: http://localhost:8080");
    break;


}
