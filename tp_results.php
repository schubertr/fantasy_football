<html>

<title>TYRS Fantasy Football</title>

<link rel="stylesheet" href="style.css">

<style>

	/*I need help getting the style here right. The percentages are not consistent. They just need to all be centered */

	table.btn{margin-left:auto; margin-right:auto;}
	h1.titles{width: 35%; margin-left: auto; margin-right: auto; white-space: nowrap}
	h2.subs{width: 18%; margin-left: auto; margin-right: auto; white-space: nowrap}
	h1.titles_DEF{width: 28%; margin-left: auto; margin-right: auto; white-space: nowrap}
	h2.subs_DEF{width: 8%; margin-left: auto; margin-right: auto; white-space: nowrap}
	th.l{text-align: left;}
	th.r{text-align: right; white-space: nowrap;}
	table.stats1{width: 200px; margin-left: auto; margin-right: auto;}
	div.btnLink{width: 11%; margin-left: auto; margin-right: auto; white-space: nowrap}
	div.btnLink_DEF{width: 11%; margin-left: auto; margin-right: auto; white-space: nowrap}

</style>

<body>

	<?PHP
	include "navbar.php";
	session_start();

	$pos = $_SESSION["pos"];
	$stat = $_GET["stat"];
	$full_pos = null;
	$full_stat = null;

	switch ($pos)
	{
		case "qbs":
		$full_pos = "Quarterback";
		break;
		case "rbs":
		$full_pos = "Running Back";
		break;
		case "wrs":
		$full_pos = "Wide Reciever";
		break;
		case "tes":
		$full_pos = "Tight End";
		break;
		case "ks":
		$full_pos = "Kicker";
		break;
		case "defs":
		$full_pos = "Defense";
		break;
	}

	switch ($stat)
	{
		case "passYds":
		$full_stat = "Passing Yards";
		break;
		case "passTd":
		$full_stat = "Passing Touchdowns";
		break;
		case "int":
		$full_stat = "Interceptions";
		break;
		case "rushYds":
		$full_stat = "Rushing Yards";
		break;
		case "catches":
		$full_stat = "Catches";
		break;
		case "recYds":
		$full_stat = "Recieving Yards";
		break;
		case "redTds":
		$full_stat = "Reg Touchdowns";
		break;
		case "pointsEspn":
		$full_stat = "ESPN Points";
		break;
		case "pointsPpr":
		$full_stat = "PPR Points";
		break;
		case "pointsTd":
		$full_stat = "TD Points";
		break;
		case "points2Qb":
		$full_stat = "2 QB Points";
		break;
		case "pointsCust":
		$full_stat = "Custom Points";
		break;
		case "FG1":
		$full_stat = "Field Goals 0-39 yds";
		break;
		case "FG2":
		$full_stat = "Field Goals 40-49 yds";
		break;
		case "FG3":
		$full_stat = "Field Goals 50+ yds";
		break;
		case "XP":
		$full_stat = "Extra Points";
		break;
		case "regScore":
		$full_stat = "Score";
		break;
	}


	$db = new PDO('mysql:host=localhost;dbname=fantasy_football;charset=utf8', 'root', '');


	echo "$pos<br>";
	echo "$stat";

	$stmt = $db->query("SELECT * FROM $pos ORDER BY $stat DESC LIMIT 25");
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$stat_to_order = 0;

	if($pos == "defs")
	{

		

		$len = count($result);

		echo "<br>";
		echo "<h1 class=titles_DEF>Top 25 Defenses</h1>";
		echo "<h2 class=subs_DEF>$full_stat</h2>";

		echo "<div class = btnLink_DEF>";

		echo "<form method='link' action='topplayers.php'>
		<input type='submit' value='Change Stats'>
	</form>";

		echo "</div>";

	echo "<table class = stats1>";
	echo "<th></th>";
	echo "<th class = l>Team</th>";
	echo "<th class = r>$full_stat</th>";

	$num = 1;

	for($i = 0 ; $i < $len ; $i++)
	{

		$teamID = $result[$i]['teamID'];
		$stmt2 = $db->query("SELECT teamName FROM teams WHERE teamID = $teamID");
		$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
		$team = $result2[0]['teamName'];
		$stat_to_order = $result[$i][$stat];

		echo "<tr>";
		echo "<td style= 'font-weight : bold'>$num.</td>";
			echo "<td style='text-align: left; white-space: nowrap;'><a href='Roster.php?id=$teamID&name=$team'>$team</a></td>"; //fix roster page to take 001 & 1
			echo "<td style='text-align: right;'>$stat_to_order</td>";
			echo "</tr>";

			$num++;
		}

		echo "</table><br><br>";

	}
	else
	{
		$len = count($result);

	//echo "<pre>";
	//print_r($result);
	//echo "</pre><br><br><br><br>";

		echo "<br>";
		echo "<h1 class=titles>Top 25 $full_stat</h1>";
		echo "<h2 class=subs>$full_pos</h2>";

		echo "<div class = btnLink>";

		echo "<form method='link' action='topplayers.php'>
		<input type='submit' value='Change Stats'>
	</form>";

		echo "</div>";

		echo "<table class = stats1>";
		echo "<th></th>";
		echo "<th class = l>Name</th>";
		echo "<th class = r>$full_stat</th>";

		$num = 1;

		for($i = 0 ; $i < $len ; $i++)
		{
			$playerID = $result[$i]['playerID'];
			$stat_to_order = $result[$i][$stat];
			$first = $result[$i]['firstName'];
			$last = $result[$i]['lastName'];

			echo "<tr>";
			echo "<td style= 'font-weight : bold'>$num.</td>";
			echo "<td style='text-align: left; white-space: nowrap;'>$first $last</td>"; //make this link to player page
			echo "<td style='text-align: right;'>$stat_to_order</td>";
			echo "</tr>";

			$num++;
		}

		echo "</table><br><br>";
	}

	include "footer.php"
	?>

</body>

</html>