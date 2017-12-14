<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "restaurant";

    $db = mysqli_connect($server, $user, $pass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


//For showing table names

    $showtablequery = "
            SHOW TABLES
            FROM
            restaurant
            ";

    $showtablequery_result = mysqli_query($db, $showtablequery);

echo '==== Table Names ==== <br />';
    while($showtablerow = mysqli_fetch_array($showtablequery_result)){
        echo $showtablerow[0]."<br />";
    }


//This PHP file is for outputting all of the information from our tables 

echo '<br />==== Output Tables\' Contents ==== <br />';
    
echo '<br />CUSTOMER<br />';
    $tablequery = "SELECT * FROM customer";
    $result = mysqli_query($db, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }

echo '<br />ITEM<br />';
    $tablequery = "SELECT * FROM item";
    $result = mysqli_query($db, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }

echo '<br />ORDER DETAILS<br />';
    $tablequery = "SELECT * FROM order_details";
    $result = mysqli_query($db, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }

echo '<br />ORDER ITEMS<br />';
    $tablequery = "SELECT * FROM order_items";
    $result = mysqli_query($db, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }

echo '<br />PAYMENT INFO<br />';
    $tablequery = "SELECT * FROM payment_info";
    $result = mysqli_query($db, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }

echo '<br />RESTAURANT_BRANCH<br />';
    $tablequery = "SELECT * FROM restaurant_branch";
    $result = mysqli_query($db, $tablequery);
    //Outputs all rows of restaurant_branch in a readable way
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach($row as $field){
            echo '<td>' . htmlspecialchars($field) . '</td> | ';
        }
        echo '</tr><br />';
    }



    $db->close();

?>