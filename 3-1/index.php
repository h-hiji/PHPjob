<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FizzBuzz問題</title>
</head>

<body>
    <?php
for ($i = 1; $i <= 100; $i++) {
    //3と5の倍数
    if ($i % 15 === 0) {
        echo "FizzBuzz!!<br>";
    //3の倍数
    } elseif ($i % 3 === 0) {
        echo "Fizz!<br>";
    //5の倍数
    } elseif ($i % 5 === 0) {
        echo "Buzz!<br>";
    //それ以外
    } else {
        echo "$i<br>";
    }
}?>
</body>

</html>