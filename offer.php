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
   * Set a unique ID for this object and assign the product to the offer.
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
   * Add a bulk discount percentile
   */
  public function bulkDiscount($quantity, $discount) {
    $this->_bulkDiscount = array('quantity' => $quantity, 'discount' => $discount);
  }
  
  /**
   * Apply offers to an array of products
   */
  public function processBasket($basket) {

    // Calculate the number of products that match this offer in the basket
    $noProducts = 0;

    foreach($basket AS $key => $product) {
        if($product->getName() === $this->_product->getName()) {
          $noProducts++;
        } 
    } 

    // Apply bulk purchase price reductions
    if(is_array($this->_bulkDiscount) && $noProducts >= $this->_bulkDiscount['quantity']) {

      foreach($basket AS $key => $product) {
        if($product->getName() === $this->_product->getName()) {
          $percentile = 1 - $this->_bulkDiscount['discount'];
          $newPrice = $product->getPrice() * $percentile;
          $product->setPrice($newPrice);
          $basket[$key] = $product;
        }
      } // foreach

      return $basket;
    }

    // Apply bogof offers
    if(true === $this->_bogof && $noProducts >= 2) {
      foreach($basket AS $key => $product) {
        if($product->getName() === $this->_product->getName()) {
          $offerProducts[$key] = $product;
        }   
      }

      $noOfOfferProducts = count($offerProducts);
      $i = 1;
      foreach($offerProducts AS $key => $product) {
        if($i % 2 === 0) {
          $product->setPrice(0);
          $basket[$key] = $product;
        }
        $i++;
      }
      
      return $basket;      
    }

    return $basket;

  }
  
}