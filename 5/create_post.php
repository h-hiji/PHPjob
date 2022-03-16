<?php
require_once("db_connect.php");
require_once("function.php");
$errorMessage = "";
    check_user_logged_in();
if (empty($_SESSION["user_name"])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST["post"])) {
    if (empty($_POST["title"])) {
        $errorMessage = 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        $errorMessage = '発売日が選択されていません。';
    }elseif (empty($_POST["num"])) {
        $errorMessage = '在庫数が選択されていません。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["num"])) {
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
        $num = htmlspecialchars($_POST['num'], ENT_QUOTES);
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
        $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        try {
            $stmt = $pdo->prepare("INSERT INTO books(title, date, stock) VALUES (?, ?, ?)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $num);
            $stmt->execute(array($title, $date, $num));
            header("Location: main.php");
            exit;
        } catch (PDOException $e) {
           $errorMessage = 'エラー';
            $e->getMessage();
            echo $e->getMessage();
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>登録画面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="w-2/3 mx-auto mt-16 tracking-widest">
        <h2 class="text-3xl font-bold mb-6">本 登録画面</h2>
        <form method="POST" action="" class="w-1/3">
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"
                type="text" name="title" id="title" placeholder="タイトル">
            <br>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"
                type="date" name="date" id="date" placeholder="発売日"><br>
            <p class="text-sm font-bold mb-4">在庫数</p>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"
                type="number" name="num" id="num" min="0" max="100" placeholder="選択してください。"><br>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded" type="submit"
                value="submit" id="post" name="post">
                登録
            </button>
        </form>
        <div class="text-red-500 text-sm font-bold py-2 px-auto rounded mb-2 mt-2">
            <?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
    </section>
</body>

</html>