<html>

<title>TYRS Fantasy Football</title>

<link rel="stylesheet" href="style.css">

<style>

table.btn{margin-left:auto; margin-right:auto;}

</style>

<body>

<?PHP
include "navbar.php";

$pos = $_GET["pos"];

session_start();

$_SESSION["pos"] = $pos;

echo "<table class = 'btn'>
<td>

<form action='getStats.php'>
  <select name='pos'>";

  if($pos == "qbs")
  	echo "<option value='qbs' selected>Quarterback</option>";
  else
  	echo "<option value='qbs'>Quarterback</option>";
  if($pos == "wrs")
  	echo "<option value='wrs' selected>Wide Reciever</option>";
  else
  	echo "<option value='wrs'>Wide Reciever</option>";
  if($pos == "rbs")
  	echo "<option value='rbs' selected>Running Back</option>";
  else
  	echo "<option value='rbs'>Running Back</option>";
  if($pos == "tes")
  	echo "<option value='tes' selected>Tight End</option>";
  else
  	echo "<option value='tes'>Tight End</option>";
  if($pos == "ks")
  	echo "<option value='ks' selected>Kicker</option>";
  else
  	echo "<option value='ks'>Kicker</option>";
  if($pos == "defs")
  	echo "<option value='defs' selected>Defense</option>";
  else
  	echo "<option value='defs'>Defense</option>";

echo "</select>
  <input type='submit' value = 'Change Position'>
</form>

</td>
<td>";

if($pos == "qbs" || $pos == "rbs" || $pos == "wrs" || $pos == "tes")
	
	echo " <form action='tp_results.php'>
  	<select name='stat'>
    	<option value='passYds'>Passing Yards</option>
    	<option value='passTd'>Passing TDs</option>
    	<option value='int'>Interceptions</option>
    	<option value='rushYds'>Rushing Yards</option>
    	<option value='catches'>Catches</option>
    	<option value='recYds'>Recieving Yards</option>
    	<option value='redTds'>Reg Touchdowns</option>
    	<option value='pointsEspn'>ESPN Points</option>
    	<option value='pointsPpr'>PPR Points</option>
    	<option value='pointsTd'>TD Points</option>
    	<option value='points2Qb'>2 QB Points</option>
    	<option value='pointsCust'>Custom Points</option>
  	</select>
 	 <input type='submit' value = 'Get Stats'>
	</form>";

if($pos == "ks")

	echo " <form action='tp_results.php'>
  	<select name='stat'>
    	<option value='FG1'>Field Goals 0-39 yds</option>
    	<option value='FG2'>Field Goals 40-49 yds</option>
    	<option value='FG3'>Field Goals 50+ yds</option>
    	<option value='XP'>Extra Points</option>
    	<option value='pointsEspn'>ESPN Points</option>
    	<option value='pointsPpr'>PPR Points</option>
    	<option value='pointsTd'>TD Points</option>
    	<option value='points2Qb'>2 QB Points</option>
    	<option value='pointsCust'>Custom Points</option>
  	</select>
 	 <input type='submit' value = 'Get Stats'>
	</form>";

if($pos == "defs") //rename the 'pointsTD' in the database to 'pointsTd' for defenses

	echo " <form action='tp_results.php'>
  	<select name='stat'>
    	<option value='regScore'>Score</option>
    	<option value='pointsPpr'>PPR Points</option>
    	<option value='pointsTd'>TD Points</option>
    	<option value='points2Qb'>2 QB Points</option>
    	<option value='pointsCust'>Custom Points</option>
  	</select>
 	 <input type='submit' value = 'Get Stats'>
	</form>";

echo "</td>
</table>";

include "footer.php"

?>

</body>

</html>