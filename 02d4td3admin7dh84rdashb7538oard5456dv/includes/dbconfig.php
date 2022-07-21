
<?php
session_start();

//create constrants to store non repeating values
define('SITEURL', 'http://localhost/business_portfolio_website/02d4td3admin7dh84rdashb7538oard5456dv/');
define('HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'business_portfolio');

$conn = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD) or die('<script>alert("Connection Failed.")</script>'); //Database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die('<script>alert("Connection Failed.")</script>'); //selection Database
?>
