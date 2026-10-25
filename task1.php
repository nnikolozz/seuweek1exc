
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 1</title>
</head>
<body>

<h2>საქაღალდის შექმნა</h2>

<form method="POST">
    <label>საქაღალდის სახელი:</label>
    <input type="text" name="folder" required>
    <button type="submit">შექმნა</button>
</form>

<?php
if (isset($_POST["folder"])) {

    $folder = basename($_POST["folder"]);

    if (!is_dir($folder)) {
        if (mkdir($folder)) {
            echo "საქაღალდე წარმატებით შეიქმნა!";
        } else {
            echo "შექმნა ვერ მოხერხდა.";
        }
    } else {
        echo "ასეთი საქაღალდე უკვე არსებობს.";
    }
}
?>

</body>
</html>
