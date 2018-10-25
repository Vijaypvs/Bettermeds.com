<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("bettermeds", $con);
class Cart {
public function getProducts(){
  $arr = array();
  $statement = "select Batch_No,Name, Price from medicines order by Name";
  $result=mysql_query($statement);
  while ($row = mysql_fetch_array($result)) {
   $line = new stdClass;
   $line->id = $row['Batch_No']; 
   $line->product = $row['Name']; 
   $line->price = $row['Price'];
   $arr[] = $line;
  }
  mysql_close();
  return $arr;
 }

public function getProductsByName($search){
  $arr = array();
  $statement = "select Batch_No,Name,Price from medicines where Name like '%".$search."%'";
  $result=mysql_query($statement);
  while ($row = mysql_fetch_array($result)) {
   $line = new stdClass;
   $line->id = $row['Batch_No']; 
   $line->product = $row['Name']; 
   $line->price = $row['Price'];
   $arr[] = $line;
  }
  mysql_close();
  return $arr;
 }

public function addToCart() {
  $id = intval($_GET["id"]);
  if($id > 0) {
   if($_SESSION['cart'] != "") {
    $cart = json_decode( $_SESSION['cart'], true);
    $found = false;
    for($i=0; $i<count($cart); $i++) {
     if($cart[$i][ "product" ] == $id){
      $cart[$i]["count"] = $cart[$i]["count"] + 1;
      $found = true;
      break;
     }
    }
    if(!$found) {
     $line = new stdClass;
     $line->product = $id; 
     $line->count = 1;
     // $_SESSION['totalamt']=+$line->price;
     $cart[] = $line;
    }
    $_SESSION['cart'] = json_encode($cart);
   } else {
    $line = new stdClass;
    $line->product = $id; 
    $line->count = 1;
    // $_SESSION['totalamt']=+$line->price;
    $cart[] = $line;
    $_SESSION['cart'] = json_encode($cart);
   }
   // $_SESSION['total']=$total;
  }
 }
 
 public function getCart(){ 
  $cartArray = array(); 
  if($_SESSION['cart'] != ""){ 
   $cart = json_decode($_SESSION['cart'], true); 
   for($i=0;$i<count($cart);$i++){ 
    $lines = $this->getProductData($cart[$i]["product"]); 
    $line = new stdClass; 
    $line->id = $cart[$i]["product"]; 
    $line->count = $cart[$i]["count"]; 
    $line->product = $lines->product; 
    $line->total = ($lines->price*$cart[$i]["count"]); 
    $cartArray[] = $line; 
   }
  }
  return $cartArray; 
 } 

private function getProductData($id) {
  $statement ="select Name, Price from medicines where Batch_No = $id limit 1";
  $result=mysql_query($statement);
  $row=mysql_fetch_array($result);
  $line = new stdClass;
  $line->product = $row['Name']; 
  $line->price = $row['Price'];
  return $line;
  mysql_close();
 }

public function sendOrder(){
  $arr = array();
 $total = 0;

 $cart = $this->getCart();

 for($i=0; $i<count($cart); $i++){
  $total += $cart[$i]->total;
 } 
 $_SESSION['totalamt']=$total;
 $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("bettermeds", $con);

 // $statement = $dbConnection->prepare( "insert into order( name, email, total) value(?, ?, ?)" );
 // $statement->bind_param( 'ssd', $name, $email, $total);
 // $statement->execute();
 // $newid = $statement->insert_id;
 // $statement->close();

 // for($i=0; $i<count($cart); $i++){
 //  $statement = "insert orders value(".$_SESSION['Order_no'].",". $_SESSION['Name']."," . $cart[$i]->product . ",". $cart[$i]->count.",". $cart[$i]->total.")";
 //  mysql_query($statement);
 //  mysql_close();
 // }
 // $arr = array();

 // $cart = $this->getCart();

 // for($i=0; $i<count($cart); $i++){
 //  $total += $cart[$i]->total;
 // }
 // $total;
}

 public function removeFromCart() {
    $id = intval( $_GET["id"] );
    if($id > 0) {
      if($_SESSION[ 'cart' ] != "") {
        $cart = json_decode( $_SESSION['cart'], true);
        for($i=0; $i<count($cart); $i++){
          if($cart[$i][ "product" ] == $id){
            $cart[$i][ "count" ] = $cart[$i]["count"]-1;
            if($cart[$i][ "count" ] < 1){
              unset($cart[$i]);
            }
            break;
          }
        }
        $cart = array_values($cart);
        $_SESSION['cart'] = json_encode($cart);
      }
    }
  }
  
  public function emptyCart() {
    $_SESSION['cart'] = "";
  }


}
?>