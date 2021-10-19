<?php
$conn = mysqli_connect("localhost", "root", "", "banking");

$customer = mysqli_query($conn, "SELECT name, email, balance FROM customer");
 
$data = array();
while ($row = mysqli_fetch_object($customer))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();

?>