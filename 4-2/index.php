<?php
require_once("getData.php");
$cls = new getData();
$users = $cls->getUserData();
$posts = $cls->getPostData();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <title>4-2</title>
</head>

<body>

    <header>
        <img src="./logo.png" alt="ロゴ" />
        <div class="title_box">
            <div class="user_name"><?php echo "ようこそ ".$users["last_name"].$users["first_name"]." さん"; ?></div>
            <div class="last_log"><?php echo '最終ログイン'.$users["last_login"]; ?></div>
        </div>
    </header>
    <section>
        <table>
            <tr class="tr_1">
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
            <?php foreach ($posts as $post){ ?>
            <tr class="tr_2">
                <td><?php echo $post["id"] ?></td>
                <td><?php echo $post["title"] ?></td>
                <td><?php if($post["category_no"] === "1"){
                    echo "食事";
                }else if($post["category_no"] === "2"){
                    echo "旅行";
                }else{
                    echo "その他";
                } ?></td>
                <td><?php echo $post["comment"] ?></td>
                <td><?php echo $post["created"] ?></td>
            </tr>
            <?php } ?>
        </table>
    </section>
    <footer>Y&I group.inc</footer>
</body>

</html>