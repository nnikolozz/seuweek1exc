
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 11</title>
</head>
<body>

<form method="POST">
    <input type="text" name="folder" placeholder="საქაღალდის სახელი" required>
    <input type="number" name="count" placeholder="ფაილების რაოდენობა"
           min="1" max="100" required>
    <button type="submit">შექმნა</button>
</form>

<form method="GET">
    <input type="text" name="show" placeholder="საქაღალდის სახელი" required>
    <button type="submit">ფაილების ნახვა</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = basename($_POST["folder"]);
    $count = (int) $_POST["count"];

    if ($count < 1 || $count > 100) {
        echo "შეიყვანე რიცხვი 1-დან 100-მდე.";
    } else {
        if (!is_dir($folder)) {
            mkdir($folder);
        }

        for ($i = 1; $i <= $count; $i++) {
            $file = $folder . "/file" . $i . ".txt";

            if (!file_exists($file)) {
                touch($file);
            }
        }

        echo "ფაილები შეიქმნა.";
    }
}

if (isset($_GET["show"])) {
    $folder = basename($_GET["show"]);

    if (is_dir($folder)) {
        $items = scandir($folder);
        $number = 1;

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                echo $number . ". " . $item . "<br>";
                $number++;
            }
        }
    } else {
        echo "საქაღალდე არ არსებობს.";
    }
}
?>

</body>
</html>
