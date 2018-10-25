<?php
session_start();
$mysqli = mysqli_connect("localhost","root","","bettermeds");
$mobno = filter_input(INPUT_POST, 'mobno');
$password=filter_input(INPUT_POST, 'password');
$result_pass = $mysqli->query("SELECT * FROM users WHERE Mobile='$mobno'");
if ( $result_pass->num_rows == 0 ){ // User doesn't exist
    echo "<script type='text/javascript'>
    alert('User Doesn't exist');
    location='login.html';
    </script>";
    }
else { // User exists*/
    $user = $result_pass->fetch_assoc();
    if (password_verify($password, $user['password'])) {
    // if ( $password== $user['password']) {
        // if($user['Usertype']=="Admin"){    
    	$_SESSION['logged_in']=1;
        $_SESSION['Name']=$user['Name'];
        $_SESSION['Mobile']=$user['Mobile'];
        $temp_id=rand(1,10000);
        $_SESSION['Order_no']=$temp_id;
        header("location: index.php");
        $_SESSION['totalamt']=0;
        //echo"successful login";
        // }
        // else{
        //     header("location:index.html");
        // }
    }
    else {
    echo "<script type='text/javascript'>
    alert('You have entered wrong password, try again!');
    location='login.html';
    </script>";
    }
}
?>