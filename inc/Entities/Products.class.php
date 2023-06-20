<?php

class Products {
    private int $productId;
    private string $sellerId;
    private string $title;
    private string $description;
    private float $price;
    private int $categoryId;  
    private string $conditions; 
    private string $createdAt; 
    private string $updatedAt; 

    public function getproductId():int { 
		return $this->productId;
	}
    public function setproductId(int $productId) {
		return $this->productId;
	}
 
	public function getSellerId():string {
		return $this->sellerId; 
	}

	public function setSellerId(string $sellerId) {
		$this->sellerId = $sellerId;
	}
   
	public function getTitle():string {
		return $this->title;
	}

	public function setTitle(string $title) {
		$this->title = $title;
	}


	public function getDescription():string {
		return $this->description;
	}

	public function setDescription(string $description) {
		$this->description = $description;
	}


    // private float $price;
	public function getPrice():float {
		return $this->price;
	}

	public function setPrice(float $price) {
		$this->price = $price;
	}


	// private string $department;
	public function getCategoryId():int {
		return $this->categoryId;
	}

	public function setCategoryId(int $categoryId) {
		$this->categoryId = $categoryId;
	}
    
	// private string $condition; 
	public function getCondition():string {
		return $this->conditions;
	}

	public function setCondition(string $conditions) {
		$this->conditions = $conditions;
	}

    // private string $updatedAt; 
    public function getUpdatedAt():string {
		return $this->updatedAt;
	}

	public function setUpdatedAt(string $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

    // private string $createdAt; 
    public function getCreatedAt():string {
		return $this->createdAt;
	}

	public function setCreatedAt(string $createdAt) {
		$this->createdAt = $createdAt;
	}
}