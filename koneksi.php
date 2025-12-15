<?php
$conn = new mysqli('localhost', 'root', '', 'siamu');
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>