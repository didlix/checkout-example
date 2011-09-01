<?php

class Checkout {
  
  protected $_offers = array();
  
  /**
   * Assign offers to the checkout
   *
   * @param Array $offers
   */
  public function __construct($offers) {
    $this->_offers = $offers;
  }
  
  protected $_basket = array();
  
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
    $total = (int)0;
    
    $this->_calculateDiscounts($this->_basket);
    die('123');
    // Apply any offers to the basket
    $this->_basket = $this->__calculateDiscounts($this->_basket);
    
    foreach ($this->_basket as $product) {
      $total = $total + $product->price;
    }

    return $total;
  }
  
  /**
   * Calculate discounts on the basket
   */
  private function _calculateDiscounts($basket) {

    var_dump($this->_offers);
    foreach($this->_offers AS $offer) {  
      $basket = $offer->processBasket($basket);
    }
    
    return $basket;
  }
  
  
}