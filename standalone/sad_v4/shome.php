<?php
	session_start();
	if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$student_id=$_SESSION["usr_id"];
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
	<link  rel="stylesheet" href="scrollable_table.css">
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
		      		<div class="w3-card-4 w3-padding-64 w3-border " style="padding-left: 30px;background-color: white;">
						<h2 class="w3-jumbo">Student</h2>			
					</div><br/>
					<div class="w3-card-4 w3-padding" style="background-color: white;">
					<style type="text/css">
						tbody tr:last-child{
							border-bottom: none;
						} 
						tbody tr{
							border-bottom: 1px solid #ddd;
						    border-bottom-width: 1px;
						    border-bottom-style: solid;
						    border-bottom-color: rgb(221, 221, 221);
						}
					</style>
						<table class="w3-table">
						<thead>
							<tr  style="width:100%; text-align: left;">
								<th>Course</th>
								<th>Attendence</th>
								<th>summery</th>
							</tr>
						</thead>
						<tbody >
								<?php
									$query="SELECT `sem`,`department` FROM `student` WHERE roll=".$student_id.";";
									$result=mysqli_fetch_row(mysqli_query($conn,$query));
									$sem=$result[0];
									$department=$result[1];
									$course_list = array();
									$get_courses_query="SELECT `id`,`name` FROM `course` WHERE `sem`=".$sem." AND `department`='".$department."' ;";
									$get_course_attendance_query="SELECT `date`,`periodcode`, `attendence` FROM `attendence_table` WHERE `roll`=".$student_id." AND `sem`=".$sem." AND `course_id`=";
									function count_P($list){
										$i=intval(0);
										foreach ($list as $value) {
											# code...
											if($value[2]=="Present")
												$i++;
										}
										return $i;
									}

									$rows=mysqli_fetch_all(mysqli_query($conn,$get_courses_query));
									foreach ($rows as $key => $value) {
										# code...
										$presenty_list=mysqli_fetch_all(mysqli_query($conn,$get_course_attendance_query.$value[0].";"));
										$rows[$key][2]=$presenty_list;							
									}
							foreach ($rows as $value) {
								# code...
								
								?>
							<tr  style="width:100%; text-align: left;">
								<th><?php echo $value[1]?></th>
								<th >
									<div style="width:400px;">
										<div class="scrolllist">
											<?php
											foreach ($value[2] as $pres_val) {
												# code...
												if($pres_val[2]=="Present")
													echo "<a ><span class='w3-green info'>".$pres_val[0]." ".$pres_val[1]."</span>".
												"<span class='w3-green'>P</span></a>";
												else
													echo "<a ><span class='w3-red info'>".$pres_val[0]." ".$pres_val[1]."</span>".
												"<span class='w3-red'>A</span></a>";
											}
											?>
										</div>
									</div>
								</th>
								<th>
									<?php
										$total=count($value[2]);
										$P_total=count_P($value[2]);
										echo "<span>".$P_total."/".$total."</span><span>&nbsp&nbsp";
										echo (($total>0)?($P_total*100/$total):0);
										echo "%</span>";
									?>
								</th>
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
<?php 
    mysqli_close($conn);
?>	



