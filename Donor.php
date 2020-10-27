<html>
<head>
<title>Donor</title>
</head>

<body>

<?php 
// database connection code // 
//get the post records 
$Plasma_ID=$_POST["Plasma_ID"];
$Name=$_POST["Name"];
$Address=$_POST["Address"];
$ContactNumber=$_POST["ContactNumber"];
$Gender=$_POST["Gender"];
$Age=$_POST["Age"];
$BloodGroup=$_POST["BloodGroup"];
$Weight=$_POST["Weight"];
$Height=$_POST["Height"];
$Allergies=$_POST["Allergies"];
$Test_Type=$_POST["Test_Type"];
$Test_Result=$_POST["Test_Result"];
$Current_Medications=$_POST["Current_Medications"];
$COVID19Certificate=$_POST["COVID19Certificate"];
$Previous_Ailments=$_POST["Previous_Ailments"];

$cn=mysqli_connect("localhost","root","","covid-19updates");
	if(!$cn)
	{
		echo "unable to conenct";
		die();
	  	
	}
	
	$q1="insert into plasmadonor values('$Plasma_ID','$Name', '$Address', '$ContactNumber','$Gender', '$Age', '$BloodGroup', '$Weight', '$Height', '$Allergies', '$Test_Type', '$Test_Result', '$Current_Medications', '$COVID19Certificate', '$Previous_Ailments')";
	//echo 'q2';
	 //die();

	$n1=mysqli_query($cn,$q1);
	$msg="Error:can not save data";

	if($n1==1)
	{
		$msg="form submitted";
	}
	else
	{
		$msg="Not submitted";
	}
 		?>
     <h2> <?php echo $msg;?></h2>
     <h3><a href="Donor1.html">cont.....</a></h3>
	
</body>
</html>
