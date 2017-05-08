<?php
	session_start();
		if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$teacher_id=$_SESSION["usr_id"];
	$course_id=$_GET['course_id']; 
	$course_name=$_GET['course_name'];  
	$course_year=$_GET['course_year']; 
	$sem=$_GET['sem'];
	#include ("thome_top.php");
	include 'connection.php';
  	require_once 'student_list_make.php';

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
			$account_type="teacher";
			include 'nav_bar.php';
		?>
	    <!--Nav bar end-->
	    	    <!--main page-->
	    <div id="main-content" class="w3-container  " style="min-width:700px; width:70%;top:80px;position:relative;">    
			<div class="w3-panel  w3-theme-d2 w3-card-4" style="z-index: +1; position:relative;background-color: white;">
				<h3>Class :
				<?php echo $course_id ." ".$course_name ." ". $course_year ." sem: ".$sem;	?>	
				</h3>
				<br/>
			</div>	

			<div class="w3-card-4 w3-padding w3-border" style="z-index: +1; position:relative;background-color: white;"">
				
				<div style="overflow-x:auto;">
				<?php
						list($student_list,$class_days)=create_list();
						//print_r($student_list);	

				?>
				<table class="w3-table " >
						<thead>
							<tr >
								<th class="rotate" ><div ><span >Info</span></div></th>
								<?php
										///Attendence
										foreach ($class_days as $value) {
											# code...
											echo "<th class='rotate date'><div><span>".$value[0]."-".$value[1]."</span></div></th>";
										}

								?>
								<th class="rotate"><div><span>classes Attended</span></div></th>
								<th class="rotate"><div><span>Percentage</span></div></td>
							</tr>					
						</thead>
					<tbody ><tr><td>&nbsp</td></tr><?php
							foreach ($student_list as $roll => $value) {
								# code...
								
								?>
							
							<tr>  <!-- style="width:100%; text-align: left;"> -->
								<td>
									<div style="width: 300px;height: 50px"></div>
									<div class="info" >
									<img src="../w3/w3images/avatar<?php echo ($value[2]=='Male')? 2:6; ?>.png" class="w3-left w3-circle w3-margin-right" style="width:50px"> 
								    	<span id='roll'><?php echo $roll ;?></span>
								    	<br/>
							    		<span id='first_name'><?php echo $value[0]?></span> 
							    		<span id='last_name'><?php echo $value[1]?></span> 
			    					</div>
								</td>
								<?php
								///Attendence
								foreach ($class_days as $Pval) {
									# code...
									$att_val="Absent";
									foreach ($value[3] as $Periodc) {
										# code...
										if($Periodc[0]==$Pval[0]&&$Periodc[1]==$Pval[1])
											$att_val=$Periodc[2];
									}
									if($att_val=="Present")	
										echo "<td class='w3-text-green'> P</td>";
									else
										echo "<td class='w3-text-red' >A</td>";
								}

								?>
								<td>
									<?php
										echo $value[4]."/".$value[5];
									?>
								</td>
								<td>
									<?php
									echo number_format((float)$value[6],2,".","")."%";
									?>
								</td>
							</tr>
								<?php
							}
								?>
					
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