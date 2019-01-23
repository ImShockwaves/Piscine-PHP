<?php
include('auth.php');
session_start();
if (!($_POST['login'] && $_POST['passwd'] && $res = auth($_POST['login'], $_POST['passwd'])))
{
	$_SESSION['loggued_on_user'] = "";
	header('Location: index.html');
	echo "ERROR\n";
}
else
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>42Chat</title>
	</head>
	<body>
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
	<form action="../newgame.php" method="post">
		<input type="submit" class="button" name="create" value="Create game"></input>
	</form>
	<form action="../joingame.php" method="post">
		<input type="submit" class="button" name="join" value="Join game"></input>
	</form>
	<form action="logout.php" method="post">
		<input type="submit" class="button" name="delog" value="Logout"></input>
	</form>
	<button><a href="modif.html">Modify account</a></button>
	<button><a href="ladder.php">Ladder</a></button>
</html>
<?php
}
?>
