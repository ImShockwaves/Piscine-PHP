<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>boutique</title>
		<style>
			.head
			{
				background-color: gray;
				width: 80%;
				height: 40%;
				text-align: right;
			}
			.toile
			{
				width: 100%;
				margin: 4%;
				padding: 2%;
				display: inline-block;
				border-bottom: 1px solid black;
			}
			.toile img
			{
				width: 30%;
				height: auto;
			}
			.toile p h4 button
			{
				text-align: center;
				position: relative;
				left: 400%;
			}
		</style>
	</head>
	<body bgcolor="#D7B9D7">
		<h1 style="text-align: center;">Boutique de répliques de tableaux connus</h1>
		<center><div class="head">
			<?php  
				if ($_SESSION['login'] == "")
				{
			?>
				<a href="login.php">se connecter</a>
			<?php
				}
				else 
				{
				echo "Bonjour ".$_SESSION['login']." !";
?>
			<a href="logout.php">deconnexion</a>
			<a href="account.php">mon compte</a>
			<?php
				}
			?>	
			<a href="panier.php">panier</a>
		</div></center>
		<?php
				$handle = fopen('database/articles.csv', 'r');
				$i = 0;
		?>
		<div class="toile">
		<?php
		$data = fgetcsv($handle, ",");
		?>
		<img style="float: left;" src="img/nuit_etoilee.jpg" alt="nuit_etoilee">
		<h4>La nuit etoilee de Van Gogh</h4>
		<p style="vertical-align: middle;">stock: <?php echo $data[3]; ?></p>
		<p style="vertical-align: middle;">prix: <?php echo $data[4]; ?></p>
		<form action="" method="POST">
			<input type="text" name="quantity1" placeholder="quantité" value="" />
			<input type="submit" name="add1" value="ajouter au panier"/>
		</form>
		</div><br>
		<div class="toile">
		<?php
		$data = fgetcsv($handle, ",");
		?>
		<img style="float: left;" src="img/joconde.jpg" alt="joconde">
		<p style="vertical-align: middle;">stock: <?php echo $data[3]; ?></p>
		<p style="vertical-align: middle;">prix: <?php echo $data[4]; ?></p>
		<form action="" method="POST">
			<input type="text" name="quantity2" placeholder="quantité" value="" />
			<input type="submit" name="add2" value="ajouter au panier"/>
		</form>
		</div>
		<div class="toile">
		<?php
		$data = fgetcsv($handle, ",");
		?>
		<img style="float: left;" src="img/cene.jpg" alt="cene">
		<p style="vertical-align: middle;">stock: <?php echo $data[3]; ?></p>
		<p style="vertical-align: middle;">prix: <?php echo $data[4]; ?></p>
		<form action="" method="POST">
			<input type="text" name="quantity3" placeholder="quantité" value="" />
			<input type="submit" name="add3" value="ajouter au panier"/>
		</form>
		</div>
		<div class="toile">
		<?php
		$data = fgetcsv($handle, ",");
		?>
		<img style="float: left;" src="img/adam.jpg" alt="adam">
		<p style="vertical-align: middle;">stock: <?php echo $data[3]; ?></p>
		<p style="vertical-align: middle;">prix: <?php echo $data[4]; ?></p>
		<form action="" method="POST">
			<input type="text" name="quantity4" placeholder="quantité" value="" />
			<input type="submit" name="add4" value="ajouter au panier"/>
		</form>
		</div>
		<div class="toile">
		<?php
		$data = fgetcsv($handle, ",");
		?>
		<img style="float: left;" src="img/cri.jpg" alt="cri">
		<p style="vertical-align: middle;">stock: <?php echo $data[3]; ?></p>
		<p style="vertical-align: middle;">prix: <?php echo $data[4]; ?></p>
		<form action="" method="POST">
			<input type="text" name="quantity5" placeholder="quantité" value="" />
			<input type="submit" name="add5" value="ajouter au panier"/>
		</form>
		</div>
		<p style="text-align: right;">Ccharrie 2018</p>
	</body>
</html>
<?php
include ('get_object_data.php');
include ('check_panier.php');
if(isset($_POST['add1'])) 
{
	$data = get_object_data(1);
	if ($_POST['quantity1'] < $data[1] && $_POST['quantity1'] > 0)
    {
    	if (check_panier(1, $_POST['quantity1']) == 0)
    	{
    		$handle = fopen("database/panier.csv", "a");
    		$product = array($_SESSION['login'], 1, $_POST['quantity1']);
    		fputcsv($handle, $product);
    		fclose($handle);
    	}
    }
}
if(isset($_POST['add2'])) 
{ 
    $data = get_object_data(2);
	if ($_POST['quantity2'] < $data[2] && $_POST['quantity2'] > 0)
    {
    	if (check_panier(2, $_POST['quantity2']) == 0)
    	{
    		$handle = fopen("database/panier.csv", "a");
    		$product = array($_SESSION['login'], 2, $_POST['quantity2']);
    		fputcsv($handle, $product);
    		fclose($handle);
    	}
    }
}
if(isset($_POST['add3'])) 
{
	$data = get_object_data(3);
	if ($_POST['quantity3'] < $data[3] && $_POST['quantity3'] > 0)
    {
    	if (check_panier(3, $_POST['quantity3']) == 0)
    	{
    		$handle = fopen("database/panier.csv", "a");
    		$product = array($_SESSION['login'], 3, $_POST['quantity3']);
    		fputcsv($handle, $product);
    		fclose($handle);
    	}
    }
}
if(isset($_POST['add4'])) 
{ 
    $data = get_object_data(4);
    if ($_POST['quantity4'] < $data[3] && $_POST['quantity4'] > 0)
    {
    	if (check_panier(4, $_POST['quantity4']) == 0)
    	{
    		$handle = fopen("database/panier.csv", "a");
    		$product = array($_SESSION['login'], 4, $_POST['quantity4']);
    		fputcsv($handle, $product);
    		fclose($handle);
    	}
    }
}
if(isset($_POST['add5'])) 
{ 
    $data = get_object_data(5);
    if ($_POST['quantity5'] < $data[3] && $_POST['quantity5'] > 0)
    {
    	if (check_panier(5, $_POST['quantity5']) == 0)
    	{
    		$handle = fopen("database/panier.csv", "a");
    		$product = array($_SESSION['login'], 5, $_POST['quantity5']);
    		fputcsv($handle, $product);
    		fclose($handle);
    	}
	}
} 
?>