<?php
// Database constants
$servername = "localhost"; $username = "lovedjobs_crud"; $password = "L4jrD?n2Mbz~'UV4"; $dbname = "lovedjobs"; 

define('DB_SERVER', "localhost");
define('DB_USER', "");
define('DB_PASSWORD', "");
define('DB_DATABASE', "");
define('DB_DRIVER', "mysql");

// We will use PDO to execute database stuff. 
// This will return the connection to the database and set the parameter
// to tell PDO to raise errors when something bad happens
function getDbConnection() {
  $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  return $db;
}


// This is the 'search' function that will return all possible rows starting with the keyword sent by the user
function searchForKeyword($keyword) {
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT  skillName,skillSearchTerm as country FROM `skills` WHERE `skillSearchTerm` LIKE ?  ORDER BY `skillSearchTerm`");

    $keyword = $keyword . '%';
    $stmt->bindParam(1, $keyword, PDO::PARAM_STR, 100);

    $isQueryOk = $stmt->execute();
  
    $results = array();
    
    if ($isQueryOk) {
      $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } else {
      trigger_error('Error executing statement.', E_USER_ERROR);
    }

    $db = null; 

    return $results;
}
?>
