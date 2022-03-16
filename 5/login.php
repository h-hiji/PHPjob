<?php
require_once('db_connect.php');
session_start();

$errorMessage = "";
if (!empty($_POST)) {
    if (empty($_POST["name"])) {
        $errorMessage = 'ユーザー名が未入力です。';
    }
    if (empty($_POST["pass"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    if (empty($_POST["name"]) && empty($_POST["pass"])) {
        $errorMessage = '必要な情報が入力されていません。';
    }

    if (!empty($_POST["name"]) && !empty($_POST["pass"])) {

        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);

        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
        $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        try {
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($pass, $row['password'])) {
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                header("Location: main.php");
                exit;
            } else {
                $errorMessage = "パスワードに誤りがあります。";
            }
        } else {
            $errorMessage = "ユーザー名かパスワードに誤りがあります。";
        }
    }
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ログイン</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="w-1/3 mx-auto mt-16 tracking-widest">
        <div class="flex justify-between mb-8">
            <h2 class="text-3xl font-bold">ログイン画面</h2>
            <a href="signup.php">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded">
                    新規ユーザー登録
                </button>
            </a>
        </div>
        <form method="post" action="">
            <input type="text" name="name" placeholder="ユーザー名"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
            <input type="text" name="pass" placeholder="パスワード"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded" type="submit">
                ログイン
            </button>
        </form>
        <div class="text-red-500 text-sm font-bold py-2 px-auto rounded mb-2 mt-2">
            <?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
    </section>
</body>

</html>