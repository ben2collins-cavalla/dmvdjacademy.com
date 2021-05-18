## Commerce Cart Redirection##

Installation
* Same as standard Drupal modules. Composer is ideal.

Set up
* When first installed the module won't redirect any requests. 
* To redirect all add to cart events navigate to /admin/commerce/config/commerce_cart_redirection 
and either select all Product Bundles, OR select the 'Negate the Bundles condition' box and submit 
the form.  **NOTE** if you both select all product bundles AND negate then you will end up with 
nothing being redirected.

Thanks to Steve Oliver for the inspiration and bulk of the code:
* https://www.drupal.org/u/steveoliver
* https://steveoliver.github.io/2017/11/09/drupal-commerce-2-checkout-after-add-to-cart.html

 