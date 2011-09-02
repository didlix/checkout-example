# New more powerful laser checkout system

Please see:

http://www.youtube.com/watch?v=Cu7gzjK16oc#t=2m57s


## Running the checkout tests

You can run the checkout by running:

php -f tests.php

This has been tested with:

PHP 5.3.6 with Suhosin-Patch (cli) (built: Jun 16 2011 22:26:57) 
Copyright (c) 1997-2011 The PHP Group
Zend Engine v2.3.0, Copyright (c) 1998-2011 Zend Technologies

On Mac OS X Lion.


## Hindsight

If I were to do this again / work on it further / have more time; I would:

* Make it so you can add/remove offer objects at any time.
* Put in some flexibility to cater for a product having multiple offers / one offer disabling other offers. At present, if you were to assign multiple offers the checkout would run all of them.
* Add error handling so that you can't set both bogof and bulk discount.
* Be rid of arrays and use more objects
* Use phpdoc tags properly / learn how to use textmate properly.
* Would change offer->processBasket(), I was rushing to get things finished at this point, I don't like the way I have done it.