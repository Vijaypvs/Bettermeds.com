<?php
 session_start();
 require_once( "cart.php" );
 $cart = new cart();
 $action = strip_tags( $_GET["action"] );
 switch ($action) {
  case "add":
   $cart->addToCart();
   break;
   case "remove":
   $cart->removeFromCart();
   break;
   case "empty":
   $cart->emptyCart();
   break;
 }
?>