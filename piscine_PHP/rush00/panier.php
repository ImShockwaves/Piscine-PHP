<?php
session_start();
include('display_obj.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Panier</title>
		<style>
			.toile
			{
				display: inline-block;
				width: 100%;
				margin: 4%;
				padding: 2%;
				border-bottom: 1px solid black;
			}
		</style>
	</head>
	<body bgcolor="#D7B9D7">
		<center><h2>Votre panier</h2></center>
		<?php
		$handle = fopen("database/panier.csv", 'r');
		$i = 0;
		while (($data = fgetcsv($handle, ",")) !== false)
		{
			if ($data[0] == $_SESSION['login'] && $data[2] > 0)
			{
				?>
				<div class="toile">
				<?php
				$_SESSION['panier'][] = array('id ' => $data[1] ,'quantity' => $data[2]);
				$i++;
			}
		}
		foreach ($_SESSION['panier'] as $panier)
		{
			display_obj($panier['panier']['id'], $panier['quantity']);
			?>
				<form action="mod_panier.php?id=$_SESSION['panier']['id']" method="GET">
				<input type="text" name="quantity" placeholder="quantité" value="" />
				<input type='submit' name='change' value='changer la quantité'/>
				</form>
				</div>
				<?php
			}
		}
		?>
		<a href="index.php">Retour a l'accueil</a>
	</body>
</html>