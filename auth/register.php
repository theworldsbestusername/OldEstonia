<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/include/trueandhonestheader.php");
/*if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}*/
if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $ip = $_SERVER['REMOTE_ADDR'];
            $hashedoperator = password_hash($password, PASSWORD_DEFAULT);
            $emailoperator = filter_var($email, FILTER_VALIDATE_EMAIL);
            $usernameoperator = htmlspecialchars($username, ENT_QUOTES);
            $stmt = $pdoye->prepare('INSERT INTO users (username, password, email, ip) VALUES (:username, :password, :email, $ip)');
            $stmt->bindValue(':username', $usernameoperator, PDO::PARAM_STR);
            $stmt->bindValue(':password', $hashedoperator, PDO::PARAM_STR);
            $stmt->bindValue(':email', $emailoperator, PDO::PARAM_STR);
            $_SESSION["username"] = $username;
            $stmt->execute();
            header("Location: http://127.0.0.1/");
        }
    } else {
         exit("no");
    }
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Estonia? - Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php'); ?>
    <br>
<form method="POST">
<br>
    Username:<br>
    <input type="text" placeholder="Enter username" name="username">
    <br>
    <br>
    E-mail:<br>
    <input type="email" placeholder="Enter email" name="email">
    <br>
    <br>
    Password:<br>
    <input type="password" placeholder="Enter password" name="password">
    <br>
    <br>
    <input type="submit" value="Submit">
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>