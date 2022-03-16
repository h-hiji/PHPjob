<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練習問題１</title>
</head>

<body>
    <?php
//配列
$fruits = ["りんご" =>"300", "みかん" => "150", "もも" => "3000"];
$count = 1;
//関数
function fruitCalc($price,$count) {
    $total = $price * $count;
    echo $total;
}
//繰り返し
foreach ($fruits as $key => $value) {
echo $key;
fruitCalc($value,$count);
echo "円です。<br>";
}
?>
</body>

</html>