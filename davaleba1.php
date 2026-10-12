
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>დავალება 1</title>
</head>
<body>

<h2>Saxelfaso uwyisi</h2>

<form method="get">
    Saxeli: <input type="text" name="saxeli" required><br><br>
    Gvari: <input type="text" name="gvari" required><br><br>
    Tanamdeboba: <input type="text" name="tanamdeboba" required><br><br>
    Xelfasi: <input type="number" name="xelfasi" step="0.01" min="0" required><br><br>

    Gadasaxadi:
    <select name="procenti">
        <option value="5">5%</option>
        <option value="10">10%</option>
        <option value="15">15%</option>
        <option value="18">18%</option>
        <option value="20">20%</option>
        <option value="25">25%</option>
    </select>
    <br><br>

    <input type="submit" name="gagzavna" value="Gagzavna">
</form>

<?php
if (isset($_GET['gagzavna'])) {

    $saxeli = $_GET['saxeli'];
    $gvari = $_GET['gvari'];
    $tanamdeboba = $_GET['tanamdeboba'];
    $xelfasi = $_GET['xelfasi'];
    $p = $_GET['procenti'];

    // Fiqsirebuli 20%
    $gadasaxadi1 = $xelfasi * 20 / 100;
    $xelzeasagebi1 = $xelfasi - $gadasaxadi1;

    // Archeuli procenti
    $gadasaxadi2 = $xelfasi * $p / 100;
    $xelzeasagebi2 = $xelfasi - $gadasaxadi2;

    echo "<h3>Shedegi</h3>";

    echo "<table border='1' cellpadding='5'>
    <tr>
        <th>Saxeli</th>
        <th>Gvari</th>
        <th>Tanamdeboba</th>
        <th>Xelfasi</th>
        <th>Gadasaxadi 20%</th>
        <th>Xelze 20%</th>
        <th>Gadasaxadi $p%</th>
        <th>Xelze $p%</th>
    </tr>
    <tr>
        <td>$saxeli</td>
        <td>$gvari</td>
        <td>$tanamdeboba</td>
        <td>$xelfasi</td>
        <td>$gadasaxadi1</td>
        <td>$xelzeasagebi1</td>
        <td>$gadasaxadi2</td>
        <td>$xelzeasagebi2</td>
    </tr>
    </table>";
}
?>

</body>
</html>
