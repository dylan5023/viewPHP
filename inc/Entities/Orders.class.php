<?php

class Orders {
    private int $orderId;
    private int $sellerId;
    private int $buyerId;
    private int $productId;
    private int $quantity;
    private float $totalPrice;  
    private string $orderDate; 
    private string $status; 

    public function getOrderId():int { 
		return $this->orderId;
	}
    public function setOrderId(int $orderId) {
		return $this->orderId;
	}
 
	public function getSellerId():int {
		return $this->sellerId; 
	}

	public function setSellerId(int $sellerId) {
		$this->sellerId = $sellerId;
	}

	public function getBuyerId():int {
		return $this->buyerId; 
	}

	public function setBuyerId(int $buyerId) {
		$this->buyerId = $buyerId;
	}
   
	public function getProductId():int {
		return $this->productId;
	}

	public function setProductId(int $productId) {
		$this->productId = $productId;
	}


	// private int $quantity;
	public function getQuantity():int {
		return $this->quantity;
	}

	public function setQuantity(int $quantity) {
		$this->quantity = $quantity;
	}


    // private float $totalPrice; 
	public function getTotalPrice():float {
		return $this->totalPrice
	}

	public function setTotalPrice(float $totalPrice) {
		$this->totalPrice = $totalPrice;
	}


	// private string $orderDate; 
	public function getOrderDate():string {
		return $this->orderDate;
	}

	public function setOrderDate(string $orderDate) {
		$this->orderDate = $orderDate;
	}
    
	// private string $status;  
	public function getStatus():string {
		return $this->status;
	}

	public function setStatus(string $status) {
		$this->status = $status;
	}

}