<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transaction.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&display=swap" rel="stylesheet">

    <title>Customers</title>
</head>

<body>


    <!-- <?php
    // $conn = mysqli_connect("localhost", "root", "", "banking");

    // $customer = mysqli_query($conn, "SELECT name, email, balance FROM customer");
    
    // $data = array();
    // while ($row = mysqli_fetch_object($customer))
    // {
    //     array_push($data, $row);
    // }

    // echo json_encode($data);
    // exit();

    ?> -->

    <nav class="navbar">
        <a href="index.html" class="nav-item navHome">Home</a>
        <a href="customers.php" class="nav-item navCust">Customers</a>
        <a href="" class="nav-item navTransaction">Transactions</a>
    </nav>

    <div class="tableBigDiv">

        <div class="tableSmallDiv">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S No.</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Receiver</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date and Time</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                     <?php
                        $conn = mysqli_connect("localhost", "root", "", "banking");
                        $sql = "SELECT sender, receiver, amount, date FROM transaction";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $sno = $sno + 1;
                            echo "<tr id='tr$sno'>
                                    <th scope='row'>".$sno."</th>
                                    <td>".$row['sender']."</td>
                                    <td>".$row['receiver']."</td>
                                    <td>".$row['amount']."</td>
                                    <td>".$row['date']."</td>
                                </tr> ";

                        }  
                    ?> 
                </tbody>
            </table>
        </div>



    </div>





    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

    </script>

</body>

</html>