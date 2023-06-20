<?php

//localhost:8080/vue-class-03/rest/api/v1/product.php
//htocs/vue-class-03/rest/api/v1/product.php

require_once ("../../../inc/config.inc.php");
require_once ("../../../inc/Entities/Employee.class.php");
require_once ("../../../inc/Utilities/PDOAgent.class.php");
require_once ("../../../inc/Utilities/DAO/ProductsDAO.class.php");
require_once ("../../../inc/Utilities/ProductConverter.class.php");

ProductsDAO::startDb();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,HEAD,OPTIONS,POST,PUT,DELETE ");
header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        echo json_encode(ProductConverter::convertToStd(ProductsDAO::getAllProducts()));
    break;
    case "POST":
        $data = json_decode(file_get_contents('php://input'));
        ProductsDAO::insertProduct(
            ProductConverter::convertToObj($data)
        );
        header("Location: http://localhost:8080");
    break;
    case "DELETE":
        $product = json_decode(file_get_contents('php://input'));
        ProductsDAO::deleteProductById($product);
        echo "User Deleted!";
        // header("Location: http://localhost:8080");
    break;
}
