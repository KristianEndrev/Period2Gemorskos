<?php
session_start();
$msgs = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['password'] ?? '';

    if (!$username || !$password) {
        $msgs[] = "Please fill in both username and password.";
    } else {
        require("dbconnect_inc.php");

        try {
            $stmt = $dbHandler->prepare(
                "SELECT username, password FROM user WHERE username = :username"
            );
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user || !password_verify($password, $user['password'])) {
                $msgs[] = "Invalid username or password.";
            } else {
                session_regenerate_id(true);
                $_SESSION['username'] = $user['username'];

                header("Location: home.php");
                exit;
            }

        } catch (PDOException $ex) {
            printError($ex->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log_in.css">
    <title>Log In</title>
</head>
<body>
    <div class="logo">
        <img src="images/logo1.png" alt="logo">
        <h1>Gemorskos</h1>
    </div>
        <?php
    foreach ($msgs as $msg) {
        echo "<p class='error'>$msg</p>";
    }
    ?>

    <div class="form">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="username-box">
                <label for="username">USERNAME</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="password-box">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password">
            </div>
                    <div class="register-link">
                        <p>Don’t have an account?</p>
                        <a href="register.php">Create an account</a>
                    </div>
                <div class="button">
                    <button>Sign in</button>
                </div>
        </form>
    </div>
</body>
</html>