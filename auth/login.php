<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/include/trueandhonestheader.php");
/*if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}*/
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedoperator = password_hash($password, PASSWORD_DEFAULT);
    $mchashbrownedoperator = htmlspecialchars($username, ENT_QUOTES);
    $stmt = $pdoye->prepare('SELECT username, password FROM users WHERE username=:username AND password=:password');
    $stmt->bindValue(':username', $mchashbrownedoperator, PDO::PARAM_STR);
    $stmt->bindValue(':password', $hashedoperator, PDO::PARAM_STR);
    $_SESSION["username"] = $username;
    $stmt->execute();
    header("Location: http://127.0.0.1/");
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Estonia? - Login</title>
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
    Password:<br>
    <input type="password" placeholder="Enter password" name="password">
    <br>
    <br>
    <input type="submit" value="Submit">
    <input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
</div>
</body>