<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練習問題2</title>
</head>

<body>
    <!-- step1:入力フォームの作成 -->
    <form action="result.php" method="post">
        <h2>0〜9の番号を使って好きな数字の羅列を入力してください。</h2>
        <input type="number" name="count" maxlength="9" />
        <input type="submit" value="占う" />
    </form>

</body>

</html>