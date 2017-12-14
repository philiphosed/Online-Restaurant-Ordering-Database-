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

echo 'Query 1: List all restaurant branch addresses. <br/><br/>';
echo '====Query====<br/>SELECT restaurant_address <br/>FROM restaurant_branch <br/>=============<br/><br/>';
echo 'RESTAURANT_BRANCH<br /><br/>';
    $tablequery = "SELECT restaurant_address FROM restaurant_branch";
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