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
$uname=$_POST['uname'];
$psw=$_POST['psw'];
$mng=new MongoDB\Driver\Manager('mongodb://localhost:27017');
$query=new MongoDB\Driver\Query([]);
$row=$mng->executeQuery('kiran.admin',$query);
$testpassword=0;
$testuser=0;
foreach ($row as $key) {
	if($key->uname == $uname ) 
		{
			if($key->pw==$psw)
			{
				$testpassword=1;
				break;
			}
		}
}
if($testpassword==1)
{	
	session_start();
$_SESSION['alogin']=true;
				echo "<script>alert('Login successful');";
        echo'window.location="home.php"</script>';
				exit;
}
else
echo"<script>alert('Incorrect Username and password');</script>";
}
?>
</head>
<body>
<div class='img'> </div>
	<div class="cont_select_center"><h2>Admin Login</h2>
	<form Method="POST" >
<input type="text" name="uname" placeholder="Username..." required><br>
<input type="password" name="psw" placeholder="password..." required><br>
<input type="submit" name="submit" value="submit"><br><br>
<a href = "home.php">back</a>
</form>
</div>
</body>
</html>