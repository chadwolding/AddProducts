<?php
/**
 * Created by PhpStorm.
 * User: 15258
 * Date: 4/17/2018
 * Time: 10:43 AM
 */

// The class to represent an electronic.
class Electronics extends Product{

    // Tells if the product is recyclable.
    private $recyclable;

    // Gets if the electronic is recyclable.
    public function getRecyclable(){
        return $this->recyclable;
    }

    // Sets if the electronic is recyclable.
    public function setRecyclable($val){
        $this->recyclable = $val;
    }
}