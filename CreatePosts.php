<?php

if(!empty($_POST["user-id"]) && !empty($_POST["post"])) {
    $userID = $_POST["user-id"];
    $post = $_POST["post"];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "connorsullivan", "ohpood3i", "connorsullivan");

    if($mysqli->connection_erro) {
        printf("Connection failed\n");
        exit();
    }

    $query1 = "SELECT User_id FROM Users";
    //echo '<p>'.$userID.'</p>';
    if($result = $mysqli->query($query1)) {
        while($row = $result->fetch_assoc()) {
            $temp = $row["User_id"];
            //echo '<p>1'.$temp.'</p>';
            if($temp == $userID) {
                $check = 1;
                break;
            } else {
                $check = 0;
            }
        }

        if($check == 1) {
            $query2 = "INSERT INTO Posts (Content, Author_id) VALUES ('$post','$userID')";
            if($result2 = $mysqli->query($query2)) {
                echo '<p>Posted!</p>';
            }
        } else {
            echo '<p>User does not exist</p>';
        }
        $result->free();
        $result2->free();
    }
    $mysqli->close();

}

?>