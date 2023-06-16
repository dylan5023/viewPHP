<?php

class ProductDAO {
    private static $db;

    public static function startDB() {
        // give an class name
        self::$db = new PDOAgent("Products");
    }

    public static function getAllProducts() {
        $sql = "SELECT * FROM products";
        self::$db->query($sql);
        self::$db->execute();
        return self::$db->resultSet();
    }

    public static function getProductById(int $productId) {
        $sql = "SELECT * FROM products WHERE productId = :productId";
        self::$db->query($sql);
        self::$db->bind(":productId", $productId);
        self::$db->execute();

        return self::$db->singleResult();
    }

    public static function insertProduct( Products $product){
        $sql = "INSERT INTO products (sellerId, title, description, price, categoryId, condition, updatedAt) values (:sellerId, :title, :description, :price, :categoryId, :condition, :updatedAt)";
        self::$db->query($sql);
        self::$db->bind(":sellerId", $product->getSellerId());
        self::$db->bind(":title", $product->getTitle());
        self::$db->bind(":description", $product->getDescription());
        self::$db->bind(":price", $product->getPrice());
        self::$db->bind(":categoryId", $product->getCategoryId());
        self::$db->bind(":condition", $product->getCondition());
        self::$db->bind(":updatedAt", date('Y-m-d'));
        self::$db->execute();
        return self::$db->lastInsertedId();
    }

    public static function updateUserById(Products $product) {
        $sql = "UPDATE products SET productId = :productId, sellerId = :sellerId, title = :title, description = :description, price = :price, categoryId = :categoryId, condition = :condition, updatedAt = :updatedAt where userId = :userId";
        self::$db->query($sql);
        self::$db->bind(":productId", $product->getProductId());
        self::$db->bind(":sellerId", $product->getSellerId());
        self::$db->bind(":title", $product->getTitle());
        self::$db->bind(":description", $product->getDescription());
        self::$db->bind(":price", $product->getPrice());
        self::$db->bind(":categoryId", $product->getCategoryId());
        self::$db->bind(":condition", $product->getCondition());
        self::$db->bind(":updatedAt", date('Y-m-d'));
        self::$db->execute();
        return self::$db->lastInsertedId();
    }

    public static function deleteProductById(Products $product) {
        $sql = "DELETE FROM products WHERE productId = :productId and sellerId = :sellerId";
        self::$db->query($sql);
        self::$db->bind(":productId", $product->getProductId());
        self::$db->bind(":sellerId", $product->getSellerId());
        self::$db->execute();

        return self::$db->rowCount();
    }

    public static function getSingleProduct(int $productId){
        $sql = "SELECT * FROM products where productId = :productId";
        self::$db->query($sql);
        self::$db->bind(":productId", $productId);
        self::$db->execute();
        return self::$db->singleResult();
    }

    public static function getProductByCategory(string $type){
        $sql = "SELECT * FROM products left join categories on products.categoryId = categories.categoryId where categories.type = :type";
        self::$db->query($sql);
        self::$db->bind(":type", $type);
        self::$db->execute();
        return self::$db->singleResult();
    }


}