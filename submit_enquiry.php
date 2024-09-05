<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $msg = $_POST["msg"];
    $mobile = $_POST["mobile"];
    // Validate and sanitize input (you can add more validation)
    $name = htmlspecialchars(trim($name));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Create a database connection (replace with your actual database credentials)
    $servername = "localhost";
    $username = "u469552074_heritage";
    $password = 'H469552074@#$heri@123';
    $dbname = "u469552074_erp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO portal_query (name, email , msg , mobile,status) VALUES ('$name', '$email' ,'$msg' ,'$mobile','1')";

    if ($conn->query($sql) === TRUE) {

        echo "success";
$to = "info@heritagemind.com";
$subject = "Portal Enquiery";
$message = 'Email:-'.$email.' Name:-'.$name.' Mobile:-'.$mobile.' Message:-'.$msg;
$headers = 'From:info@heritagemind.com';

// Send email
$mailSuccess = mail($to, $subject, $message, $headers);

    } else {
        echo "error";
    }

    // Close the database connection
    $conn->close();
}
?>