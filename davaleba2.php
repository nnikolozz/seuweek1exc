
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Nishnebis uwyisi</title></head>
<body>

<h2>Nishnebis uwyisi</h2>

<form method="post">
  Studentis saxeli: <input type="text" name="saxeli"><br>
  Studentis gvari: <input type="text" name="gvari"><br>
  Kursi: <input type="text" name="kursi"><br>
  Semestri: <input type="text" name="semestri"><br>
  Saswavlo kursi: <input type="text" name="sagani"><br>
  Qula: <input type="text" name="qula"><br>
  Leqtori: <input type="text" name="leqtori"><br>
  Dekani: <input type="text" name="dekani"><br><br>

  <input type="submit" name="submit" value="Gagzavna">
</form>

<?php
if (isset($_POST['submit'])) {

    $saxeli = $_POST['saxeli'];
    $gvari = $_POST['gvari'];
    $kursi = $_POST['kursi'];
    $semestri = $_POST['semestri'];
    $sagani = $_POST['sagani'];
    $qula = $_POST['qula'];
    $leqtori = $_POST['leqtori'];
    $dekani = $_POST['dekani'];

    if ($qula >= 91) {
        $shefaseba = "A";
        $ganmarteba = "friadi";
    }
    elseif ($qula >= 81) {
        $shefaseba = "B";
        $ganmarteba = "dzalian kargi";
    }
    elseif ($qula >= 71) {
        $shefaseba = "C";
        $ganmarteba = "kargi";
    }
    elseif ($qula >= 61) {
        $shefaseba = "D";
        $ganmarteba = "damakmayofilebeli";
    }
    elseif ($qula >= 51) {
        $shefaseba = "E";
        $ganmarteba = "sakmarisi";
    }
    elseif ($qula >= 41) {
        $shefaseba = "FX";
        $ganmarteba = "ver chaabara";
    }
    else {
        $shefaseba = "F";
        $ganmarteba = "chaichra";
    }

    echo "<h3>Shedegi</h3>
    <table border='1' cellpadding='5'>
    <tr>
        <th>Saxeli</th>
        <th>Gvari</th>
        <th>Kursi</th>
        <th>Semestri</th>
        <th>Sagani</th>
        <th>Qula</th>
        <th>Shefaseba</th>
        <th>Ganmarteba</th>
        <th>Leqtori</th>
        <th>Dekani</th>
    </tr>
    <tr>
        <td>$saxeli</td>
        <td>$gvari</td>
        <td>$kursi</td>
        <td>$semestri</td>
        <td>$sagani</td>
        <td>$qula</td>
        <td>$shefaseba</td>
        <td>$ganmarteba</td>
        <td>$leqtori</td>
        <td>$dekani</td>
    </tr>
    </table>";
}
?>

</body>
</html>
x