<?php
$servername = "localhost";
$username = "root";
$password = "chontech2020!";
$db = "vaccinate";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

