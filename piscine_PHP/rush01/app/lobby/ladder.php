<!DOCTYPE html>
<html>
<head>
	<title>Ladder</title>
	<style>
		h1
		{
			text-align: center;
		}
		table
		{
			border-collapse: collapse;
			margin: auto;
		}
		.tab
		{
			border: 1px solid black; 
		}
		button
		{
			text-align: center;
		}
		form
		{
			margin-top: 5%;
			margin-bottom: 5%;
		}
		.hey
		{
			border: 1px solid black;
			font-weight: bold;
			font-size: 130%;
		}
	</style>
</head>
<body>
<h1>Ladder</h1>
<table>
	<tr>
		<td class="hey">Name</td>
		<td class="hey">Ratio</td>
	</tr>
<?php
$db = mysqli_connect("localhost:3307", "root", "tyJKUUY5", "d08");
	if (!$db)
		die('Requête invalide : ' . mysql_error());
	$query = "SELECT name, win, nbgame, lose, (win*100/nbgame) ratio FROM users ORDER BY ratio DESC;";
	$res = mysqli_query($db, $query);
	while ($resul = mysqli_fetch_assoc($res))
	{
		echo '
		<tr>
			<td class="tab">'.$resul['name'].'</td>
			<td class="tab">'.$resul['ratio'].'%</td>
		</tr>';
	}	
?>
</table>
<center><form action="stat.php" method="post">
	Find a player : <input type="text" name="name" value=""/>
	<input type="submit" name="Find" value="Find"/>
</form></center>
<center><button><a href="lobbychat.php">Return to lobby</a></button><center>
</body>
</html>