<?php

class Checkout {
  
  protected $_offers = array();
  protected $_basket = array();
    
  /**
   * Assign offers to the checkout
   *
   * @param Array $offers
   */
  public function __construct($offers) {
    $this->_offers = $offers;
  }
  
  /**
   * scan an item into the new more powerful laser checkout system   
   *
   * @return void
   * @author Rachel Graves
   **/
  public function scan(Product $product) {
    $this->_basket[] = $product;
  }
  
  /**
   * Analyse items in $_basket, apply any offers and return a total
   **/
  public function total() {
    $total = 0;
    
    
//     var_dump($this->_basket);
    // Apply any offers to the basket
    $this->_basket = $this->_calculateDiscounts($this->_basket);
    

    // var_dump($this->_basket);


    
    foreach ($this->_basket as $product) {
      $total = $total + $product->getPrice();
    }
echo "\r\ntotal:" . $total . "\r\n";
    return $total;
  }
  
  /**
   * Calculate discounts on the basket
   */
  private function _calculateDiscounts($basket) {

    foreach($this->_offers AS $offer) {  
      $basket = $offer->processBasket($basket);
    }

    return $basket;
  }
  
}