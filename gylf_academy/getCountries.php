<?php
mysql_connect ("web01.enterthehealingschool.org", "youthleaders", "nwljrcn8-@dl") or die ('Error:' . mysql_error());
		  mysql_select_db ("youthlea_gylf");
		  
		  
function getCountry($country_id)
{
	$result = mysql_query("SELECT country_name from countries where country_id = '".$country_id."'");
	if(!$result)
	die("Record not found: ".mysql_error()."Country");
	else
	$records = mysql_fetch_assoc($result);
	return $records['country_name'];
}
?>

	<option value="">Select Country</option>
<?php
for($i = 1; $i < 250; $i++)
{
	$countr=getCountry($i);
?>
        <option value="<?php echo "$countr"; ?>"> <?php  echo "$countr"; ?> </option>
<?php
}
?>



