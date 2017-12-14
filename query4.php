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

echo 'Query 4: List the customers whose first name starts with a J and have paid with credit.<br/><br/>';
echo    '====Query====<br/>
        SELECT F_name, L_name, method<br/>
        FROM customer AS c, order_details AS o, payment_info as p<br/>
        WHERE c.F_name LIKE \'J%\' AND c.Customer_id = o.Customer_id AND o.Payment_id = p.Payment_id AND p.method=\'CARD\'
        <br/>=============<br/><br/>';

echo 'Customers whose names start with J and have paid with credit:<br /><br/>';
    $tablequery =   "SELECT F_name, L_name, method
                    FROM customer AS c, order_details AS o, payment_info as p
                    WHERE c.F_name LIKE 'J%' AND c.Customer_id = o.Customer_id AND o.Payment_id = p.Payment_id AND p.method='CARD'";

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