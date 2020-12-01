<html>
<html>
<head>
  <title>Result System</title>
    <style>
input[type=text],input[type=email],input[type=number],input[type=date] select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

    <link rel="stylesheet" type="text/css" href="style.css">
    <?php
    session_start();
    if($_SESSION['alogin']==true)
    {
        $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $query = new MongoDB\Driver\Query([]);
        $bulkWrite = new MongoDB\Driver\BulkWrite();
            if(isset($_POST['submit']))
            {
                $name=$_POST['n1'];
                $field=$_POST['n2'];
                $bulkWrite->delete([$name=>$field],['$limit'=>1]);
                $c = $mng -> executeBulkWrite('kiran.results',$bulkWrite);
                if($c)
                    echo "<script>alert('deleted Successfully')</script>";
                
                else
                {
                    echo "<script>alert('failed to delete')</script>";   
                }
            }
    }
    else
    {

        header('location:adminlogin.php');
    }
    ?>
</head>
<body>
    <center>
<form name="myform" method="POST" action="">
    <fieldset>
<legend><h3>Delete Documents</h3></legend>


              <label for="fname"><b>ENTER THE FIELD FOR DELETION:<font color ="red">*</font></label>
    <input type="text" id="fname" name="n1" placeholder="Field name.." pattern="[a-zA-Z._?/@]+"  required>


    <label for="fname"><b>ENTER VALUE TO BE DELETE:<font color ="red">*</font></label>
         <input type="text" id="fname" name="n2" placeholder="value to be deleted.." pattern="[a-zA-Z0-9]+"  required>




        <input type="submit" name="submit" value="Delete" >
        </fieldset>
        <a href="home.php" target="_blank">Home</a>
</form>
</center>
</body>
</html>