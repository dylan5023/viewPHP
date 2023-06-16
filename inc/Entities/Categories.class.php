<?php

class Categories {
    private int $categoryId;
    private string $type;
    private string $name;


    public function getCategoryId():int { 
		return $this->categoryId;
	}
    public function setCategoryId(int $categoryId) {
		return $this->categoryId;
	}
 
	public function getType():string {
		return $this->type; 
	}

	public function setType(string $type) {
		$this->type = $type;
	}
   
}