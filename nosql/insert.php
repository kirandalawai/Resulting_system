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


<?php
session_start();
if($_SESSION['alogin']==true)
{
      if(isset($_POST['submit']))
      {
        $name=$_POST['n1'];
        $street=$_POST['n2'];
        $area=$_POST['n3'];
        $h_no=$_POST['n4'];
        $zip=$_POST['n5'];
        $city=$_POST['n6'];
        $dist=$_POST['n7'];
        $state=$_POST['n8'];
        $qual=$_POST['n9'];
        $dob=$_POST['n10'];
        $rank=$_POST['n11'];
        $regno=$_POST['n12'];
        $attem=$_POST['n13'];
        $l_reas=$_POST['n14'];
        $compre=$_POST['n15'];
        $basic=$_POST['n16'];
        $gen=$_POST['n17'];
        $data=$_POST['n18'];
        $gen1=$_POST['n19'];
        $essay=$_POST['n20'];
        $opt=$_POST['n21'];
        $edate=$_POST['n22'];
        $ecenter=$_POST['n23'];
        $eleg=$_POST['n24'];

         $mng =new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulkWrite=new MongoDB\Driver\BulkWrite;
        $doc = ["Name"=>"$name","address"=>array("streer"=>"$street","area"=>"$area","house_no"=>"$h_no","zip"=>"$zip","city"=>"$city","district"=>"$dist","state"=>"$state"),
          "qualification"=>"$qual","DOB"=>"$dob","ranking"=>"$rank",
          "Exam_details"=>array("reg_no"=>"$regno","no_of_attempts"=>"$attem","Marks_obtained"=>array("logical_reasoning"=>"$l_reas",
          "comprehension"=>"$compre","basic_numeracy"=>"$basic","general_mental_ability"=>"$gen","data_interpretation"=>"$data",
            "general_studies"=>"$gen1","essay"=>"$essay","optional_sub"=>"$opt"),"exam_date"=>"$edate",
          "exam_center"=>"$ecenter","eligble_for_next_interview"=>"$eleg")];

         $bulkWrite->insert($doc);

          $mng->executeBulkwrite('kiran.results',$bulkWrite);

        if($mng)
        {
          echo "<script>alert('Successfully Inserted')</script>";
        }
        else
        {
          echo "<script>alert('Something wrong')</script>";
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
<div>
  <form action="" method = "POST">
    <center><h2>Insert the necessary details</h2></center>
    <label for="fname"><b>Student Name<font color ="red">*</font></label>
    <input type="text" id="fname" name="n1" placeholder="Student name.." required>

    <label for="fname">Address<font color ="red">*</font></label>
    	
	<input type="text" id="fname" name="n2" placeholder="street.." required>
	<input type="text" id="fname" name="n3" placeholder="area.." required>
	<input type="text" id="fname" name="n4" placeholder="house num.." required>
	<input type="text" id="fname" name="n5" placeholder="zip/pin.." required>
  <input type="text" id="fname" name="n6" placeholder="city.." required>
      <input type="text" id="fname" name="n7" placeholder="district.." required>
  <input type="text" id="fname" name="n8" placeholder="state.." required>
	

    <label for="fname">Qualification<font color ="red">*</font></label>
    <input type="text" id="fname" name="n9" placeholder="qualification.." required>

    <label for="fname">DOB<font color ="red">*</font></label>
    <input type="date" id="fname" name="n10" placeholder="DOB" required><br><br>

    <label for="fname">Ranking<font color ="red">*</font></label>
    <input type="text" id="fname" name="n11" placeholder="ranking..">
	

<label for="fname">Exam details<font color ="red">*</font></label>
    <input type="text" id="fname" name="n12" placeholder="reg num..">
 <input type="text" id="fname" name="n13" placeholder="no of attempts..">
<label for="fname">Marks obtained<font color ="red">*</font></label>
 <input type="number" id="fname" name="n14" placeholder="logical_reasoning..">
<input type="number" id="fname" name="n15" placeholder="comprehension..">
<input type="number" id="fname" name="n16" placeholder="basic_numeracy..">
<input type="number" id="fname" name="n17" placeholder="general_mental_ability..">
<input type="number" id="fname" name="n18" placeholder="data_interpretation..">
<input type="number" id="fname" name="n19" placeholder="general_studies..">
<input type="number" id="fname" name="n20" placeholder="essay..">
<input type="number" id="fname" name="n21" placeholder="optional_sub..">

<label for="fname">Exam date<font color ="red">*</font></label>
    <input type="date" id="fname" name="n22" placeholder="exam date.."><br><br>

<label for="fname">Exam Center<font color ="red">*</font></label>
    <input type="text" id="fname" name="n23" placeholder="exam center..">

<label for="fname">Elegble for next steps<font color ="red">*</font></label>
    <input type="radio" id="fname" value="yes" name="n24">yes
    <input type="radio" id="fname" value="no" name="n24">no

       <input type="submit" name="submit" value="Submit">
       <a href = "home.php">Home</a>
       

    </form>
</body>
</html>