<?php

//localhost:8080/vue-class-03/rest/api/v1/category.php
//htocs/vue-class-03/rest/api/v1/category.php

require_once ("../../../inc/config.inc.php");
require_once ("../../../inc/Entities/Employee.class.php");
require_once ("../../../inc/Utilities/PDOAgent.class.php");
require_once ("../../../inc/Utilities/DAO/CategoriesDAO.class.php");
require_once ("../../../inc/Utilities/CategoryConverter.class.php");

CategoriesDAO::startDb();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,HEAD,OPTIONS,POST,PUT,DELETE ");
header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        echo json_encode(CategoryConverter::convertToStd(CategoriesDAO::getAllCategories()));
    break;
    case "POST":
        $data = json_decode(file_get_contents('php://input'));
        CategoriesDAO::insertCategory(
            CategoryConverter::convertToObj($data)
        );
        header("Location: http://localhost:8080");
    break;

}
