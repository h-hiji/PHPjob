<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$id = $_GET['id'];
if (empty($id)) {
    header("Location: main.php");
    exit;
}

$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
try {
    $sql = "DELETE FROM books WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: main.php");
    exit;
} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
}