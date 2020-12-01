<!DOCTYPE html>
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

</head>
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
                //$flag = 0;
                $name=$_POST['n1'];
                $field=$_POST['n2'];
                $Value=$_POST['n3'];
                $filter = ["Name"=>$name];
                $update = ['$set'=>[$field => $Value]];
                $bulkWrite->update($filter,$update);
                 $mng -> executeBulkWrite('kiran.results',$bulkWrite);
                
                 if($mng)
                 {
                   echo "<script>alert('Updated')</script>";  
                 }
                  else
                 {
                    echo "<script>alert('Failed to Update')</script>"; 
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
    <div>
    <fieldset>
<legend><h3>Update Documents</h3></legend>

         <label for="fname"><b>ENTER STUDENT NAME FOR UPDATION:<font color ="red">*</font></label>
    <input type="text" id="fname" name="n1" placeholder="Student name.." pattern="[a-zA-Z]+"  required>

    <label for="fname"><b>ENTER FIELD TO BE UPDATED:<font color ="red">*</font></label>
     <input type="text" name="n2" placeholder="enter the field..." pattern="[a-zA-Z_@/.?]+" required><br><br>

      <label for="fname"><b>ENTER VALUE TO BE UPDATED:<font color ="red">*</font></label>
      <input type="text" name="n3" placeholder="enter the value to be update" pattern="[a-zA-Z0-9 ?/_]+" required><br><br>

        <input type="submit" name="submit" value="UPDATE" >
        </fieldset>
        <a href="home.php" target="_blank">Home</a>
</form>
</center>
</body>
</html>