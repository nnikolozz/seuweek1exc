
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 6</title>
</head>
<body>

<form method="POST">
    <input type="text" name="folder" placeholder="საქაღალდის სახელი" required>
    <input type="text" name="file" placeholder="ფაილის სახელი" required>
    <button type="submit">შექმნა</button>
</form>

<form method="GET">
    <input type="text" name="show" placeholder="საქაღალდის სახელი" required>
    <button type="submit">შიგთავსის ნახვა</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = basename($_POST["folder"]);
    $file = basename($_POST["file"]);

    if (!is_dir($folder)) {
        mkdir($folder);
    }

    $path = $folder . "/" . $file;

    if (!file_exists($path)) {
        touch($path);
        echo "ფაილი შეიქმნა.";
    } else {
        echo "ფაილი უკვე არსებობს.";
    }
}

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
?>

</body>
</html>
