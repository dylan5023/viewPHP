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
                $stdObject->address = $user->getAddress();
                $stdObject->updatedAt = $user->getUpdatedAt();
                $stdObject->picture = $user->getPicture();
                $stdObject->userType = $user->getUserType();
                $stdObjectList[] = $stdObject;
            }
            return $stdObjectList;
        }
    }
}