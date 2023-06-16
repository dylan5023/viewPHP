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
}