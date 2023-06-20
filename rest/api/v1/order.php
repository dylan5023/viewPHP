<?php

//localhost:8080/vue-class-03/rest/api/v1/order.php
//htocs/vue-class-03/rest/api/v1/order.php

require_once ("../../../inc/config.inc.php");
require_once ("../../../inc/Entities/Employee.class.php");
require_once ("../../../inc/Utilities/PDOAgent.class.php");
require_once ("../../../inc/Utilities/DAO/OrdersDAO.class.php");
require_once ("../../../inc/Utilities/OrderConverter.class.php");

OrdersDAO::startDb();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,HEAD,OPTIONS,POST,PUT,DELETE ");
header('Content-Type: application/json; charset=utf-8');

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
    case "PUT":
        $data = json_decode(file_get_contents('php://input'));
        // $orderId = $data->id;
        $updateOrder = OrderConverter::convertToObj($data);
        // OrdersDAO::updateOrderById($orderId, $updateOrder);
        OrdersDAO::updateOrderById($updateOrder);
        echo "Order Updated!";
        // header("Location: http://localhost:8080");
        break;
    case "DELETE":
        $order = json_decode(file_get_contents('php://input'));
        OrdersDAO::deleteOrderById($order);
        echo "Order Deleted!";
        // header("Location: http://localhost:8080");
    break;

}
