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

echo 'Query 5: List the ‘FOOD’ items. List the ‘DRINK’ items.<br/><br/>';
echo    '====Query====<br/>
        SELECT name<br/> 
        FROM item<br/>
        WHERE food_type=\'FOOD\';
        <br/>=============<br/><br/>';

echo 'List Food Items:<br /><br/>';
    $tablequery =   "SELECT name
                    FROM item
                    WHERE Food_type='FOOD'";
    
    $result = mysqli_query($conn, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td>';
        }
        echo '</tr><br />';
    }

echo    '<br><br/>====Query====<br/>
        SELECT name<br/> 
        FROM item<br/>
        WHERE food_type=\'DRINK\';
        <br/>=============<br/><br/>';

echo 'List Drink Items:<br /><br/>';
    $tablequery =   "SELECT name
                    FROM item
                    WHERE Food_type='DRINK'";
    
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