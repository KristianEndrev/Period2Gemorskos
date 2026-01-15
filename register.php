<?php
$msgs = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!$fname = filter_input(INPUT_POST, "fname",  FILTER_SANITIZE_SPECIAL_CHARS))
        $msgs[] = "<p>Invalid first name</p>";

    if(!$lname = filter_input(INPUT_POST, "lname",  FILTER_SANITIZE_SPECIAL_CHARS))
        $msgs[] = "<p>Invalid last name</p>";
    
    if(!$user = filter_input(INPUT_POST, "username",  FILTER_SANITIZE_SPECIAL_CHARS))
        $msgs[] = "<p>Invalid username or no username given</p>";


    if(!$pass = filter_input(INPUT_POST,"password"))
    $msgs[] = "<p>No password given</p>";

    if(count($msgs) == 0)
    {
        require("dbconnect_inc.php");
        if($dbHandler){
            try {
                 // Username directly into 'name' column
                $hashedPass = password_hash($pass, PASSWORD_BCRYPT);
                $stmt = $dbHandler->prepare("INSERT INTO people (fname, lname, username, password) VALUES (:fname, :lname, :username, :hashedpass)");
                $stmt->bindParam(':username', $user, PDO::PARAM_STR);
                $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
                $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
                $stmt->bindParam(':hashedpass', $hashedPass, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: index.php");
                exit;
            } catch (PDOException $ex) {
                if ($ex->getCode() == 23000) {
                    $msgs[] = "Username already exists.";
                } else {
                    printError($ex->getMessage());
                }
            }
    }
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>
<body>
    <div class="logo">
        <img src="images/logo1.png" alt="logo">
        <h1>Gemorskos</h1>
    </div>
    <?php
        if(count($msgs) > 0){
            foreach ($msgs as $msg) {
                echo $msg;
            }
        }
    ?>
    <div class="form">
        <form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="POST">
            <div class="name-box">
                <div class="fname-box">
                <label for="fname">FIRST NAME</label>
                <input type="text" id="fname" name="fname">
            </div>
            <div class="lname-box">
                <label for="lname">LAST NAME</label>
                <input type="text" id="lname" name="lname">
            </div>
            </div>
            <div class="username-box">
                <label for="username">USERNAME</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="password-box">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password">
            </div>
                <div class="button">
                    <button>Create an account</button>
                </div>
        </form>
    </div>
</body>
</html>