<?php
$dbHandler = null;
try {
    $dbHandler = new PDO("mysql:host=localhost;dbname=gemorskos;charset=utf8", "admin", "Team IT-1C ");
    $dbHandler->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $ex) {
    printError($ex);
}
    function printError(String $err){
    echo "<h1>The following error occured</h1>
          <p>{$err}</p>";
          exit;
}
?>