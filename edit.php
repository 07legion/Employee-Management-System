<?php

include 'connection.php';

if(isset($_GET['q']) && $_GET['q']!=''){
	$eid=$_GET['q'];
	$sql="SELECT * FROM employee WHERE EID=$eid";
	$result=mysqli_query($conn,$sql);
	if(!$result){
		header('location: https://httpstat.us/500');
	}
	if(mysqli_num_rows($result)==0){
		header('location: https://httpstat.us/500');	
	}
	$row=mysqli_fetch_assoc($result);
	$fname=$row['FNAME'];
	$lname=$row['LNAME'];
	$fnameOld=$row['FNAME'];
	$lnameOld=$row['LNAME'];
	$gender=$row['GENDER'];
	$dob=$row['DOB'];
	$phone=$row['PHONE_NUMBER'];
	$email=$row['EMAIL'];
	$state=$row['STATE'];
	$country=$row['COUNTRY'];
	$pinCode=$row['PIN_CODE'];
	$city=$row['CITY'];
	$addressLine1=$row['ADDRESSLINE1'];
	$landmark=$row['LANDMARK'];
	$maxdate=date('Y-m-d', strtotime('-18 years'));
	$mindate=date('Y-m-d', strtotime('-100 years'));
}else{
	header("location: https://httpstat.us/404");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?=$fname.' '.$lname?> @ JB</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<style type="text/css">
	<style>
		* {
		   font-family: Raleway;
		  box-sizing: border-box;
		}

		a.head{
			font-family: 'Pacifico', cursive;
			font-size: 30px;
		}

		#regForm {
		  padding: 40px;
		  width: 70%;
		  min-width: 300px;
		}

		input {
		  padding: 5px;
		  font-size: 16px;
		  font-family: Raleway;
		  border: 1px solid #cccccc;
		  border-radius: 5px;
		  width: 100%;
		}

		/*Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		}

		/* Hide all steps by default: */
		.tab {
		  display: none;
		}

		button:hover {
		  opacity: 0.8;
		}

		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none;  
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		.step.active {
		  opacity: 1;
		}

		.require{
			color: red !important;
			font-size: 29px;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #4CAF50;
		}

	</style>
	<meta charset="utf-8">
</head>
<body>

<div class="container-fluid mb-5 p-0">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark m-0">
  <a class="navbar-brand head" style="color: #2268FF" href="">John Brothers</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Sales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list.php">Employee <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text" style="font-size: 20px;font-weight: bold;">
      <?='Employee ID: '.$_GET['q']?>
    </span>
  </div>
</nav>
<div class="m-4 visible-none">-<br>-</div>
<form class="form-wrapper" method="post">
<div class="container-fluid mt-4 mb-3">
<div class="card shadow mb-1 mt-1">
            <div class="card-header py-1">
              <h3 class="m-0 font-weight-bold text-primary float-left"><?=$fname.' '.$lname.'\'s Record'?></h3>
              <a title="Cancel & Exit " class="btn btn-danger float-right" href="./view?q=<?=$_GET['q']?>" style="color: white;"><i class="fas fa-times-circle"></i> Cancel & Exit</a>
              <button class="mr-2 btn btn-success float-right" name="save" title="Save <?=$fname.' '.$lname?>" type="submit"><i class="fas fa-check-circle"></i> Save </button>
            </div>
            <div class="card-body py-1">
            <div class="container-fluid py-1 my-0 rounded" style="padding: 0 1px">
            	<fieldset>
            		<lagend class="h5">Personal Information</lagend>
            		<div class="row">
            			<div class="col-md-6">
		            		<div class="form-group">
		            			<label>Name:<span class="require">*</span></label>
							  	<div class="row">
								    <div class="col-md-6">
								    	<input oninput="this.className = ''" value="<?=$fname?>" title="First-Name can contian alphabets only." alt="First-Name can contian alphabets only." pattern="^[A-Za-z]+$" placeholder="First name..." required type="text" class="form-control" name="fName">
								    </div>
								    <div class="col-md-6">
								    	<input oninput="this.className = ''" value="<?=$lname?>" title="Last-Name can contian alphabets only." pattern="^[A-Za-z]+$" placeholder="Last name..." required type="text" class="form-control" name="lName">
								    </div>
							  	</div>		
		            		</div>	
            			</div>
            			<div class="col-md-3">
				    		<label>Gender:<span class="require">*</span></label>
						    <div class="row">
						    <div class="custom-control col-md-3 ml-5 custom-radio">
							    <input <?php if($gender=='MALE'){echo 'checked';}?> type="radio" class="custom-control-input" value="MALE" id="customMale" name="gender" required>
							    <label class="custom-control-label" for="customMale">Male</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input <?php if($gender=='FEMALE'){echo 'checked';}?> type="radio" class="custom-control-input" value="FEMALE" id="customFemale" name="gender" required>
							    <label class="custom-control-label" for="customFemale">Female</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input type="radio" <?php if($gender=='OTHERS'){echo 'checked';}?> class="custom-control-input" value="OTHERS" id="customOthers" name="gender" required>
							    <label class="custom-control-label" for="customOthers">Others</label>
							</div>
							</div>		
				    	</div>
				    	<div class="col-md-3">
							<div class="form-group">
								<label>Date of Birth:<span class="require">*</span></label>
								<input value="<?=$dob?>" type="date" required max="<?=$maxdate?>" min="<?=$mindate?>" class="form-control" name="dob">
							</div>
				    	</div>
            		</div>
            	</fieldset>
            	<fieldset>
            		<lagend class="h5">Contact Information</lagend>
            		<div class="row">
            			<div class="col-md-6">
            				<div class="form-group pt-1">
								<label class="mt-3">Mobile:</label>
								<input oninput="this.className = ''" title="Mobile Number must be 10 digits numeric only." value="<?=$phone?>" type="text" placeholder="Enter mobile number..." pattern="^[\d]{10}$" class="form-control" name="phone_number">
							</div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
							  	<label>Email:<span class="require">*</span></label>
							  	<input oninput="this.className = ''" title="Enter a valid email address." value="<?=$email?>" required placeholder="you@email.com" required type="email" class="form-control" name="email">
						    </div>	
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
								<label>Address Line-1:<span class="require">*</span></label>
								<input oninput="this.className = ''" title="Enter proper Address Line-1." value="<?=$addressLine1?>" required type="text" class="form-control" placeholder="addressLine1" name="addressLine1">
							</div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
							  	<label for="city">City<span class="require">*</span></label>
							  	<select id="city" class="custom-select" name="city" required>
							  		<option value="">--- Select City ---</option>
							  		<option value="Ahemdabad" <?php if($city=='Ahemdabad'){echo 'selected';}?>>Ahemdabad</option>
							  		<option value="Surat" <?php if($city=='Surat'){echo 'selected';}?>>Surat</option>
							  		<option value="Rajkot" <?php if($city=='Rajkot'){echo 'selected';}?>>Rajkot</option>
							  		<option value="Junagadh" <?php if($city=='Junagadh'){echo 'selected';}?>>Junagadh</option>
							  		<option value="Vadodara" <?php if($city=='Vadodara'){echo 'selected';}?>>Vadodara</option>
							  		<option value="New York" <?php if($city=='New York'){echo 'selected';}?>>New York</option>
							  		<option value="London" <?php if($city=='London'){echo 'selected';}?>>London</option>
							  	</select>
						    </div>
            			</div>
            			<div class="col-md-6">
							<div class="form-group">
							  	<label>Landmark:<span class="require">*</span></label>
							  	<textarea required placeholder="Enter Landmark..." title="Enter proper Landmark." type="textarea" class="form-control" name="landmark"><?=$landmark?></textarea>
						    </div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
							  	<label for="state">State<span class="require">*</span></label>
							  	<select id="state" class="custom-select" name="state" required>
							  		<option value="">--- Select State ---</option>
							  		<option value="Gujarat" <?php if($state=='Gujarat'){echo 'selected';}?>>Gujarat</option>
							  		<option value="Delhi" <?php if($state=='Delhi'){echo 'selected';}?>>Delhi</option>
							  	</select>
						    </div>
            			</div>
            			<div class="col-md-6">
						    <div class="form-group">
								<label>Zip / Postal Code<span class="require">*</span></label>
								<input title="Please enter proper Zip / Pin Code, must be 6digits numeric only." oninput="this.className = ''" value="<?=$pinCode?>" required required type="text" class="form-control" pattern="^[\d]{6}$" placeholder="Enter Zip / Postal code..." name="pinCode">
							</div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
								<label for="country">Country<span class="require">*</span></label>
								<select id="country" class="custom-select" name="country" required>
							  		<option value="">--- Select Country ---</option>
							  		<option value="India" <?php if($country=='India'){echo 'selected';}?>>India</option>
							  		<option value="United States of America" <?php if($country=='United States of America'){echo 'selected';}?>>United States of America</option>
							  		<option value="United Kingdom" <?php if($country=='United Kingdom'){echo 'selected';}?>>United Kingdom</option>
							  	</select>
							</div>
            			</div>
            		</div>
            	</fieldset>
            </div>	
        </div>
</div>
</div>
</form>
</div>
<footer class="bg-light pr-3 fixed-bottom text-right text-secondary font-weight-bold">
	&copy 2019: John Brothers
</footer>
	<?php
		if(isset($_POST['save'])){	
			$fname=ucfirst($_POST['fName']);
			$lname=ucfirst($_POST['lName']);
			$gender=$_POST['gender'];
			$dob=$_POST['dob'];
			$falg=false;
			$phone=null;
			if(isset($_POST['phone_number'])){
				$phone=$_POST['phone_number'];
			}
			$email=$_POST['email'];
			$state=$_POST['state'];
			$country=$_POST['country'];
			$pinCode=$_POST['pinCode'];
			$city=$_POST['city'];
			$addressLine1=ucfirst($_POST['addressLine1']);
			$landmark=ucfirst(strtolower($_POST['landmark']));
			$email=strtolower($email);
			$eid=$_GET['q'];
			$sql="UPDATE employee SET FNAME='$fname',LNAME='$lname',GENDER='$gender',DOB='$dob',EMAIL='$email',PHONE_NUMBER=$phone,ADDRESSLINE1='$addressLine1',LANDMARK='$landmark',PIN_CODE=$pinCode,CITY='$city',STATE='$state',COUNTRY='$country' WHERE EID=$eid";		
			if(mysqli_query($conn,$sql)){
				echo '<script>alert("Employee\'s record of  *** '.$fnameOld.' '.$lnameOld.' *** updated successfully.")</script>';
			}else{
				echo '<script>alert("Employee\'s record is not updated due to some error.")</script>';
			}	
	}
	?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
