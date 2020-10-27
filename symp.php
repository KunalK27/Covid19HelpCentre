<html>
<head>
<title>AdminReg</title>
</head>

<body>

<?php // database connection code // 
//get the post records 
$name1=$_POST["name1"];
$address1=$_POST["address1"];
$contactnumber1=$_POST["contactnumber1"];
$checkk=$_POST["checkk"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$fever=$_POST["fever"];
$taste=$_POST["taste"];
$smell=$_POST["smell"];
$tired=$_POST["tired"];
$throat=$_POST["throat"];
$ache=$_POST["ache"];

$cn=mysqli_connect("localhost","root","","symptoms");
	if(!$cn)
	{
		echo "unable to conenct";
		die();
	  	
	}
	$q1="insert into checker values('$name1','$address1','$contactnumber1','$checkk','$age','$gender','$fever','$taste','$smell','$tired','$throat','$ache')";
	// echo "$q2";
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
     <h3><a href="AccountReg.php">cont.....</a></h3>
	
</body>
</html>