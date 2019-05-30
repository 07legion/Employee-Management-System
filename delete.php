<?php
if(!isset($_GET['q']) || $_GET['q']==''){
	header("location: https://httpstat.us/404");
}else{

	include 'connection.php';
	 $i=$_GET['q'];
	 $sql="SELECT * FROM employee WHERE eid=$i";
	 echo $sql;
	 $r=mysqli_query($conn,$sql);
	 $count=mysqli_num_rows($r);
	 if((int)$count>0)
	 {
		 $sql="DELETE FROM employee WHERE EID=$i";
		 if(!mysqli_query($conn,$sql)){
		 	header("location: https://httpstat.us/404");
		 }else{
		 	header("location: list");
		}
	 }

}
?> 