<?php

/**
 * Create a Product compatible with Checkout
 *
 * @package new more powerful laser checkout system
 * @author Rachel Graves
 **/
class Product {

 protected $_productName;
 protected $_productCode;
 protected $_productPrice;
 
 
 /**
  * Assign properties to this object
  */
 public function __construct($productName, $productPrice, $productCode) {
   $this->_productName = $productName;
   $this->_productPrice = $productPrice; 
   $this->_productCode = $productCode;
 }
 
 /**
  * Return the name of the product
  */
 public function getName() {
   return $this->_productName;
 }
 
}