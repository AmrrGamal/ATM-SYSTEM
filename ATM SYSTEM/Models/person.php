<?php 

 class Person {
   private $PIN ;
   private $password;
   private $phone;
   private $name;
   private $address;
   private $role;
   private $ssn;
   private $userStatus;

   public function getUserStatus() {
    return $this->userStatus;
}

   public function getPIN() {
       return $this->PIN;
   }

   public function getPassword() {
       return $this->password;
   }

   public function getPhone() {
       return $this->phone;
   }

   public function getName() {
       return $this->name;
   }

   public function getAddress() {
       return $this->address;
   }

   public function getRole() {
       return $this->role;
   }

   public function getSsn() {
       return $this->ssn;
   }
   public function setPIN($PIN): void {
       $this->PIN = $PIN;
   }

   public function setPassword($password): void {
       $this->password = $password;
   }

   public function setPhone($phone): void {
       $this->phone = $phone;
   }

   public function setName($name): void {
       $this->name = $name;
   }

   public function setAddress($address): void {
       $this->address = $address;
   }

   public function setRole($role): void {
       $this->role = $role;
   }

   public function setSsn($ssn): void {
       $this->ssn = $ssn;
   }

   public function setUserStatus($userStatus): void {
    $this->userStatus = $userStatus;
}
   
   
   






 }



?>