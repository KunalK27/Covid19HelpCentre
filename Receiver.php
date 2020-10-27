<html>
<head>
<title>Patient In Need of Plasma</title>
</head>

<body>

<?php 
// database connection code // 
//get the post records 
$PatID=$_POST["PatID"];
$Name=$_POST["Name"];
$Address=$_POST["Address"];
$ContactNumber=$_POST["ContactNumber"];
$Gender=$_POST["Gender"];
$CStatus=$_POST["CStatus"];
$PlasmaNeed=$_POST["PlasmaNeed"];
$Age=$_POST["Age"];
$BloodGroup=$_POST["BloodGroup"];
$Weight=$_POST["Weight"];
$Height=$_POST["Height"];
$Allergies=$_POST["Allergies"];
$Test_Type=$_POST["Test_Type"];
$Test_Result=$_POST["Test_Result"];
$Current_Medications=$_POST["Current_Medications"];
$GovtId=$_POST["GovtId"];

$cn=mysqli_connect("localhost","root","","covid-19updates");
	if(!$cn)
	{
		echo "unable to conenct";
		die();
	  	
	}
	
	$q1="insert into plasmadonor values('$PatID','$Name', '$Address', '$ContactNumber','$Gender', '$CStatus', '$PlasmaNeed', '$Age', '$BloodGroup', '$Weight', '$Height', '$Allergies', '$Test_Type', '$Test_Result', '$Current_Medications', '$GovtId')";
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
     <h3><a href="Receiver1.html">cont.....</a></h3>
	
</body>
</html>
