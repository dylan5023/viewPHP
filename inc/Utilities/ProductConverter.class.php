<?php

class ProductConverter {

    // To get From Database 
    public static function convertToStd($product) {
        if(!is_array($product)) {
            $stdObject = new stdClass;
            $stdObject->productId = $product->getproductId();
            $stdObject->sellerId = $product->getSellerId();
            $stdObject->title = $product->getTitle();
            $stdObject->description = $product->getDescription();
            $stdObject->price = $product->getPrice();
            $stdObject->categoryId = $product->getCategoryId();
            $stdObject->condition = $product->getCondition();
            $stdObject->createdAt = $product->getCreatedAt();
            $stdObject->updatedAt = $product->getUpdatedAt();

            return $stdObject;
        } else {
            $stdObjectList = [];
            foreach($product as $product) {
                $stdObject = new stdClass;
                $stdObject->productId = $product->getproductId();
                $stdObject->sellerId = $product->getSellerId();
                $stdObject->title = $product->getTitle();
                $stdObject->description = $product->getDescription();
                $stdObject->price = $product->getPrice();
                $stdObject->categoryId = $product->getCategoryId();
                $stdObject->condition = $product->getCondition();
                $stdObject->updatedAt = $product->getUpdatedAt();
                $stdObjectList[] = $stdObject;
            }
            return $stdObjectList;
        }
    }
}