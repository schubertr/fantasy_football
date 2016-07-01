<html>


<title>TYRS Fantasy Football</title>


<link rel="stylesheet" href="style.css">


<body>
<?PHP

include "navbar.php";
$db = new PDO('mysql:host=localhost;dbname=fantasy_football;charset=utf8', 'root', '');

$stmt = $db->query("SELECT teamID, teamName From teams");
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<br /><blockquote> <h2> Teams List </h2> <hr />";
foreach ($result as $team) {
	$ID = $team["teamID"];
	$name = $team["teamName"];
	echo "<a href='roster.php?id=".$ID."&name=$name' >";
	echo $name."</a><br/>";
}
echo "<br />";
	
	
	
include "footer.php";

?>




</body>

</html>