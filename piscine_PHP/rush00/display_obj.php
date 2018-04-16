<?php
function display_obj($id, $quantity)
{
	$handle = fopen("database/articles.csv", "r");
	while (($data = fgetcsv($handle, ",")) !== false)
	{
		if ($data[0] == $id)
		{
			$totprice = $data[4] * $quantity;
			$name = $data[1];
			break;
		}
	}
	if ($id == 1)
	{
		?>
		<img style="float: left; width: 20%;" src="img/nuit_etoilee.jpg" alt="nuit_etoilee">
		<h4><?php echo $name ?></h4>
		<p> prix: 
		<?php
		echo $totprice."\n";
		?>
		</p>
		<p>  quantité: 
		<?php
		echo $quantity."\n";
		?>
		</p>
		<?php
	}
	if ($id == 2)
	{
		?>
		<img style="float: left; width: 20%;" src="img/joconde.jpg" alt="joconde">
		<h4><?php echo $name ?></h4>
		<p> prix: 
		<?php
		echo $totprice."\n";
		?>
		</p>
		<p>  quantité: 
		<?php
		echo $quantity."\n";
		?>
		</p>
		<?php
	}
	if ($id == 3)
	{
		?>
		<img style="float: left; width: 20%;" src="img/cene.jpg" alt="cene">
		<h4><?php echo $name ?></h4>
		<p> prix: 
		<?php
		echo $totprice."\n";
		?>
		</p>
		<p>  quantité: 
		<?php
		echo $quantity."\n";
		?>
		</p>
		<?php
	}
	if ($id == 4)
	{
		?>
		<img style="float: left; width: 20%;" src="img/adam.jpg" alt="adam">
		<h4><?php echo $name ?></h4>
		<p> prix: 
		<?php
		echo $totprice."\n";
		?>
		</p>
		<p>  quantité: 
		<?php
		echo $quantity."\n";
		?>
		</p>
		<?php
	}
	if ($id == 5)
	{
		?>
		<img style="float: left; width: 20%;" src="img/cri.jpg" alt="cri">
		<h4><?php echo $name ?></h4>
		<p> prix: 
		<?php
		echo $totprice."\n";
		?>
		</p>
		<p>  quantité: 
		<?php
		echo $quantity."\n";
		?>
		</p>
		<?php
	}
}
?>