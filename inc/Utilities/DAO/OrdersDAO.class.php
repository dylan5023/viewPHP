<?php

class OrderDAO {
    private static $db;

    public static function startDB() {
        // give an class name
        self::$db = new PDOAgent("Orders");
    }

    public static function getAllOrders() {
        $sql = "SELECT * FROM orders";
        self::$db->query($sql);
        self::$db->execute();
        return self::$db->resultSet();
    }

    public static function getOrderById(int $orderId) {
        $sql = "SELECT * FROM orders WHERE orderId = :orderId";
        self::$db->query($sql);
        self::$db->bind(":orderId", $orderId);
        self::$db->execute();
 
        return self::$db->singleResult();
    }

    public static function insertOrder(Orders $order){
        $sql = "INSERT INTO orders (sellerId, buyerId, productId, quantity, totalPrice, status) values (:sellerId, :buyerId, :productId, :quantity, :totalPrice, :status)";
        self::$db->query($sql); 
        self::$db->bind(":sellerId", $product->getSellerId());
        self::$db->bind(":buyerId", $product->getBuyerId());
        self::$db->bind(":productId", $product->getProductId()); 
        self::$db->bind(":quantity", $product->getQuantity() );
        self::$db->bind(":totalPrice", $product->getTotalPrice());
        self::$db->bind(":status", $product->getStatus());
        self::$db->execute();
        return self::$db->lastInsertedId();
    }

    public static function updateOrderById(Orders $order) {
        $sql = "UPDATE orders SET status = :status where orderId = :orderId";
        self::$db->query($sql);
        self::$db->bind(":status", $order->getStatus());
        self::$db->execute();
        return self::$db->lastInsertedId();
    }

    public static function deleteOrderById(int $orderId) {
        $sql = "DELETE FROM orders WHERE orderId = :orderId";
        self::$db->query($sql);
        self::$db->bind(":orderId", $orderId);
        self::$db->execute();
        return self::$db->rowCount();
    }

    public static function getSingleOrder(int $orderId){
        $sql = "SELECT * FROM orders where orderId = :orderId";
        self::$db->query($sql);
        self::$db->bind(":orderId", $orderId);
        self::$db->execute();
        return self::$db->singleResult();
    }

}