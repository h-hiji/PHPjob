<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <title>３章チェックテスト</title>
</head>

<body>
    <?php
//POST送信で送られてきた名前を受け取って変数を作成
$name = $_POST['name'];
//①画像を参考に問題文の選択肢の配列を作成してください。

//② ①で作成した、配列から正解の選択肢の変数を作成してください

?>
    <p>お疲れ様です<?php echo $name ?>さん</p>
    <!--フォームの作成 通信はPOST通信で-->
    <form action="answer.php" method="post">
        <h2>①ネットワークのポート番号は何番？</h2>
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <p>
            <?php
    $question1 = [88, 22 , 20 ,21];
    foreach ($question1 as $value) {
            echo '<input type="radio" name="answer1" value="'.$value.'">' .$value;
        }
    ?>
        </p>
        <h2>②Webページを作成するための言語は？</h2>
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <p>
            <?php
    $question2 = ["PHP","Python","JAVA","HTML"];
    foreach ($question2 as $value) {
            echo '<input type="radio" name="answer2" value="'.$value.'">' .$value;
        }
    ?>
        </p>

        <h2>③MySQLで情報を取得するためのコマンドは？</h2>
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <p>
            <?php
    $question3 = ["join","select","insert","update"];
    foreach ($question3 as $value) {
            echo '<input type="radio" name="answer3" value="'.$value.'">' .$value;
        }
    ?>
        </p>
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <p>
            <input type="submit" value="回答する" />
        </p>
    </form>

    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
</body>

</html>