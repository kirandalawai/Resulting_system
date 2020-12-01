<html>
<head>

<?php
session_start();
if($_SESSION['alogin']==true)
{
	require("vendor/autoload.php");
	$client=new MongoDB\Client;
	$local=$client->kiran;
	$coll=$local->results;

	$col=[['$group'=>['_id'=>['Name'=>'$Name'],'count'=>['$sum'=>1]]]];

	$row=$coll->aggregate($col);

	foreach ($row as $key )
	{
		print_r($key->_id->Name);
		print ": ";

		print_r($key->count);
		echo "<br>";
	}
}
else
{
	header('location:adminlogin.php');
}

?>
</head>
<body bgcolor="skyblue">
</body>
</html>