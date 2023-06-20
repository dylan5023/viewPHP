<?php

class UserConverter {

    // To get From Database 
    public static function convertToStd($user) {
        if(!is_array($user)) {
            $stdObject = new stdClass;
            $stdObject->userId = $user->getId();
            $stdObject->userName = $user->getUserName();
            $stdObject->email = $user->getEmail();
            $stdObject->password = $user->getPassword();
            $stdObject->address = $user->getAddress();
            $stdObject->updatedAt = $user->getUpdatedAt();
            $stdObject->picture = $user->getPicture();
            $stdObject->userType = $user->getUserType();

            return $stdObject;
        } else {
            $stdObjectList = [];
            foreach($user as $user) {
                $stdObject = new stdClass;
                $stdObject->userId = $user->getId();
                $stdObject->userName = $user->getUserName();
                $stdObject->email = $user->getEmail();
                $stdObject->password = $user->getPassword();
                $stdObject->phoneNumber = $user->getPhoneNumber();
                $stdObject->address = $user->getAddress();
                $stdObject->updatedAt = $user->getUpdatedAt();
                $stdObject->picture = $user->getPicture();
                $stdObject->userType = $user->getUserType();
                $stdObjectList[] = $stdObject;
            }
            return $stdObjectList;
        }
    }
    //To post into Database
    public static function convertToObj($stdObject) {
        if ( ! is_array($stdObject) ) {
            $newUser = new Users();
            $newUser->setUserName($stdObject->userName);
            $newUser->setEmail($stdObject->email);
            $newUser->setPassword($stdObject->password);
            $newUser->setPhoneNumber($stdObject->phoneNumber);
            $newUser->setAddress($stdObject->address);
            $newUser->setUpdatedAt(date('Y-m-d'));
            $newUser->setPicture($stdObject->picture);
            $newUser->setUserType($stdObject->userType);
            
            return $newUser;
        } else {
            $userList = [];
            foreach($stdObject as $newstdObject) {
                $newUser = new Users();
                $newUser->setUserName($newstdObject->userName);
                $newUser->setEmail($newstdObject->email);
                $newUser->setPassword($newstdObject->password);
                $newUser->setPhoneNumber($newstdObject->phoneNumber);
                $newUser->setAddress($newstdObject->address);
                $newUser->setUpdatedAt(date('Y-m-d'));
                $newUser->setPicture($newstdObject->picture);
                $newUser->setUserType($newstdObject->userType);
                $userList[] = $newUser;
            }
            return $userList;
        }
    }
}