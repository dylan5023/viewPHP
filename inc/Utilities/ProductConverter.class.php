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
            $stdObject->conditions = $product->getCondition();
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
                $stdObject->conditions = $product->getCondition();
                $stdObject->updatedAt = $product->getUpdatedAt();
                $stdObjectList[] = $stdObject;
            }
            return $stdObjectList;
        }
    }
    //To post into Database
    public static function convertToObj($stdObject) {
        if ( ! is_array($stdObject) ) {
            $newProduct = new Products();
            $newProduct->setSellerId($stdObject->sellerId);
            $newProduct->setTitle($stdObject->title);
            $newProduct->setDescription($stdObject->description);
            $newProduct->setPrice($stdObject->price);
            $newProduct->setCategoryId($stdObject->categoryId);
            $newProduct->setCondition($stdObject->conditions);
            $newProduct->setUpdatedAt(date('Y-m-d'));
            return $newProduct;
        } else {
            $productList = [];
            foreach($stdObject as $newstdObject) {
                $newProduct = new Products();
                $newProduct->setSellerId($newstdObject->sellerId);
                $newProduct->setTitle($newstdObject->title);
                $newProduct->setDescription($newstdObject->description);
                $newProduct->setPrice($newstdObject->price);
                $newProduct->setCategoryId($newstdObject->categoryId);
                $newProduct->setCondition($newstdObject->conditions);
                $newProduct->setUpdatedAt(date('Y-m-d'));
                $productList[] = $newProduct;
            }
            return $productList;
        }
    }
}