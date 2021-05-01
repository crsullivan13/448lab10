<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "connorsullivan", "ohpood3i", "connorsullivan");

if($mysqli->connection_erro) {
    echo '<p>Connection failed</p>';
    exit();
}

$query = "SELECT * FROM Users";

if($result = $mysqli->query($query)) {

    echo '<table style="border: 1px solid black;"><thead><tr>';
    echo '<th style="border: 1px solid black;">User_id</th>';
    echo '</tr></thead><tbody>';

    while($row = $result->fetch_assoc()) {
        $ID = $row["User_id"];
        echo '<tr>';
        echo '<td style="border: 1px solid black;">'.$ID.'</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    $result->free();
}
$mysqli->close();

?>