<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "connorsullivan", "ohpood3i", "connorsullivan");

if($mysqli->connection_errno) {
    echo '<p>Connection failed</p>';
    exit();
}

$query = "SELECT * FROM Posts";

if($result = $mysqli->query($query)) {
    while($row = $result->fetch_assoc()) {
        if(!empty($_POST['ID'])) {
            foreach($_POST['ID'] as $Post_ID) {
                if($row['Post_id'] == $Post_ID) {
                    $query2 = "DELETE FROM Posts WHERE Post_id=$Post_ID";
                    echo '<p>Deleted post '.$Post_ID.'</p>';
                    $mysqli->query($query2);
                }
            }
        }

    }
    $result->free();
}
$mysqli->close();



?>