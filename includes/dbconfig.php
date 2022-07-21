
<?php
session_start();

//create constrants to store non repeating values
define('SITEURL', 'http://localhost/business_portfolio_website/portfolio/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'business_portfolio');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selection Database
?>
