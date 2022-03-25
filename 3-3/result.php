<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練習問題2</title>
</head>

<body>
    <?php
    $number = $_POST['count'];
    $array = str_split($number);
    $keys = array_rand($array, 1);
    $fortune = $array[$keys];
    date_default_timezone_set('Asia/Tokyo');
    ?>
    <!-- step2:結果を表すページを作成し、フォームから受け取った数字の羅列から1文字の数字を抜き出す。 -->
    <!-- step3:今日の日付と結果を表示する。 -->
    <p>
        <?php
            echo date("Y/m/d", time())."の運勢は<br>";
            echo "選ばれた数字は".$fortune."<br>";
            if($fortune == 0) {
            echo "凶";
            } elseif($fortune <= 3) {
            echo "小吉";
            } elseif($fortune <= 6) {
            echo "中吉";
            } elseif($fortune <= 8) {
            echo "吉";
            } else {
            echo "大吉";
        } ?>
    </p>
</body>

</html>