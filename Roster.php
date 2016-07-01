<html>


<title>TYRS Fantasy Football</title>


<link rel="stylesheet" href="style.css">


<body>
<?PHP
$id = $_GET["id"];
$name = $_GET["name"];
include "navbar.php";
$db = new PDO('mysql:host=localhost;dbname=fantasy_football;charset=utf8', 'root', '');

$stmt = $db->query("SELECT playerID, lastName, firstName, pos FROM players WHERE teamID = '$id' Order BY pos ASC");
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<br /><blockquote><h2> ".$name."'s Roster </h2> <hr />";

foreach($result as $player){
	$playerID = $player["playerID"];
	$lastName = $player["lastName"];
	$firstName = $player["firstName"];
	$pos = $player["pos"];
	echo "<a href='player.php?id=".$playerID."' >";
	echo $lastName." ".$firstName."</a> (".$pos.") <br/>";
}

echo "<br />";
	
	
	
include "footer.php";

?>




</body>

</html>