<?php

class OrderDAO {
    private static $db;

    public static function startDB() {
        // give an class name
        self::$db = new PDOAgent("Categories");
    }

    public static function getAllCategories() {
        $sql = "SELECT * FROM categories";
        self::$db->query($sql);
        self::$db->execute();
        return self::$db->resultSet();
    }

    public static function getCategoriesById(int $categoryId) {
        $sql = "SELECT * FROM categories WHERE categoryId = :categoryId";
        self::$db->query($sql);
        self::$db->bind(":categoryId", $categoryId);
        self::$db->execute();
 
        return self::$db->singleResult();
    }

    public static function insertCategory(Categories $category){
        $sql = "INSERT INTO categories (type) values (:type)";
        self::$db->query($sql); 
        self::$db->bind(":type", $category->getType());
        self::$db->execute();
        return self::$db->lastInsertedId();
    }


    public static function getCategoryType(string $type){
        $sql = "SELECT * FROM categories where type = :type";
        self::$db->query($sql);
        self::$db->bind(":type", $type);
        self::$db->execute();
        return self::$db->resultSet();
    }


}