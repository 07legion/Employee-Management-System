<?php
include 'connection.php';
 if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['gender']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['addressLine1']) && isset($_GET['city']) && isset($_GET['landmark']) && isset($_GET['dob']) && isset($_GET['country']) && isset($_GET['state']) && isset($_GET['eid']) && isset($_GET['pinCode'])){
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$country=$_GET['country'];
	$landmark=$_GET['landmark'];
	$state=$_GET['state'];
	$eid=$_GET['eid'];
	$dob=$_GET['dob'];
	$phone=$_GET['phone'];
	$email=$_GET['email'];
	$gender=$_GET['gender'];
	$city=$_GET['city'];
	$addressLine1=$_GET['addressLine1'];
	$pinCode=$_GET['pinCode'];

	$sql="UPDATE employee SET FNAME='$fname',LNAME='$lname',GENDER='$gender',DOB='$dob',EMAIL='$email',PHONE_NUMBER=$phone,ADDRESSLINE1='$addressLine1',LANDMARK='$landmark',PIN_CODE=$pinCode,CITY='$city',STATE='$state',COUNTRY='$country' WHERE EID=$eid";
	echo $sql;		
	if(mysqli_query($conn,$sql)){
		header("location: edit?q=$eid");
	}else{
		header("location: https://httpstat.us/500");
	}	
}else{
 	echo 'else';
}
?>