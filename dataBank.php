<?php
         $conn = mysqli_connect("localhost", "root", "", "banking");
         $sql = "SELECT * FROM customer";
         $result = mysqli_query($conn, $sql);

         $data = array();
         while ($row = mysqli_fetch_object($result))
         {
             array_push($data, $row);
         }

         echo json_encode($data);
        exit();
?>