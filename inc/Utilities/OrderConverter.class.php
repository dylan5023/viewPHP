<?php

class OrderConverter {

    // To get From Database 
    public static function convertToStd($order) {
        if(!is_array($order)) {
            $stdObject = new stdClass;
            $stdObject->orderId = $order->getOrderId();
            $stdObject->sellerId = $order->getSellerId();
            $stdObject->buyerId = $order->getBuyerId();
            $stdObject->productId = $order->getProductId();
            $stdObject->quantity = $order->getQuantity();
            $stdObject->totalPrice  = $order->getTotalPrice();
            $stdObject->status = $order->getStatus();


            return $stdObject;
        } else {
            $stdObjectList = [];
            foreach($order as $order) {
                $stdObject = new stdClass;
                $stdObject->orderId = $order->getOrderId();
                $stdObject->sellerId = $order->getSellerId();
                $stdObject->buyerId = $order->getBuyerId();
                $stdObject->productId = $order->getProductId();
                $stdObject->quantity = $order->getQuantity();
                $stdObject->totalPrice  = $order->getTotalPrice();
                $stdObject->status = $order->getStatus();
                $stdObjectList[] = $stdObject;
            }
            return $stdObjectList;
        }
    }
    //To post into Database
    public static function convertToObj($stdObject) {
        if ( ! is_array($stdObject) ) {
            $newOrder = new Orders();
            $newOrder->setSellerId($stdObject->sellerId);
            $newOrder->setBuyerId($stdObject->buyerId);
            $newOrder->setProductId($stdObject->productId);
            $newOrder->setQuantity($stdObject->quantity);
            $newOrder->setTotalPrice($stdObject->totalPrice);
            $newOrder->setStatus($stdObject->status);
            return $newOrder;
        } else {
            $orderList = [];
            foreach($stdObject as $newstdObject) {
                $newOrder = new Orders();
                $newOrder->setSellerId($newstdObject->sellerId);
                $newOrder->setBuyerId($newstdObject->buyerId);
                $newOrder->setProductId($newstdObject->productId);
                $newOrder->setQuantity($newstdObject->quantity);
                $newOrder->setTotalPrice($newstdObject->totalPrice);
                $newOrder->setStatus($newstdObject->status);
                $orderList[] = $newOrder;
            }
            return $orderList;
        }
    }
}