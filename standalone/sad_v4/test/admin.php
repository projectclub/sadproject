<?php
/*	session_start();
	if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$student_id=$_SESSION["usr_id"];
*/
	include '../connection.php';
?>		
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>AMS</title>
    	<meta charset="UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<link rel="stylesheet" href="../../w3/w3css/4/w3.css">
      	<link rel="stylesheet" href="../../css/w3-theme-blue-grey.css">
      	<link rel='stylesheet' href='../../css/opensan.css'>
      	<link rel='stylesheet' href='../../css/font-awesome.min.css'>
		<link rel="stylesheet" href="../pg_frame.css">
      	<style>
        	html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
      	</style>
      	<style>
			body {font-family: "Lato", sans-serif;}

			.tablink {
			    background-color: #555;
			    color: white;
			    float: left;
			    border: none;
			    outline: none;
			    cursor: pointer;
			    padding: 14px 16px;
			    font-size: 17px;
			    width: 25%;
			}

			.tablink:hover {
			    background-color: #777;
			}

			/* Style the tab content */
			.tabcontent {
			    color: white;
			    display: none;
			    padding: 50px;
			    padding-top: 100px;
			    text-align: center;
			}

			#London {background-color:red;}
			#Paris {background-color:green;}
			#Tokyo {background-color:blue;}
			#Oslo {background-color:orange;}
		</style>

	</head>

	<body>
		<div id="main-wrapper">
			<!--Nav bar-->
			<?php 
				$account_type="student";
				include '../nav_bar.php'; 
			?>
		    <!--Nav bar end-->
		    <!--main page-->
		    <div id="main-content" class="w3-container  " style="max-width:800px;top:80px;position:relative;">  
			    <div class=" w3-container " style="padding-left: 0;padding-right: 0; z-index: +1; position:relative;">    
		      		<!-- table-->
		      		<div class="w3-pannel w3-card-4 w3-padding-16 w3-border " style="padding-left: 30px;background-color: white;">
						<h2 class=""></h2>			
					</div>
					<br/>
					<div class="w3-card-4 " style="background-color: white;">
						<button class="tablink" onclick="openCity('London', this, 'red')" id="defaultOpen">London</button>
						<button class="tablink" onclick="openCity('Paris', this, 'green')">Paris</button>
						<button class="tablink" onclick="openCity('Tokyo', this, 'blue')">Tokyo</button>
						<button class="tablink" onclick="openCity('Oslo', this, 'orange')">Oslo</button>
						<div id="London" class="tabcontent">
						  	<h3>London</h3>
						  	<p>London is the capital city of England.</p>
						</div>

						<div id="Paris" class="tabcontent">
						  	<h3>Paris</h3>
						  	<p>Paris is the capital of France.</p> 
						</div>

						<div id="Tokyo" class="tabcontent">
						  	<h3>Tokyo</h3>
						  	<p>Tokyo is the capital of Japan.</p>
						</div>

						<div id="Oslo" class="tabcontent">
						  	<h3>Oslo</h3>
						  	<p>Oslo is the capital of Norway.</p>
						</div>

						

						<script>
							function openCity(cityName,elmnt,color) {
							    var i, tabcontent, tablinks;
							    tabcontent = document.getElementsByClassName("tabcontent");
							    for (i = 0; i < tabcontent.length; i++) {
							        tabcontent[i].style.display = "none";
							    }
							    tablinks = document.getElementsByClassName("tablink");
							    for (i = 0; i < tablinks.length; i++) {
							        tablinks[i].style.backgroundColor = "";
							    }
							    document.getElementById(cityName).style.display = "block";
							    elmnt.style.backgroundColor = color;

							}
							// Get the element with id="defaultOpen" and click on it
							document.getElementById("defaultOpen").click();
						</script>
					</div>
				</div>
			</div>
			<br/>

			<!--Footer-->
			<?php include '../footer.php';?>
		</div>
	</body>
</html>
<?php 
    mysqli_close($conn);
?>	



