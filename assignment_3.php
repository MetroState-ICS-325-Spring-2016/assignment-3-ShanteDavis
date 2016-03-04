<?php
/**
 * Created by PhpStorm.
 * User: Tay

 */

//This information is how we will connect to the sql database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection and confirms the connection
if ($connection->connect_error) {
    die("Not Connected: " . $connection->connect_error);
}
echo "Connected \r\n";
//This is the sql query that is used to pull and order the data

$sql = "SELECT customers.customerName, customers.country, employees.firstName, employees.lastName FROM customers, employees ORDER BY  employees.firstName, customers.country, customers.customerName";
//This sets the result to the information that was just pulled
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    //Prints the output of all the rows
    while($row = mysqli_fetch_assoc($result) ) {
        echo  $row["customerName"]. ", " . $row["country"]. " - " . $row["firstName"]." " . $row["lastName"]. "\r\n";
    }
} else {
    echo "0 results";
}

//the connection is closed
$connection->close();

