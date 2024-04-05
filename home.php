<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: auto;
        }
        .btn {
            display: block;
            width: 100px;
            margin: 0 auto;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h2>Customer Data</h2>
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

    // query to fetch data from customers table
    $sql = "SELECT id, cus_name, cus_email, cus_message, cus_image FROM customers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Image</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["cus_name"] . "</td>";
            echo "<td>" . $row["cus_email"] . "</td>";
            echo "<td>" . $row["cus_message"] . "</td>";
            echo "<td><img src='" . $row["cus_image"] . "' alt='Customer Image'></td>";
            echo "<td><form action='delete.php' method='post'><input type='hidden' name='id' value='" . $row["id"] . "'><button type='submit' class='btn delete-btn'>Delete</button></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // close connection
    $conn->close();
    ?>

    <a href="form.html" class="btn">Contact Us</a>
</body>
</html>