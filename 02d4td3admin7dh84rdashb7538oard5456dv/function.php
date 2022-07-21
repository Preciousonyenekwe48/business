<?php


//create constrants to store non repeating values
define('SITEURL', 'http://localhost/business_portfolio_website/02d4td3admin7dh84rdashb7538oard5456dv/');
define('DBINFO','mysql:host=localhost;dbname=business_portfolio');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

function performQuery($query){
    $con = new PDO(DBINFO, DB_USERNAME, DB_PASSWORD);
    $stmt = $con->prepare($query);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

function fetchAll($query){
    $con = new PDO(DBINFO, DB_USERNAME, DB_PASSWORD);
    $stmt = $con->query($query);
    return $stmt->fetchAll();
}

?>
