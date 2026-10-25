
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 2</title>
</head>
<body>

<h2>საქაღალდის შექმნა</h2>

<form method="POST">
    <input type="text" name="folder"
           placeholder="ახალი საქაღალდის სახელი" required>
    <button type="submit">შექმნა</button>
</form>

<h2>საქაღალდის შემოწმება</h2>

<form method="GET">
    <input type="text" name="check"
           placeholder="შესამოწმებელი საქაღალდის სახელი" required>
    <button type="submit">შემოწმება</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["folder"])) {

    $name = basename(trim($_POST["folder"]));

    if ($name == "" || $name == "." || $name == "..") {
        echo "შეიყვანე სწორი სახელი.";
    } else {
        $folder = __DIR__ . "/" . $name;

        if (!is_dir($folder)) {
            if (mkdir($folder)) {
                echo "საქაღალდე წარმატებით შეიქმნა.";
            } else {
                echo "საქაღალდის შექმნა ვერ მოხერხდა.";
            }
        } else {
            echo "საქაღალდე უკვე არსებობს.";
        }
    }
}

if (isset($_GET["check"])) {

    $name = basename(trim($_GET["check"]));

    if ($name == "" || $name == "." || $name == "..") {
        echo "შეიყვანე სწორი სახელი.";
    } else {
        $folder = __DIR__ . "/" . $name;

        if (is_dir($folder)) {
            echo "საქაღალდე არსებობს.";
        } else {
            echo "საქაღალდე არ არსებობს.";
        }
    }
}

?>

</body>
</html>
