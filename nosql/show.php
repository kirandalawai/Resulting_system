
	<?php
	//if(isset($_POST['submit']))
	//{
	$res = array();
		$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

	//$filter=['service.salary'=>['$gt'=>60000]];
		$options=[];
		$filter=[];

		$query=new MongoDB\Driver\Query($options,$filter);
		$row=$mng->executeQuery("kiran.results",$query);
				foreach($row as $rows)
				{
					var_dump($rows);
					echo "<br><br>";
				}

				
	?>

	
