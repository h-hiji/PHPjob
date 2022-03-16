<?php
require_once("db_connect.php");
$errorMessage = "";
$signUpMessage = "";
if (isset($_POST["signUp"])) {
    if (empty($_POST)) {
        $errorMessage = 'ユーザー名が未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {

        $username = $_POST["name"];
        $password = $_POST["password"];
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
        $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        try {
            $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");
            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
            $userid = $pdo->lastinsertid();
            $signUpMessage = '登録が完了しました。ログイン画面へお進みください。';
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            $e->getMessage();
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>新規登録</title>
</head>

<body>
    <section class="w-1/3 mx-auto mt-16 tracking-widest">
        <div class="flex justify-between mb-8">
            <h2 class="text-3xl font-bold">ユーザー登録画面</h2>
            <a href="login.php">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded">
                    ログイン画面へ
                </button>
            </a>
        </div>
        <form method="POST" action="">
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="name" name="name" placeholder="ユーザー名" value="<?php if (!empty($_POST["name"])) {
    echo htmlspecialchars($_POST["name"], ENT_QUOTES);
} ?>"><br><br>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="パスワード" type="password" id="password" name="password"><br><br>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded" type="submit"
                value="submit" id="signUp" name="signUp">
                新規登録
            </button>
        </form>
        <div class="text-red-500 text-sm font-bold py-2 px-auto rounded mb-2 mt-2">
            <?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <div class="text-green-500 text-sm font-bold py-2 px-auto rounded">
            <?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></div>
    </section>
</body>

</html>