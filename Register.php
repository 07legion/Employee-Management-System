<?php

include 'connection.php';
$maxdate=date('Y-m-d', strtotime('-18 years'));
$mindate=date('Y-m-d', strtotime('-100 years'));

if(isset($_POST['submit'])){
	$fname=ucfirst($_POST['fName']);
	$lname=ucfirst($_POST['lName']);
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];

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
	
	$sql="INSERT into employee value (null,'$fname','$lname','$gender','$dob','$email',$phone,'$addressLine1','$landmark',$pinCode,'$city','$state','$country')";	
	if(mysqli_query($conn,$sql)){
	 	echo '<script>alert("New employee record of  *** '.$fname.' '.$lname.' *** inserted")</script>';
	}else{
	 	echo '<script>alert("Employee record could not be inserted due to some error.")</script>';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Employee @ JB</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<style type="text/css">
	a.head{
		font-family: 'Pacifico', cursive;
		font-size: 30px;
	}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
   font-family: Raleway;
  box-sizing: border-box;
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
</head>
<body>

<div class="container-fluid p-0">
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
      <i class="far fa-address-card"></i> ADD EMPLOYEE
    </span>
  </div>
</nav>
<div class="m-4 visible-none">-<br>-</div>
<div class="container-fluid mt-4 mb-3">
<div class="card shadow mb-1 mt-1">
            <div class="card-header py-1">
              <h3 class="m-0 font-weight-bold text-primary float-left">Add New Employee</h3>
            </div>
            <div class="card-body py-1">
            <div class="container-fluid py-1 my-0 rounded" style="padding: 0 1px">
            	<form id="regForm" method="POST" class="bg-light mx-auto rounded form-wrapper my-0 px-5">
				  <h1 class="h4 mx-auto text-center bold">Fill out the below information</h1>
				  <!-- One "tab" for each step in the form: -->
				  <div class="tab"><span class="h5">Personal Information:</span><br><br>
				  	<div class="form-group">
					  	<label>Name:<span class="require">*</span></label>
					  	<div class="row">
						    <div class="col-md-6">
						    	<input oninput="this.className = ''" placeholder="First name..." title="First-Name can contian alphabets only." required type="text" class="form-control" name="fName" pattern="^[A-Za-z]+$">
						    </div>
						    <div class="col-md-6">
						    	<input oninput="this.className = ''" placeholder="Last name..." pattern="^[A-Za-z]+$" title="Last-Name can contian alphabets only." required type="text" class="form-control" name="lName">
						    </div>
					  	</div>
				    </div>
				    <div class="row">
				    	<div class="col-md-6">
				    		<label>Gender:<span class="require">*</span></label>
						    <div class="row">
						    <div class="custom-control col-md-3 ml-5 custom-radio">
							    <input type="radio" class="custom-control-input" value="MALE" id="customMale" name="gender" required checked>
							    <label class="custom-control-label" for="customMale">Male</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input type="radio" class="custom-control-input" value="FEMALE" id="customFemale" name="gender" required>
							    <label class="custom-control-label" for="customFemale">Female</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input type="radio" class="custom-control-input" value="OTHERS" id="customOthers" name="gender" required>
							    <label class="custom-control-label" for="customOthers">Others</label>
							</div>
							</div>		
				    	</div>
				    	<div class="col-md-6">
							<div class="form-group">
								<label>Date of Birth:<span class="require">*</span></label>
								<input oninput="this.className = ''" max="<?=$maxdate?>" min="<?=$mindate?>" type="date" required class="form-control" name="dob">
							</div>
				    	</div>
				    </div>
				  </div>
				  <div class="tab"><span class="h5">Contact Information:</span><br><br>
					<div class="form-group">
						<label>Mobile:</label>
						<input oninput="this.className = ''" type="text" title="Mobile Number must be 10 digits numeric only." placeholder="Enter mobile number..." pattern="^[\d]{10}$" class="form-control" name="phone_number">
					</div>
				  	<div class="form-group">
					  	<label>Email:<span class="require">*</span></label>
					  	<input oninput="this.className = ''" placeholder="you@email.com" title="Enter a valid email address." required type="email" class="form-control" name="email">
				    </div>
					<div class="form-group">
						<label>Address Line-1:<span class="require">*</span></label>
						<input oninput="this.className = ''" type="text" class="form-control" placeholder="addressLine1" title="Enter proper Address Line-1." name="addressLine1">
					</div>
				  	<div class="form-group">
					  	<label>Landmark:<span class="require">*</span></label>
					  	<textarea placeholder="Enter Landmark..." required type="textarea" title="Enter proper Landmark." class="form-control" name="landmark"></textarea>
				    </div>
				    <div class="form-group">
						<label>Zip / Postal Code<span class="require">*</span></label>
						<input oninput="this.className = ''" title="Please enter proper Zip / Pin Code, must be 6digits numeric only." required type="text" class="form-control" pattern="^[\d]{6}$" placeholder="Enter Zip / Postal code..." name="pinCode">
					</div>
				  	<div class="form-group">
					  	<label for="city">City<span class="require">*</span></label>
					  	<select id="city" class="custom-select" name="city" required>
					  		<option value="">--- Select City ---</option>
					  		<option value="Ahemdabad">Ahemdabad</option>
					  		<option value="Surat">Surat</option>
					  		<option value="Rajkot">Rajkot</option>
					  		<option value="Junagadh">Junagadh</option>
					  		<option value="Vadodara">Vadodara</option>
					  		<option value="New York">New York</option>
					  		<option value="London">London</option>
					  	</select>
				    </div>
				  	<div class="form-group">
					  	<label for="state">State<span class="require">*</span></label>
					  	<select id="state" class="custom-select" name="state" required>
					  		<option value="">--- Select State ---</option>
					  		<option value="Gujarat">Gujarat</option>
					  		<option value="Delhi">Delhi</option>
					  	</select>
				    </div>
				    <div class="form-group">
						<label for="country">Country<span class="require">*</span></label>
						<select id="country" class="custom-select" name="country" required>
					  		<option value="">--- Select Country ---</option>
					  		<option value="India">India</option>
					  		<option value="United States of America">United States of America</option>
					  		<option value="United Kingdom">United Kingdom</option>
					  	</select>
					</div>
				    
				  </div>
				  <div style="overflow:auto;">
				  	<div class="float-left">
				  		<button type="reset" title="Reset the Form" class="btn btn-primary"><i class="fas fa-redo"></i> Reset</button>
				  		<a title="Cancel & Exit " class="btn btn-danger" href="./list" style="color: white;"><i class="fas fa-times-circle"></i> Cancel & Exit</a>
				  	</div>
				    <div style="float:right;">
				      <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)"><i class="fas fa-backward"></i> Previous</button>
				      <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next <i class="fas fa-forward"></i></button>
				    </div>
				  </div>
				  <!-- Circles which indicates the steps of the form: -->
				  <div style="text-align:center;margin-top:40px;">
				    <span class="step"></span>
				    <span class="step"></span>
				  </div>
				</form>
            </div>	
        </div>
</div>
</div>
</div>
<footer class="bg-light pr-3 fixed-bottom text-right text-secondary font-weight-bold">
	&copy 2019: John Brothers
</footer>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "<i class='fas fa-check-circle'></i> Submit";
    document.getElementById("nextBtn").setAttribute('type','submit');
    document.getElementById("nextBtn").setAttribute('name','submit');
    document.getElementById("nextBtn").classList.remove("btn-primary");
    document.getElementById("nextBtn").classList.add("btn-success");
  } else {
    document.getElementById("nextBtn").innerHTML = "Next <i class=\"fas fa-forward\"></i>";
    document.getElementById("nextBtn").classList.add("btn-primary");
    document.getElementById("nextBtn").classList.remove("btn-success");
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "" || !y[i].checkValidity()) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>