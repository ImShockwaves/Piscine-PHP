<?php
function get_object_data($id)
{
	$handle = fopen("database/articles.csv", "r");
	while (($data = fgetcsv($handle, ",")) !== false)
	{
		if ($data[0] == $id)
		{
			fclose($handle);
			return ($data);
		}
	}
}
?>