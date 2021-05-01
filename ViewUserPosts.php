<?php
//echo 'YUH';
$mysqli = new mysqli("mysql.eecs.ku.edu", "connorsullivan", "ohpood3i", "connorsullivan");

if($mysqli->connection_errno) {
    echo '<p>Connection failed</p>';
    exit();
}

$ID = $_POST["Users"];
echo '<h3>Posts for'. $ID.'</h3>';
$query = "SELECT * FROM Posts WHERE Author_id='$ID'";

if($result = $mysqli->query($query)) {

    echo '<table style="border: 1px solid black;"><thead><tr>';
    echo '<th style="border: 1px solid black;">Posts</th>';
    echo '<th style="border: 1px solid black;">Post ID</th>';
    echo '<th style="border: 1px solid black;">Author</th>';
    echo '</tr></thead><tbody>';

    while($row = $result->fetch_assoc()) {
        $ID = $row["Post_id"];
        $Post = $row["Content"];
	$Author = $row["Author_id"];
        echo '<tr>';
        echo '<td style="border: 1px solid black;">'.$Post.'</td>';
        echo '<td style="border: 1px solid black;">'.$ID.'</td>';
	echo '<td style="border: 1px solid black;">'.$Author.'</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    $result->free();
}

$mysqli->close();




?>