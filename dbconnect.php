<?php
    // MySQLデータベースに接続
    $pdo = new PDO('mysql:charset=UTF8;dbname=cafe;host=localhost', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction();
?>