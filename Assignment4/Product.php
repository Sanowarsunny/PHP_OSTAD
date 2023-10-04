<?php
class Product {
    // TODO: Add properties
    public $id;
    public $name;
    public $price;
    
    public function __construct(int $id, string $name, float $price) {
        // TODO: Initialize properties
        $this->id =$id;
        $this->name =$name;
        $this->price =$price;
        
    }

    // TODO: Add getFormattedPrice method
    public function getFormattedPrice(){
        return "$".number_format($this->price, 2);
    }

    // TODO: Add showDetails method
    public function showDetails(){
        echo "Product Details:\n";
        echo "Id : ".$this->id."\n";
        echo "Name : ".$this->name."\n";
        echo "Price : ".$this->getFormattedPrice()."\n";
        echo "\n";
    }
}

// Test the Product class
$product = new Product(1, 'T-shirt', 19.0045);
$product->showDetails();

$product1 = new Product(2, 'L-shirt', 19.455);
$product1->showDetails();

$product2 = new Product(3, 'M-shirt', 19.809);
$product2->showDetails();







?>