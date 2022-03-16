<?php
// セッション開始
session_start();
// DBサーバのURL
$db['host'] = "localhost";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "root";
// データベース名
// バグ修正:データベース名"YIGroupBlog"に変更
$db['dbname'] = "YIGroupBlog";