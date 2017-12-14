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

echo 'Query 8: What was the total amount of cash made on December 9th, 2017 from 6PM to 8PM of the same day? <br/><br/>';
echo    '====Query====<br/>
        SELECT SUM(total_cost) <br/> 
        FROM order_details<br/>
        WHERE Delivery_date = \'2017-12-09\' AND Delivery_time >= \'18:00:00\' AND delivery_time <= \'20:00:00\';
        <br/>=============<br/><br/>';

echo 'Total amount of cash made on December 9th, 2017 from 6PM to 8PM:<br /><br/>';
    $tablequery =   "SELECT SUM(total_cost) 
                    FROM order_details
                    WHERE Delivery_date='2017-12-09' AND Delivery_time>='18:00:00' AND delivery_time<='20:00:00'";
    


    $result = mysqli_query($conn, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td>';
        }
        echo '</tr><br />';
    }

$conn->close();
?>