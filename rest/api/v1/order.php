<?php

//localhost:8080/vue-class-03/rest/api/v1/employee.php
//htocs/vue-class-03/rest/api/v1/employee.php

require_once ("../../../inc/config.inc.php");
require_once ("../../../inc/Entities/Employee.class.php");
require_once ("../../../inc/Utilities/PDOAgent.class.php");
require_once ("../../../inc/Utilities/DAO/OrdersDAO.class.php");
require_once ("../../../inc/Utilities/OrderConverter.class.php");

EmployeeDAO::startDb();

header("Access-Control-Allow-Origin: *");

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        echo json_encode(OrderConverter::convertToStd(OrdersDAO::getAllOrders()));
    break;
    case "POST":
        $data = json_decode(file_get_contents('php://input'));
        OrdersDAO::insertOrder(
            OrderConverter::convertToObj($data)
        );
        header("Location: http://localhost:8080");
    break;
    case "DELETE":
        $order = json_decode(file_get_contents('php://input'));
        OrdersDAO::deleteProductById($order);
        echo "Order Deleted!";
        // header("Location: http://localhost:8080");
    break;

}
