<?php
$mysqli = mysql_connect("localhost","root","");
if (!$mysqli)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("bettermeds", $mysqli);
$name = filter_input(INPUT_POST, 'name');
$Mobile = filter_input(INPUT_POST, 'mobile');
$Email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$addressline1= filter_input(INPUT_POST,'addline1');
$addressline2 = filter_input(INPUT_POST, 'addline2');
$addressline3 = filter_input(INPUT_POST, 'addline3');
$DOB=filter_input(INPUT_POST,'dob');
$pswd=password_hash("$password", PASSWORD_DEFAULT);
$result = mysql_query("select * from users;");
$exists=0;
while ($row = mysql_fetch_array($result)) {
	if($Mobile==$row['Mobile']){
		$exists=1;
	}
}
if($exists==1){
	echo "<script type='text/javascript'>
 	alert('Mobile number already exists!!');
 	location='login.html';
 	</script>";
}
else{
$sql="INSERT users values ('$name','$Email','$Mobile','$DOB','$addressline1','$addressline2','$addressline3','$pswd')";
if (mysql_query($sql)){
          echo "<script type='text/javascript'>
 	alert('Registration Complete. Please login');
 	location='login.html';
 	</script>";
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
}
        $mysqli->close();
?>