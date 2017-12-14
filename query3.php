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

echo 'Query 3: List the names of all employees and what restaurants branches they work for. <br/><br/>';
echo    '====Query====<br/>
        SELECT employee_name, restaurant_address<br/> 
        FROM restaurant_branch AS branch, employee_delivery AS employee<br/>
        WHERE employee.restaurant_id = branch.restaurant_id;
        <br/>=============<br/><br/>';

echo 'Employees and the address of the restaurant branch they work for:<br /><br/>';
    $tablequery =   "SELECT employee_name, restaurant_address 
                    FROM restaurant_branch AS branch, employee_delivery AS employee
                    WHERE employee.restaurant_id = branch.restaurant_id";
    


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