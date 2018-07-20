<?php
/**
 * Created by PhpStorm.
 * User: 15258
 * Date: 4/17/2018
 * Time: 10:43 AM
 */

// The class to represent a product.
class Product{

    // The title of the product.
    private $title;

    // The description of the product.
    private $description;

    // The price of the product.
    private $price;

    // Gets the title of the product.
    public function getTitle(){
        return $this->title;
    }

    // Sets the title of the product.
    public function setTitle($val){
        $this->title = $val;
    }

    // Gets the description of the product.
    public function getDescription(){
        return $this->description;
    }

    // Sets the description of the product.
    public function setDescription($val){
        $this->description = $val;
    }

    // Gets the price of the product.
    public function getPrice(){
        return $this->price;
    }

    // Sets the price of the product.
    public function setPrice($val){
        $this->price = $val;
    }

    public function AddProductToDB($productChoice, $title, $description, $price, $shipper, $weight, $recyclable){

        $connection = getConnection();

        $query = $connection->prepare("INSERT INTO products SET type=:type, title=:title, description=:description, price=:price, shipper=:shipper, weight=:weight, recyclable=:recyclable");
        $query->bindParam(":type", $productChoice);
        $query->bindParam(":title", $title);
        $query->bindParam(":description", $description);
        $query->bindParam(":price", $price);
        $query->bindParam(":shipper", $shipper);
        $query->bindParam(":weight", $weight);
        $query->bindParam(":recyclable", $recyclable);
        $query->execute();

        echo "<script>alert('Success, You have added $title (description: $description) to the database.')</script>";

    }

}