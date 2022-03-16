<?php
session_start();
require_once("db_connect.php");
require_once("function.php");
if (empty($_SESSION["user_name"])) {
    header("Location: login.php");
    exit;
check_user_logged_in();
}
$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
try {
    $sql = "SELECT * FROM books ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>在庫一覧</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="w-2/3 mx-auto mt-16 tracking-widest">
        <h2 class="text-3xl font-bold mb-6">在庫一覧画面</h2>
        <div class="flex justify-between w-72 mb-3">
            <a href="create_post.php">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded">
                    新規登録
                </button>
            </a>
            <a href="logout.php">
                <button class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-8 rounded">
                    ログアウト
                </button>
            </a>
        </div>
        <div class="py-4 flex justify-center w-4/5 ">
            <table class="w-full rounded mb-4">
                <tbody>
                    <tr class="border-b text-center">
                        <th class="py-3 px-5 bg-gray-200">タイトル</th>
                        <th class="py-3 px-5 bg-gray-200">発売日</th>
                        <th class="py-3 px-5 bg-gray-200">在庫数</th>
                        <th class="py-3 px-5 bg-gray-200"></th>
                    </tr>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr class="border-b hover:bg-orange-100 bg-gray-100 text-center">
                        <td class="p-3 px-5"><?php echo $row['title']; ?></td>
                        <td class="p-3 px-5"><?php echo date('Y/m/d', strtotime($row['date'])); ?></td>
                        <td class="p-3 px-5"><?php echo $row['stock']; ?></td>
                        <td class="p-3 px-5">
                            <a href="delete_post.php?id=<?php echo $row['id']; ?>">
                                <button type="button"
                                    class="text-sm bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    消去
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>