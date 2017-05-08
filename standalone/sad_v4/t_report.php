<?php
/*	session_start();
	if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$student_id=$_SESSION["usr_id"];
*/
	include 'connection.php';
	function load_output(){
		$table="";
		return $table;
	}
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
      <link rel='stylesheet' href='../font-awesome-4.7.0/css/font-awesome.min.css'>
	    <style>
	    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	    </style>		

		<script src="../jquery/jquery-3.2.1.min.js"></script>

			
		<link rel="stylesheet" href="pg_frame.css">
		<style>
			table, th, td {
			    border: none;
			    background-color: rgba(255, 255, 255, .5);
			}
			.info{
				overflow: hidden;
				white-space: nowrap;
				width:250px;
				height: 50px;

				position: absolute;
			
				transform: translate(-10px,-50px);
			}
			th:first-child {
				position: absolute;
				background-color: white !important;
				opacity: 1 !important;
				transform: translate(20px,0px);
				z-index: +1; width:260px;
			}

			.rotate{
				height:150px;
				white-space: nowrap;
			}
			th.rotate >div{
				transform: translate(5px, 110px)
				rotate(270deg);
				width:30px;
			}
			th.rotate > div > span {
			  border-bottom: 1px solid #ccc;
			  padding: 5px 10px;
			}
			/*th.rotate:nth-last-child(2){
				
				position: absolute;
				transform: translate(20px,-50px);
			}*/
			{
				/* Safari */
				-webkit-transform: rotate(-90deg);

				/* Firefox */
				-moz-transform: rotate(-90deg);

				/* IE */
				-ms-transform: rotate(-90deg);

				/* Opera */
				-o-transform: rotate(-90deg);

				/* Internet Explorer */
				filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

				}
			tr:nth-child(even){
				background-color: #f2f2f2;
			}
			tr:nth-child(even) td div.info{
				background-color: #f9f9f9;
			}

			tr:nth-child(odd) td div.info{
				background-color: white;
			}
		</style>
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
		    <div id="main-content" class="w3-container  " style="min-width:700px; width:70%;top:80px;position:relative;">  
			    <div class=" w3-container " style="padding-left: 0;padding-right: 0; z-index: +1; position:relative;">    
		      		<!-- table-->
		      		<div class="w3-pannel w3-theme-d5 w3-card-4 w3-padding-16" style="padding-left: 30px;background-color: white;">
						<h2 class="">Query</h2>			
					</div>
					<br/>
					<div class="w3-card-4 w3-padding" style="background-color: white;">
						<input type="text" style="width:100%">
					</div>
					<br/>
					<div id="output">
					<?php include 'report_query.php';?>

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



