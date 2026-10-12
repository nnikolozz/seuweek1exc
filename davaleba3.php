
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Testi</title>
</head>
<body>

<h2>Testi PHP-shi</h2>

<form method="post">

  <p><b>1. romeli simboloti iwyeba cvladi PHP-shi?</b></p>
  <input type="radio" name="pasuxi1" value="a"> &amp;
  <input type="radio" name="pasuxi1" value="b"> $
  <input type="radio" name="pasuxi1" value="c"> #
  <input type="radio" name="pasuxi1" value="d"> @

  <p><b>2. romeli tegit iwyeba PHP kodi?</b></p>
  <input type="radio" name="pasuxi2" value="a"> &lt;php&gt;
  <input type="radio" name="pasuxi2" value="b"> &lt;script&gt;
  <input type="radio" name="pasuxi2" value="c"> &lt;?php
  <input type="radio" name="pasuxi2" value="d"> &lt;!--

  <p><b>3. romeli metodit igzavneba monacemebi faruli saxit?</b></p>
  <input type="radio" name="pasuxi3" value="a"> GET
  <input type="radio" name="pasuxi3" value="b"> POST
  <input type="radio" name="pasuxi3" value="c"> PUT
  <input type="radio" name="pasuxi3" value="d"> SEND

  <p><b>4. ra gafartoeba aqvs PHP fails?</b></p>
  <input type="text" name="pasuxi4">

  <p><b>5. romeli operatori gamoiyeneba ekranze teqstis gamosatanad?</b></p>
  <input type="text" name="pasuxi5">

  <br><br>
  <input type="submit" name="submit" value="Shemowmeba">

</form>

<?php
if (isset($_POST['submit'])) {

    $qulebis_raodenoba = 0;

    if (isset($_POST['pasuxi1']) && $_POST['pasuxi1'] == "b") {
        $qulebis_raodenoba++;
    }

    if (isset($_POST['pasuxi2']) && $_POST['pasuxi2'] == "c") {
        $qulebis_raodenoba++;
    }

    if (isset($_POST['pasuxi3']) && $_POST['pasuxi3'] == "b") {
        $qulebis_raodenoba++;
    }

    if (strtolower(trim($_POST['pasuxi4'])) == "php" ||
        strtolower(trim($_POST['pasuxi4'])) == ".php") {
        $qulebis_raodenoba++;
    }

    if (strtolower(trim($_POST['pasuxi5'])) == "echo" ||
        strtolower(trim($_POST['pasuxi5'])) == "print") {
        $qulebis_raodenoba++;
    }

    echo "<h3>Shedegi</h3>";
    echo "<p><b>Swori pasuxebis raodenoba: $qulebis_raodenoba/5</b></p>";
}
?>

</body>
</html>
