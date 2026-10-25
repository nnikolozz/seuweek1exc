
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 12</title>
</head>
<body>

<h3>სტრუქტურის შექმნა</h3>

<form method="POST">
    <input type="hidden" name="action" value="create">

    <input type="text" name="main" placeholder="მთავარი საქაღალდე" required>
    <input type="text" name="sub" placeholder="ქვესაქაღალდე" required>
    <input type="text" name="file" placeholder="ფაილის სახელი" required>

    <button type="submit">შექმნა</button>
</form>

<h3>შიგთავსის ნახვა</h3>

<form method="GET">
    <input type="text" name="show" placeholder="მთავარი საქაღალდე" required>
    <button type="submit">ნახვა</button>
</form>

<h3>წაშლა</h3>

<form method="POST">
    <input type="hidden" name="action" value="delete">
    <input type="text" name="folder" placeholder="ცარიელი საქაღალდის სახელი" required>
    <button type="submit">წაშლა</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "create") {
        $main = basename($_POST["main"]);
        $sub = basename($_POST["sub"]);
        $file = basename($_POST["file"]);

        if (!is_dir($main)) {
            mkdir($main);
        }

        if (!is_dir($main . "/" . $sub)) {
            mkdir($main . "/" . $sub);
        }

        $path = $main . "/" . $sub . "/" . $file;

        if (!file_exists($path)) {
            touch($path);
        }

        echo "სტრუქტურა შეიქმნა.";
    }

    if ($_POST["action"] == "delete") {
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
}

if (isset($_GET["show"])) {
    $main = basename($_GET["show"]);

    if (is_dir($main)) {
        $items = scandir($main);

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                echo "საქაღალდე ან ფაილი: " . $item . "<br>";

                if (is_dir($main . "/" . $item)) {
                    $subItems = scandir($main . "/" . $item);

                    foreach ($subItems as $subItem) {
                        if ($subItem != "." && $subItem != "..") {
                            echo "-- " . $subItem . "<br>";
                        }
                    }
                }
            }
        }
    } else {
        echo "მთავარი საქაღალდე არ არსებობს.";
    }
}
?>

</body>
</html>
