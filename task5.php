
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 5</title>
</head>
<body>

<form method="POST">
    <input type="text" name="main" placeholder="მთავარი საქაღალდე" required>
    <input type="text" name="sub" placeholder="ქვესაქაღალდე" required>
    <button type="submit">შექმნა</button>
</form>

<form method="GET">
    <input type="text" name="show" placeholder="მთავარი საქაღალდე" required>
    <button type="submit">შიგთავსის ნახვა</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $main = basename($_POST["main"]);
    $sub = basename($_POST["sub"]);

    if (!is_dir($main)) {
        mkdir($main);
    }

    if (!is_dir($main . "/" . $sub)) {
        mkdir($main . "/" . $sub);
        echo "ორივე საქაღალდის სტრუქტურა შეიქმნა.";
    } else {
        echo "ქვესაქაღალდე უკვე არსებობს.";
    }
}

if (isset($_GET["show"])) {
    $main = basename($_GET["show"]);

    if (is_dir($main)) {
        $items = scandir($main);

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                echo $item . "<br>";
            }
        }
    } else {
        echo "მთავარი საქაღალდე არ არსებობს.";
    }
}
?>

</body>
</html>
