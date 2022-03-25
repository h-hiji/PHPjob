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
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$name = $_POST['name'];
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
$correct1 = 88;
$correct2 = "HTML";
$correct3 = "select";
//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
?>
    <p>
        <!--POST通信で送られてきた名前を表示-->
        <?php echo $name ?>さんの結果は・・・？
    </p>
    <p>①の答え<br>
        <?php
        if ($answer1 == $correct1 ) {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
    ?></p>
    <!--作成した関数を呼び出して結果を表示-->
    <p>②の答え<br>
        <?php
        if ($answer2 == $correct2) {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
    ?></p>
    <!--作成した関数を呼び出して結果を表示-->
    <p>③の答え<br>
        <?php
        if ($answer3 == $correct3) {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
    ?></p>
    <!--作成した関数を呼び出して結果を表示-->
</body>

</html>