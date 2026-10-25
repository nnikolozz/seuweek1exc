
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 7</title>
</head>
<body>

<form method="POST">
    <input type="text" name="folder" placeholder="საქაღალდის სახელი" required>
    <button type="submit">შექმნა</button>
</form>

<form method="GET">
    <input type="text" name="show" placeholder="საქაღალდის სახელი" required>
    <button type="submit">ელემენტების დათვლა</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = basename($_POST["folder"]);

    if (!is_dir($folder)) {
        mkdir($folder);
        echo "საქაღალდე შეიქმნა.";
    } else {
        echo "საქაღალდე უკვე არსებობს.";
    }
}

if (isset($_GET["show"])) {
    $folder = basename($_GET["show"]);

    if (is_dir($folder)) {
        $items = scandir($folder);
        $count = 0;

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                $count++;
            }
        }

        echo "ელემენტების რაოდენობა: " . $count;
    } else {
        echo "საქაღალდე არ არსებობს.";
    }
}
?>

</body>
</html>
