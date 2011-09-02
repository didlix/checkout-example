<?php

require_once('checkout.php');
require_once('product.php');
require_once('offer.php');

// TESTS!->total()

/**
 * Basket: FR1,SR1,FR1,FR1,CF1
 * Total price expected: ¬£22.45
 */
function test_case_one($offers) {
    
  $co = new Checkout($offers);
  
  $co->scan(new Product('Fruit tea', 3.11, 'FR1'));
  $co->scan(new Product('Strawberries', 5, 'SR1'));
  $co->scan(new Product('Fruit tea', 3.11, 'FR1'));
  $co->scan(new Product('Fruit tea', 3.11, 'FR1'));
  $co->scan(new Product('Coffee', 11.23, 'CF1'));
  
  if($co->total() === 22.45) { return TRUE; }
  
  return FALSE;
}

/**
 * Basket: FR1,FR1
 * Total price expected: ¬£3.11
 */
function test_case_two($offers) {
  
  $co = new Checkout($offers);

  $co->scan(new Product('Fruit tea', 3.11, 'FR1'));
  $co->scan(new Product('Fruit tea', 3.11, 'FR1')); 
  
  if($co->total() === 3.11) { return TRUE; }
  
  return FALSE;
  
}

/**
 * Basket: SR1,SR1,FR1,SR1
 * Total price expected: ¬£16.61
 */
function test_case_three($offers) {
  
  $co = new Checkout($offers);

  $co->scan(new Product('Strawberries', 5, 'SR1'));
  $co->scan(new Product('Strawberries', 5, 'SR1'));  
  $co->scan(new Product('Fruit tea', 3.11, 'CF1'));
  $co->scan(new Product('Strawberries', 5, 'SR1'));
  
  if($co->total() === 16.61) { return TRUE; }
  
  return FALSE;
  
}

// Setup the products for the demo
$fruit_tea = new Product('Fruit tea', 3.11, 'FR1');
$strawberries = new Product('Strawberries', 5, 'SR1');
$coffee = new Product('Coffee', 11.23, 'CF1');


$offers = array();
$strawberries_offer = new Offer($strawberries);
$strawberries_offer->bulkDiscount(3, .10); 
$offers[] = $strawberries_offer;

$fruit_tea_offer = new Offer($fruit_tea);
$fruit_tea_offer->bogof(true);
$offers[] = $fruit_tea_offer;

// var_dump($offers);

$tests[] = test_case_one($offers);
$tests[] = test_case_two($offers);
$tests[] = test_case_three($offers);

foreach($tests AS $test) {
  if(false === $test) {
    $errors = true;
  } else { 
    $errors = false;
  }
  
  
}

if($errors !== true) {
  echo "The new more powerful laser checkout system is fully armed and operational!\r\n";
  echo "aka all tests passed!";
}