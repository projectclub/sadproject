<?php
/*	session_start();
	if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$student_id=$_SESSION["usr_id"];
*/
	include 'connection.php';
?>		
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>AMS</title>
    	<meta charset="UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<link rel="stylesheet" href="../w3/w3css/4/w3.css">
      	<link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
      	<link rel='stylesheet' href='../css/opensan.css'>
      	<link rel='stylesheet' href='../css/font-awesome.min.css'>
      	<style>
        	html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
      	</style>
      	<style>
			.chip {
			    display: inline-block;
			    padding: 0 25px;
			    height: 50px;
			    font-size: 18px;
			    line-height: 50px;
			    border-radius: 25px;
			    background-color: #f1f1f1;
			}

			.chip img {
			    float: left;
			    margin: 0 10px 0 -25px;
			    height: 50px;
			    width: 50px;
			    border-radius: 50%;
			}

			.closebtn {
			    padding-left: 10px;
			    color: #888;
			    font-weight: bold;
			    float: right;
			    font-size: 20px;
			    cursor: pointer;
			}

			.closebtn:hover {
			    color: #000;
			}
		</style>

		<link rel="stylesheet" href="pg_frame.css">
	</head>

	<body>
		<div id="main-wrapper">
			<!--Nav bar-->
			<?php 
				$account_type="student";
				include 'nav_bar.php'; 
			?>
		    <!--Nav bar end-->
		    <!--main page-->
		    <div id="main-content" class="w3-container  " style="max-width:800px;top:80px;position:relative;">  
			    <div class=" w3-container " style="padding-left: 0;padding-right: 0; z-index: +1; position:relative;">    
		      		<!-- table-->
		      		<div class="w3-pannel w3-theme-d5 w3-card-4 w3-padding-16" style="padding-left: 30px;background-color: white;">
						<h2 class="">Query</h2>			
					</div>
					<br/>
					<div class="w3-card-4 w3-padding" style="background-color: white;">
						<table>
							<thead>
								<tr><th> sdf </th><th>wsdf</th></tr>
								<tr>something</tr>
								<tr>
									<div class="chip">
									  	<img src="../w3/w3images/avatar2.png" alt="Person" width="96" height="96">
									  John Doe
									  	<span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
									</div>
								</tr>
							</thead>
							
							<tbody>
								<tr></tr>
								<tr></tr>
								<tr></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<br/>

			<!--Footer-->
			<?php include 'footer.php';?>
		</div>
	</body>
</html>
<?php 
    mysqli_close($conn);
?>	



