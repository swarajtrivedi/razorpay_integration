<?php

$name = $_GET["name"];
$email = $_GET["email"];
$contact = $_GET["contact"];
$amount = $_GET["amount"];

//server details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "razor_pay";
//connecting
$conn = new mysqli($servername, $username, $password, $dbname);
//performing check
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
//check completed
//submitting values
$sql = "INSERT INTO details (name, email , amount , contacts) VALUES ('$name', '$email', '$amount', '$contact')";
//checking query
if ($conn->query($sql) === TRUE) 
{
    echo "New record created successfully";
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//check done
//closing connection
$conn->close();
//connection closed

?>

<html>
    <body>
        <p><a href="index.php"> Details entered successfully ,now redirect to payment. </a></p>
    </body>
</hmtl>