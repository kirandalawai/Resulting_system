<html>
<head>

<title>Result System</title>
<style type="text/css">
        .cont_select_center {
  position: absolute;
  left: 50%;
  top:30%;
  margin-top: -20px;
  margin-left: -150px;
}
input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  font-size: 100%;
}
input[type=text],input[type=password]
{
    width: 90%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 15px;
  box-sizing: border-box;
  text-align: left;
  position: center;
}
.img{
  height: 150px;
  background-repeat: no-repeat;
  background-image: url(header.png);
}
</style>

<?php
if(isset($_POST['submit']))
{
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulk = new MongoDB\Driver\BulkWrite;
	$uname = $_POST["n1"];     
	$pw = $_POST["n2"];     

    $user = ['_id' => new MongoDB\BSON\ObjectId,'uname' => $uname,'pw' => $pw];

    	$bulk->insert($user);
    	$result = $mng->executeBulkWrite('kiran.login', $bulk);

    	if($result)
    	{
    		echo "<script>alert('Registered successfully');";
        echo'window.location="home1.php"</script>';
    	}
    	else
    	{
    		echo "<script>alert('failed to registered');";
    		echo'window.location="userregis.php"</script>';
    	}
}
?> 
</head>
<body>
    <div class='img'> </div>
    <div class="cont_select_center">
	<form name="" action="" method="post">
		<input type="text" name="n1" placeholder="username" required><br>

		<input type="password" name="n2" placeholder="password" required><br>
		<input type="submit" name="submit"><br>
        Already User ?<a href = "ulogin.php">Login</a>
        <br><br><br><br><a href ="home1.php">back</a>
</form>
</div>
</body>
</html>