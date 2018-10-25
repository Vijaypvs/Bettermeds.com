<?php
  session_start();
  require_once( "cart.php" );
  $cart = new cart();
  $cart->sendOrder();
  $cart->emptyCart();
  header("location:orderconfirmed.php");
 ?>