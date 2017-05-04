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

		<script src="../jquery/jquery-3.2.1.min.js"></script>
		<style>
			table {
			    border-collapse: collapse;
			    border-spacing: 0;
			    width: 100%;
			    border: 1px solid #ddd;
			}

			th, td {
			    border: none;
			    text-align: left;
			    padding: 8px;
			    width: 50px;
			}
			tbody tr{
				height: 60px !important;

			}
			thead{
				line-height: 150px;
				min-height: 150px

			}
			thead tr {
				white-space: nowrap;
			  overflow: hidden;


			}
			th {

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


			tr:nth-child(even){background-color: #f2f2f2}
			</style>
			
		<link rel="stylesheet" href="pg_frame.css">

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
	    <div id="main-content" class="w3-container  " style="max-width:800px;top:80px;position:relative;">    
			<div class="w3-panel  w3-theme-d2 w3-card-4" style="z-index: +1; position:relative;background-color: white;">
				<h3>Class :
				<?php echo $course_id ." ".$course_name ." ". $course_year ." sem: ".$sem;	?>	
				</h3>
				<br/>
			</div>	

			<div class="w3-card-4 w3-padding w3-border" style="z-index: +1; position:relative;background-color: white;"">
				<br/>
				<a>Student List</a>
				<br/>
				<br/>
				<div style="overflow-x:auto;">
				<table class="w3-table " >
				<?php
						function count_P($list){
							$i=intval(0);
							foreach ($list as $value) {
								# code...
								if($value[2]=="Present")
									$i++;
							}
							return $i;
						}

						$total_sel_query="SELECT periodcode, `date`, count(*) as attendies FROM `attendence_table` WHERE 
							course_id=".$course_id." AND 
							teacher_id=".$teacher_id." AND 
							`sem`=".$sem; 
						$total_const=" GROUP BY periodcode, `date`;";
						//$filter="AND class_type=".$classtype_const;
						$class_days=mysqli_fetch_all(mysqli_query($conn,$total_sel_query.$total_const ));
						

					  	$query ="SELECT roll, first_name, last_name, gender FROM `student` WHERE sem=".$sem;
						
						$result = mysqli_fetch_all(mysqli_query($conn,$query));
						

						$student_list = array();
				?>
						<thead>
							<tr class='w3-padding-16'>
							<th>Info</th>
							<?php
									///Attendence
									foreach ($class_days as $value) {
										# code...
										echo "<th  width='25%'><span>".$value[0]."-".$value[1]."</span></th>";
									}

							?>
							<th>classes Attended</th>
							<th>Percentage</td>
							</tr>						
						</thead>
					<?php
						foreach ($result as $value) {
								# code...
								$get_student_attendance_query="SELECT `periodcode`, `date`, `attendence` FROM `attendence_table` WHERE `roll`=".$value[0]." AND `sem`=".$sem." AND `course_id`=".$course_id;

								$rows=mysqli_fetch_all(mysqli_query($conn,$get_student_attendance_query));
								$students_attendence=array();
								foreach ($rows as  $key=>$Presenty) {
									# code...
									$students_attendence[$key]=array($Presenty[0],$Presenty[1],$Presenty[2]);
								}
								$c=count_P($rows);
								$t=count($rows);
								$p=($t>0)?($c*100/$t):0;

								$student_list[$value[0]]=array($value[1],$value[2],$value[3], $students_attendence,$c,$t,$p);
								
							}	
						//print_r($student_list);	

							foreach ($student_list as $roll => $value) {
								# code...
								
								?>
						<tbody>
							<tr  style="width:100%; text-align: left;">
								<td>
									<img src="../w3/w3images/avatar<?php echo ($value[2]=='Male')? 2:6; ?>.png" class="w3-left w3-circle w3-margin-right" style="width:50px"> 
							    	&nbsp <span id='roll'><?php echo $roll ;?></span>
							    	<br/>
						    		
						    		&nbsp <span id='first_name'><?php echo $value[0]?></span> 
						    		&nbsp <span id='last_name'><?php echo $value[1]?></span> 
			    		
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
										echo "<td class='w3-text-green' width='25%'>P</td>";
									else
										echo "<td class='w3-text-red'  width='25%'>A</td>";
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