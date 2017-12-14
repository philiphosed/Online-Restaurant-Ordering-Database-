<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "restaurant";

$conn = mysqli_connect($server, $user, $pass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

echo 'Query 7: List all orders by total cost from greatest to least. <br/><br/>';
echo    '====Query====<br/>
        SELECT * <br/> 
        FROM order_details<br/>
        ORDER BY total_cost DESC;
        <br/>=============<br/><br/>';

echo 'Orders listed by total cost from greatest to least:<br /><br/>';
    $tablequery =   "SELECT * 
                    FROM order_details
                    ORDER BY total_cost DESC";
    


    $result = mysqli_query($conn, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }

$conn->close();

?>