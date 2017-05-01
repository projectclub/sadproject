<?php
	$student_id=$_GET['usr_id'];

	#include ("thome_top.php");
	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		die();
  	}
  	$query ="SELECT `first_name`,`last_name` FROM `student` WHERE roll='$student_id';";
  	$result = mysqli_query($conn, $query);
  	$name=mysqli_fetch_row($result);
		function get_gender($roll){
			$str="SELECT gender  FROM `student` WHERE 
			roll=".$GLOBALS['student_id'].";";
			$val= mysqli_fetch_row(mysqli_query($GLOBALS['conn'], $str))[0];
			return $val;
		}
?>		
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>AMS</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
      </style>
		<style>
			footer {
		        height: 50px;
				width: 100%;
				left: 0;
		        right: 0;
				bottom: 0;
				text-align: center;
			    position: absolute;
			}
		    #main-wrapper{
		    	top:100px;
		        min-height: 100%;
			    padding: 0 0 100px;
			    position: relative;
		    }
		</style>
	</head>

	<body>
		<!--Nav bar-->
		    <div class="w3-top w3-card-4" style="height:200px; ">
		       	<div class="w3-bar w3-theme-d2 w3-left-align w3-large" style="height:100%; z-index: -1; position:relative;overflow:visible;">
			       	<a class=" w3-bar-item w3-left  w3-theme-d2" >
					  <b class="w3-opacity" style="font-size: 50px;">Attendance Management System</b>
					</a>
			        <br/><br/>
			        <div class="w3-dropdown-hover w3-bar-item w3-right" >
					    <a href="http://localhost/sad-proj/sad_v4/login.html" class=" w3-btn w3-hide-small w3-padding-large w3-hover-white" title="My Account">
				        <?php echo $name[0]." ".$name[1];?>&nbsp&nbsp
					        <img src="http://localhost/w3/w3images/avatar<?php echo get_gender($student_id)=="Male"? 2:5; ?>.png" class="w3-circle" style="height:80px;width:80px" alt="Avatar">
					    </a>
					    <div class="w3-dropdown-content w3-bar-block w3-card-4 "  >
					    	<a href="http://localhost/sad-proj/sad_v4/login.html"  class="w3-bar-item w3-button">Home</a>
					      <a href="http://localhost/sad-proj/sad_v4/login.html" class="w3-bar-item w3-button">Log out</a>
					    </div>
					</div>
			        
		       	</div>
		    </div>
	    <!--Nav bar end-->
	    <!--main page-->
	    <div class="w3-container  " style="max-width:800px;margin-top:80px; ">  
		    <div class="w3-container " style="padding-left: 0;padding-right: 0; z-index: +1; position:relative;background-color: white;">    
	      <!-- The Grid -->
	      		 <div class="w3-card-4 w3-padding-64 w3-border " style="padding-left: 30px;">
					<h2 class="w3-jumbo">Student</h2>
				</div>
			
			</div>
		</div>
		<br/>
		<footer class="w3-container w3-theme-d5 ">
			<p>
				<a>by shivam</a>
			</p>
		</footer>
	</body>
</html>
<?php 
    mysqli_free_result($result);
    mysqli_close($conn);
?>	



