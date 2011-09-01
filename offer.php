<?php


/**
 * Provide a system for creating offers
 *
 * @package new more powerful laser checkout system
 * @author Rachel Graves
 **/
class Offer {

  protected $_id = null;
  protected $_bogof = false;
  protected $_bulkDiscount = false;
  protected $_product;
  
  /**
   * @param Product $product
   */
  public function __construct(Product $product) {
    $this->_id = uniqid('offer');
    $this->_product = $product;
  }
  
  /**
   * Add a Buy one Get one Free to this Offer
   **/
  public function bogof($setting = false) {
    $this->_bogof = $setting;
  }
  
  /**
   * Add a bulk discount
   */
  public function bulkDiscount($quantity, $discount) {
    $this->bulkDiscount = array('quantity' => $quantity, 'discount' => $discount);
  }
  
  /**
   * Apply offers to an array of products
   */
  public function processBasket($basket) {

    // Calculate the number of products that match this offer in the basket
    $noProducts = 0;
    foreach($basket AS $product) {
      if($product->name === $this->_product->name) {
        $noProducts++;
      } 
    } 
   
    // Apply bulk purchase price reductions
    if(is_array($this->_bulkDiscount) && $noProducts >= $this->_bulkDiscount['quantity']) {
      foreach($products AS $key => $product) {
        var_dump($key);
        var_dump($product);
      }
    }
    
    // Apply bogof offers
    if(true === $this->_bogof && $noProducts >= 2) {
      foreach($products AS $key => $product) {
        var_dump($key);
        var_dump($product);        
      }
    }
    
    return $basket;
   
  }
  
}