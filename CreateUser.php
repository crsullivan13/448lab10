<?php

$check = 1;
if(!empty($_POST["user-id"])) {
    $userID = $_POST["user-id"];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "connorsullivan", "ohpood3i", "connorsullivan");

    if($mysqli->connection_erro) {
        printf("Connection failed\n");
        exit();
    }
    
    $query = "SELECT User_id FROM Users";
    //echo '<p>'.$userID.'</p>';
    if($result = $mysqli->query($query)) {
    	while($row = $result->fetch_assoc()) {
            $temp = $row["User_id"];
	    //echo '<p>1'.$temp.'</p>';
	    if($temp == $userID) {
	        $check = 0;
		break;
	    } else {
	        $check = 1;
	    }
	}
	//echo '<p>'.$check.'</p>';
	if($check == 0) {
	    echo '<p>User already exists. Failed to add</p><br>';
        } else {
            $query = "INSERT INTO Users (User_id) VALUES ('$userID')";
            $result = $mysqli->query($query);
            echo '<p>User successfully added</p><br>';
        }
    }
    $result->free();
}
$mysqli->close();

?>