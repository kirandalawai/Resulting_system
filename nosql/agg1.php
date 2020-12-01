<html>
<head>

<?php
	require("vendor/autoload.php");
	$client=new MongoDB\Client;
	$local=$client->kiran;
	$coll=$local->results;


	$col = [['$match'=>['Exam_details.eligble_for_next_interview'=>['$eq'=>'yes']]],['$group'=>['_id'=>['Name'=>'$Name']]]];


	$row=$coll->aggregate($col);
	echo "<h4>Eligible candidates for next further steps</h4><br>";
	foreach ($row as $key )
	{
		print_r($key->_id->Name);
		echo "<br>";
	}

?>
</head>
<body bgcolor="skyblue"><br><br>
	<a href = "singshow1.php">back</a>
</body>
</html>