<?php
$user = "userhere";
$pass = "passhere";
try {
    $pdoye = new PDO('mysql:host=localhost;dbname=DBnameHere', $user, $pass);
} catch (PDOException $e) {
    print("hey chad, you probably should read this: " . $e->getMessage() . " can we talk about how much you suck at coding");
    die();
}
?>