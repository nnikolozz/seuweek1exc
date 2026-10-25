
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 3</title>
</head>
<body>

<h2>საქაღალდის წაშლა</h2>

<form method="POST">
    <input type="text" name="folder"
           placeholder="საქაღალდის სახელი" required>
    <button type="submit">წაშლა</button>
</form>

<h2>საქაღალდის შემოწმება</h2>

<form method="GET">
    <input type="text" name="check"
           placeholder="საქაღალდის სახელი" required>
    <button type="submit">შემოწმება</button>
</form>

<?php

// საქაღალდის წაშლა POST მეთოდით
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["folder"])) {

    $name = basename(trim($_POST["folder"]));

    if ($name == "" || $name == "." || $name == "..") {
        echo "შეიყვანე სწორი სახელი.";
    } else {
        $folder = __DIR__ . "/" . $name;

        if (is_dir($folder)) {

            $items = scandir($folder);

            if (count($items) == 2) {

                if (rmdir($folder)) {
                    echo "საქაღალდე წარმატებით წაიშალა.";
                } else {
                    echo "საქაღალდის წაშლა ვერ მოხერხდა.";
                }

            } else {
                echo "საქაღალდე ცარიელი არ არის და ვერ წაიშლება.";
            }

        } else {
            echo "საქაღალდე არ არსებობს.";
        }
    }
}

// საქაღალდის არსებობის შემოწმება GET მეთოდით
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
