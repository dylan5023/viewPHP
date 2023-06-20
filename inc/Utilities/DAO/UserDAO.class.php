<?php

class UserDAO {
    private static $db;

    public static function startDB() {
        // give an class name
        self::$db = new PDOAgent("Users");
    }
    public static function getAllUsers() {
        $sql = "SELECT * FROM users";
        self::$db->query($sql);
        self::$db->execute();
        return self::$db->resultSet();
    }

    public static function getUserByUserName(string $userName) {
        $sql = "SELECT * FROM users WHERE userName = :userName";
        self::$db->query($sql);
        self::$db->bind(":userName", $userName);
        self::$db->execute();

        return self::$db->singleResult();
    }

    public static function insertUser( User $user){
        $sql = "INSERT INTO users (userName, email, password, phoneNumber, address, updatedAt) values (:userName, :email,:password,:phoneNumber, :address, :updatedAt)";
        self::$db->query($sql);
        self::$db->bind(":userName", $user->getUserName());
        self::$db->bind(":email", $user->getEmail());
        self::$db->bind(":password", $user->getPassword());
        self::$db->bind(":phoneNumber", $user->getPhoneNumber());
        self::$db->bind(":address", $user->getAddress());
        self::$db->bind(":updatedAt", date('Y-m-d'));
        self::$db->execute();
        return self::$db->lastInsertedId();
    }

    public static function updateUserById(User $newUser) {
        $sql = "UPDATE users SET userId = :userId, userName = :userName, email = :email, password = :password, phoneNumber = :phoneNumber, address = :address, updatedAt = :updatedAt where userId = :userId";

        self::$db->query($sql);
        self::$db->bind(":userId", $newUser->getUserId());
        self::$db->bind(":userName", $newUser->getUserName());
        self::$db->bind(":email", $newUser->getEmail());
        self::$db->bind(":password", $newUser->getPassword());
        self::$db->bind(":phoneNumber", $newUser->getPhoneNumber());
        self::$db->bind(":address", $newUser->getAddress());
        self::$db->bind(":updatedAt", date('Y-m-d'));
        self::$db->execute();
        return self::$db->lastInsertedId();
    }

    public static function deleteUserById(int $userId) {
        $sql = "DELETE FROM users WHERE userId = :userId";

        self::$db->query($sql);
        self::$db->bind(":userId", $userId);
        self::$db->execute();

        return self::$db->rowCount();
    }

    public static function getSingleUser(int $userId){
        $sql = "SELECT * FROM users where userId = :userId";
        self::$db->query($sql);
        self::$db->bind(":userId", $userId);
        self::$db->execute();
        return self::$db->singleResult();
    }

}