<html>

<title>TYRS Fantasy Football</title>

<link rel="stylesheet" href="style.css">

<style>

table.btn{margin-left:auto; margin-right:auto;}

</style>

<body>

<?PHP
include "navbar.php";
?>

<br>
<table class = "btn">
<td>

<form action="getStats.php">
  <select name="pos">
    <option value="qbs">Quarterback</option>
    <option value="wrs">Wide Reciever</option>
    <option value="rbs">Running Back</option>
    <option value="tes">Tight End</option>
    <option value="ks">Kicker</option>
    <option value="defs">Defense</option>
  </select>
  <input type="submit">
</form>

</td>

</table>

<?PHP
include "footer.php"
?>

</body>

</html>