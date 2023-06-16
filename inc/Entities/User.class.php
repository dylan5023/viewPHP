 <?php

class Users {
    private int $userId;
	private string $userName; 
    private string $email;
    private string $password;
    private string $phoneNumber;
    private string $address;
    private string $createdAt;
    private string $updatedAt;
    private string $picture;
    private string $userType;

	public function getUserId():int {
		return $this->userId;
	}

	public function getUserName():string {
		return $this->userName;
	}

	public function setUserName(string $userName) {
		$this->userName = $userName;
	}


	public function getEmail():string {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}



	public function getPassword():string {
		return $this->password;
	}

	public function setPassword(string $password) {
		$this->password = $password;
	}


    // private string $phoneNumber;
    public function getPhoneNumber():string {
		return $this->phoneNumber;
	}

	public function setPhoneNumber(string $phoneNumber) {
		$this->phoneNumber = $phoneNumber;
	}

	// private string $address;
	public function getAddress():string {
		return $this->address;
	}

	public function setAddress(string $address) {
		$this->address = $address;
	}

	// private string $createdAt;
	public function getCreatedAt():string {
		return $this->createdAt;
	}

	public function setCreatedAt(string $createdAt) {
		$this->createdAt = $createdAt;
	}

	// private string $updatedAt;
	public function getUpdatedAt():string {
		return $this->updatedAt;
	}

	public function setUpdatedAt(string $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	// private string $picture;
	public function getPicture():string {
		return $this->picture;
	}

	public function setPicture(string $picture) {
		$this->picture = $picture;
	}

	// private string $userType;
	public function getUserType():string {
		return $this->userType;
	}

	public function setUserType(string $userType) {
		$this->userType = $userType;
	}

}