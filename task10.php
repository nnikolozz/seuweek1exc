
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 10</title>
</head>
<body>

<form method="GET">
    <input type="text" name="show" placeholder="საქაღალდის სახელი" required>
    <button type="submit">შიგთავსის ნახვა</button>
</form>

<form method="POST">
    <input type="text" name="folder" placeholder="წასაშლელი საქაღალდე" required>
    <button type="submit">წაშლა</button>
</form>

<?php
if (isset($_GET["show"])) {
    $folder = basename($_GET["show"]);

    if (is_dir($folder)) {
        $items = scandir($folder);

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                echo $item . "<br>";
            }
        }
    } else {
        echo "საქაღალდე არ არსებობს.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = basename($_POST["folder"]);

    if (is_dir($folder)) {
        $items = scandir($folder);

        if (count($items) == 2) {
            rmdir($folder);
            echo "ცარიელი საქაღალდე წაიშალა.";
        } else {
            echo "საქაღალდე ცარიელი არ არის.";
        }
    } else {
        echo "საქაღალდე არ არსებობს.";
    }
}
?>

</body>
</html>
