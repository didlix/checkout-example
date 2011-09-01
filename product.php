<?php

/**
 * Create a Product compatible with Checkout
 *
 * @package new more powerful laser checkout system
 * @author Rachel Graves
 **/
class Product {
 

 public $_productName;
 public $_productCode;
 public $_productPrice;
 
 
 public function __construct($productName, $productPrice, $productCode) {
   $this->_productName = $productName;
   $this->_productPrice = $productPrice; 
   $this->_productCode = $productCode;
 }
 
}