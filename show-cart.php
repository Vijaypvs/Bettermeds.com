<?php
session_start();
 require_once("cart.php");
if(!isset($_SESSION['logged_in'])){
    echo "<script type='text/javascript'>
    alert('Please login');
    location='login.html';
    </script>";

}
$showDivFlag=false;
if(isset($_SESSION['logged_in'])){
 $showDivFlag=true;
}
?>
<html xmlns = "http://www.w3.org/1999/xhtml">
 <head>
  <title>Cart</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css" type="text/css">
  <meta http-equiv = "Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
  <script type="text/javascript">
    $( document ).ready( function() {
      $("span.removeFromCart" ).on( "click" , function() {
    var id = $(this).attr( "data-id" );
    $.ajax({
      type: "GET",
      url: "add_to_cart.php?id=" + id + "&action=remove"
    })
    .done(function()
    {
      alert("Product has been removed.");
      location.reload();
    });
  });
  $( "a.emptyCart" ).on( "click" , function() {
    $.ajax({
      type: "GET",
      url: "add_to_cart.php?action=empty"
    })
    .done(function()
    {
      alert("The cart has been emptied.");
      location.reload();
    });
  });
});
  </script>
 </head>
 <body style="background-color: azure; color: darkgreen;">
    <div class="sidebar" style="display:none" id="mySidebar">
    <ul>
    <li><a onclick="close()" id="closeside">&#10008;Close </a></li>
    <li><a href="account_details.php" class="w3-bar-item w3-button">MyAccount</a></li>
    <li><a href="myorders.html" class="w3-bar-item w3-button">MyOrders</a></li>
    <li><a href="yourcart.php" class="w3-bar-item w3-button">MyCart</a></li>
    <li><a href="offers.html" class="w3-bar-item w3-button">MyOffers</a></li>
    <li><a href="" class="w3-bar-item w3-button">HelpCentre</a></li>
  </ul>
</div>
<div class="logo">
   <span ><strong><img src="logo.png" width="7%" height="7%"><i style="vertical-align: center">Better meds!</i></strong></span><br></div>
<div class="headers">

  <form method="post" action="productsearch.php">
      <div id="searchbox">
      <span style="position: relative;">
        <span onclick="open()" id="menu"><i class="fa fa-bars fa-lg" style="color: azure">  </i>
        </span>
        <input type="text" id="search" name="Search" placeholder="search here">
        <button id="Submit" type="submit" style="height:0.27in"> 
        <i class="fa fa-search"></i></button>
      </span>
</div>
  </form>

        <span class="sides">
        <a class="cart" href="show-cart.php"><i class="fa fa-cart-plus fa-lg" style="color: azure">  </i>
        </a>
&emsp;
<span id="account_name" <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>><?php echo $_SESSION['Name'];?></span>
&emsp;
        <a class="user" href="account_details.php"><i class="fa fa-user fa-lg" style="color: azure">  </i>
        </a>
&emsp;
<a class="logout" href="logout.php"><button <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>Logout</button><!-- <i class="fa fa-user fa-lg" style="color: azure">  </i> -->
        </a>
&emsp;

      </span>
    <nav class="nav">
      <ul>
        <li><a class="nav-item" href=""><span><i class="fa fa-home"></i>Home</span> </a></li>
        <li class="dropdown"><a class="nav-item" href=""  ><span>Explore <i class="fa fa-chevron-down fa-xs"></i></span> </a>
        <div class="dropdown-content">
          <a href="prescription.html"><img src="medical-prescription.png" class="icon1">  </img>Prescription</a>
        <a href="#"><img src="support.png" class="icon2"></img>Lifestyle</a>
        <a href="#"><img src="running.png" class="icon3"></img>Fitness</a>
        <a href="#"><img src="icon.png" class="icon4"></img>Devices</a>
        <a href="#"><img src="familiar-group-of-three.png" class="icon5"></img>Family Care</a>
      </div>
        </li>
        <li><a class="nav-item" href="health_library.html"><span>Health Library</span> </a></li>
        <li><a class="nav-item" href="productpage.php"> <span>Daily Meds</span> </a></li>
        <li><a class="nav-item" href=""> <span>Touring Meds</span> </a></li>
       </ul>
  </nav>
</div>

<div style="margin: 100px;">

  <h1>Cart</h1><br><br>
  <?php
   $cart = new cart();
   $products = $cart->getCart();
  ?>
  <table cellpadding="5" cellspacing="0" border="0" >
   <tr>
    <td style="width: 200px"><b>Product</b></td>
    <td style="width: 200px"><b>Count</b></td>
    <td style="width: 200px"><b>Total</b></td>
    <td style="width: 200px">Action</td>
   </tr>
   <?php
    foreach($products as $product){
   ?>
    <tr>
     <td><?php print HtmlSpecialChars($product->product); ?></td>
     <td><?php print $product->count; ?></td>
     <td>₹<?php print $product->total; ?></td>
     <td style="text-align: center"><span style="cursor:pointer;" class="removeFromCart" data-id="<?php print $product->id; ?>">remove from cart</span></td>
    </tr>
   <?php 
    }
   ?>
  </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <a href="checkout.php" title="Checkout" style="color: azure; background-color: darkgreen;padding: 15px; border-radius: 5px;">Checkout</a><br><br>
  <br /><a href="productpage.php" title="go back to products">Go back to products</a><br>
  <a href="javascript:void(0);" class="emptyCart" title="empty cart">Empty cart</a>
  </div>

<br><br><br><br>
  <footer>
            <div class="row"><hr><br>
            <div class="Col-1">
                COMPANY INFO:<br>
                <a href="about_us.html">About Bettermeds.com</a><br>
                <a href="terms.html">Terms and Conditions</a><br>
                <a href="privacy.html">Privacy Policy</a><br>
            </div>
            
            <div class="Col-2">
                &#9888; Need Help?<br>
                &#9743; 100-250-1006<br>
                <a id="bottom">&#9755; care&#64;bettermeds.com</a><br><br>
            </div>
            <br>
            <hr>
            <div class="footer">
                Copyright &copy; 2018 Bettermeds Marketplace Limited. All rights reserved
            </div>
            </div>
        </footer>
<script type="text/javascript">
  document.getElementById("menu").onclick=function() {open()};
  document.getElementById("closeside").onclick=function() {close()};
  function open() {
    document.getElementById("mySidebar").style.display = "block";
}
function close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
 </body>
</html>
