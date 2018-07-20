<?php
/**
 * Created by PhpStorm.
 * User: 15258
 * Date: 4/17/2018
 * Time: 10:43 AM
 */

// The class to represent a tool.
class Tools extends Product {

    // The shipper of the tool(UPS, FedEx, USPS).
    private $shipper;

    // THe weight of the tool.
    private $weight;

    // Gets the shipper of the tool.
    public function getShipper(){
        return $this->shipper;
    }

    // Sets the shipper of the tool.
    public function setShipper($val){
        $this->shipper = $val;
    }

    // Gets the weight of the tool.
    public function getWeight(){
        return $this->weight;
    }

    // Sets the weight of the tool.
    public function setWeight($val){
        $this->weight = $val;
    }

}