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
}