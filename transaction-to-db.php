<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sender =  $_COOKIE["sendername"];
$receiver = $_POST['ben'];
$amount = $_POST['amount'];
$date = date("Y-m-d H:i:s");

$intamount = (int)$amount;

if( $receiver==NULL || $intamount <=0)
{
  echo "Invalid Input";
  

}

else{
  $sql = "INSERT INTO `transaction` (`sender`, `receiver`, `amount`, `date`) VALUES ('$sender', '$receiver', '$amount', '$date')";

  $sql1 = "UPDATE customer SET balance = balance-$intamount WHERE name = '$sender';";
  $sql2 = "UPDATE customer SET balance = balance+$intamount WHERE name = '$receiver';";
  
  
  if (mysqli_query($conn, $sql)) {
    // echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  if (mysqli_query($conn, $sql1)) {
    // echo "New records updated successfully 1";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  if (mysqli_query($conn, $sql2)) {
    // echo "New records updated successfully 2";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  

}


mysqli_close($conn);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv = "refresh" content = "3; url = index.html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="success.css">
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&display=swap" rel="stylesheet">
  <title>Successfull</title>
</head>
<body>
  
  <div class="biggerBox">
    <div class="biggerText">Transaction Successfull</div>
    <div class="smallerText">
          Redirecting to Home in <span id="sec"> 3 </span> seconds......
    </div>
    
  </div>



  <script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  

    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}



function myFunction() {
  var myVar1 = setTimeout(Three, 0);
  var myVar1 = setTimeout(Two, 1000);
  var myVar1 = setTimeout(One, 2000);
}

function Three(){
  let sec = document.getElementById("sec");
  sec.innerHTML = '3';
}


function Two(){
  let sec = document.getElementById("sec");
  sec.innerHTML = '2';
}


function One(){
  let sec = document.getElementById("sec");
  sec.innerHTML = '1';
}

myFunction();


</script> 



</body>
</html>