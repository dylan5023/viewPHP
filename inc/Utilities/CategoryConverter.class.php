<?php

class CategoryConverter {

    // To get From Database 
    public static function convertToStd($category) {
        if(!is_array($category)) {
            $stdObject = new stdClass;
            $stdObject->orderId = $category->getOrderId();
            $stdObject->sellerId = $category->getSellerId();
            $stdObject->buyerId = $category->getBuyerId();
            $stdObject->productId = $category->getProductId();
            $stdObject->quantity = $category->getQuantity();
            $stdObject->totalPrice  = $category->getTotalPrice();
            $stdObject->status = $category->getStatus();
            return $stdObject;
        } else {
            $stdObjectList = [];
            foreach($category as $category) {
                $stdObject = new stdClass;
                $stdObject->orderId = $category->getOrderId();
                $stdObject->sellerId = $category->getSellerId();
                $stdObject->buyerId = $category->getBuyerId();
                $stdObject->productId = $category->getProductId();
                $stdObject->quantity = $category->getQuantity();
                $stdObject->totalPrice  = $category->getTotalPrice();
                $stdObject->status = $category->getStatus();
                $stdObjectList[] = $stdObject;
            }
            return $stdObjectList;
        }
    }
    //To post into Database
    public static function convertToObj($stdObject) {
        if ( ! is_array($stdObject) ) {
            $newcategory = new Categories();
            $newcategory->setType($stdObject->type);
            return $newcategory;
        } else {
            $categoryList = [];
            foreach($stdObject as $newstdObject) {
                $newcategory = new Orders();
                $newcategory->setType($stdObject->type);
                $categoryList[] = $newcategory;
            }
            return $categoryList;
        }
    }
}