
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 8</title>
</head>
<body>

<form method="POST">
    <input type="text" name="folder1" placeholder="პირველი საქაღალდე" required>
    <input type="text" name="folder2" placeholder="მეორე საქაღალდე" required>
    <button type="submit">შექმნა</button>
</form>

<form method="GET">
    <input type="text" name="show" placeholder="რომელი საქაღალდე ვნახოთ?" required>
    <button type="submit">ნახვა</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder1 = basename($_POST["folder1"]);
    $folder2 = basename($_POST["folder2"]);

    if (!is_dir($folder1)) {
        mkdir($folder1);
    }

    if (!is_dir($folder2)) {
        mkdir($folder2);
    }

    echo "საქაღალდეების შემოწმება დასრულდა.";
}

if (isset($_GET["show"])) {
    $folder = basename($_GET["show"]);

    if (is_dir($folder)) {
        $items = scandir($folder);

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                if (is_dir($folder . "/" . $item)) {
                    echo "ქვესაქაღალდე: " . $item . "<br>";
                } else {
                    echo "ფაილი: " . $item . "<br>";
                }
            }
        }
    } else {
        echo "საქაღალდე არ არსებობს.";
    }
}
?>

</body>
</html>
