<?php
// database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "presentation1";

// create connection
$conn = new mysqli($host, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check if the id parameter is set in the request
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // query to delete the customer record
    $sql = "DELETE FROM customers WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("refresh:3;url=home.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter not set";
}

// close connection
$conn->close();
?>
