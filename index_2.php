<?php
//$_POST[];
$dsh = new PDO('mysql:host=localhost;dbname=users', 'user', 'pass');

//$password = $_POST['password']; //"); SELECT * FROM users WHERE true; -- ("
//$dsh->query("INSERT INTO users(`login`, `password`) VALUES (\"{$_POST['login']}\", \"{$password}\")");

$prepare_query = $dsh->prepare("INSERT INTO users(`login`, `password`) VALUES (:login, :password)");
$prepare_query->execute([
    'login' => $_POST['login'],
    'password' => $_POST['password']
]);

$db = mysqli_connect();
$stmt = $db->prepare("INSERT INTO users(`login`, `password`) VALUES (?, ?)");
$stmt->bind_param('s', $_POST['login']);
$stmt->bind_param('s', $_POST['password']);
$result = $stmt->fetch();

$prepare_query->fetch();
