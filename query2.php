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

echo 'Query 2: What restaurants are open for pick-up after 9PM?<br/><br/>';
echo    "====Query==== <br/>SELECT *<br/>";
echo    "FROM restaurant_branch <br/>";
echo    "WHERE (pickup_time_end >= '21:00:00');<br/> ============<br/><br/>";
echo    'Restaurants that are open for pickup after 9 PM:<br /><br/>';

    $tablequery =   "SELECT * 
                    FROM restaurant_branch
                    WHERE (pickup_time_end >= '21:00:00')";

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