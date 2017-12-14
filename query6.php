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

echo 'Query 6: List the order details of Order ID 3 along with the items they ordered.<br/><br/>';
echo    '====Query====<br/>
        SELECT *<br/> 
        FROM order_details<br/>
        WHERE Order_id=\'3\';
        <br/>=============<br/><br/>';

echo 'Order details of Order ID 3 and the items they ordered:<br />';
echo'Order_id | Customer_id | Payment_id | Restaurant_id | Special_instruction | Delivery_date | Delivery_time | Employee_id | Total_cost <br/><br/>';
    $tablequery =   "SELECT * 
                    FROM order_details
                    WHERE Order_id='3'";
    


    $result = mysqli_query($conn, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }


echo    '<br/><br/>====Query====<br/>
        SELECT Name<br/> 
        FROM Order_items AS O, Item as I<br/>
        WHERE O.Order_id=\'3\' AND O.Item_id=I.Item_id;
        <br/>=============';
echo '<br/><br/>Order details of Order ID 3 and the items they ordered:<br />';
    $tablequery =   "SELECT Name 
                    FROM Order_items AS O, Item AS I
                    WHERE O.Order_id='3' AND O.Item_id=I.Item_id";
    


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