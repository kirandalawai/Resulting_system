<?php
session_start();
if($_SESSION['ulogin']==true)
{
  if(isset($_POST['submit']))
  {
        $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $a=$_POST['n1'];
    
        $filter=['Exam_details.reg_no'=>$a];
        $options=['projection'=>['_id'=>0,'Name'=>1,'Exam_details.reg_no'=>1,'Exam_details.Marks_obtained.logical_reasoning'=>1,'Exam_details.Marks_obtained.comprehension'=>1,'Exam_details.Marks_obtained.basic_numeracy'=>1,'Exam_details.Marks_obtained.general_mental_ability'=>1,'Exam_details.Marks_obtained.data_interpretation'=>1,'Exam_details.Marks_obtained.general_studies'=>1,'Exam_details.Marks_obtained.essay'=>1,'Exam_details.Marks_obtained.optional_sub'=>1,'Exam_details.eligble_for_next_interview'=>1]];

       // ['lawyer_details.lawyer_name'=>1,'lawyer_details.appearing_for'=>1,"judge_details.judge_id"=>1,


        $query=new MongoDB\Driver\Query($filter,$options);
        $row=$mng->executeQuery("kiran.results",$query);
        foreach($row as $rows)
        {
          var_dump($rows);
          echo "<br>";
        }
        if($row)
        {
          echo "<script>alert('founded');</script>";
        }
        else
        {
          echo "<script>alert('result not found');</script>";
        }
  }
}
else
{
    header('location:ulogin.php');
}

?>
<html>
<head>
	<title>Display</title>

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
<body>
    <form action="" method="POST">
             <label for="fname"><b>Enter the Register :<font color ="red">*</font></label>
    <input type="text" id="fname" name="n1" placeholder="Student reg num.." required>

    <input type="submit" name="submit" value="Submit">
    

<a href="agg2.php">Eligible candidates</a><br><br><br><br>
       <a href = "home1.php">Home</a>
    </form>

</body>
</html>