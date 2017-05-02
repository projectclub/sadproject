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
      <link rel="stylesheet" href="../w3/w3css/4/w3.css">
      <link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
      <link rel='stylesheet' href='../css/opensan.css'>
      <link rel="stylesheet" href="../css/font-awesome.min.css">
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
		<style>
			div.scrolllist {
			    overflow: auto;
			    white-space: nowrap;
			}

			div.scrolllist a span {
			    display: inline-block;
			    color: white;
			    text-align: center;
			    padding: 14px;
			    text-decoration: none;
			}
			div.scrolllist a span.info {
				position: relative;
			    display: none;
			    text-align: center;
			    padding: 14px;
			    text-decoration: none;
			}
			div.scrolllist a:hover span{
			    display: none;
			}
			div.scrolllist a:hover .info{
			    display: inline-block;
			    float:bottom;
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
					    <a href="login.html" class=" w3-btn w3-hide-small w3-padding-large w3-hover-white" title="My Account">
				        <?php echo $name[0]." ".$name[1];?>&nbsp&nbsp
					        <img src="../w3/w3images/avatar<?php echo get_gender($student_id)=="Male"? 2:5; ?>.png" class="w3-circle" style="height:80px;width:80px" alt="Avatar">
					    </a>
					    <div class="w3-dropdown-content w3-bar-block w3-card-4 "  >
					    	<a href="login.html"  class="w3-bar-item w3-button">Home</a>
					      <a href="login.html" class="w3-bar-item w3-button">Log out</a>
					    </div>
					</div>
			        
		       	</div>
		    </div>
	    <!--Nav bar end-->
	    <!--main page-->
	    <div class="w3-container  " style="max-width:800px;margin-top:80px; ">  
		    <div class="w3-container " style="padding-left: 0;padding-right: 0; z-index: +1; position:relative;background-color: white;">    
	      <!-- Card+list-->
	      		<div class="w3-card-4 w3-padding-64 w3-border " style="padding-left: 30px;">
					<h2 class="w3-jumbo">Student</h2>			
				</div>
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
		<br/>

		<footer class="w3-container w3-theme-d5 w3-bottom" style="z-index: -1; position:relative;background-color: white;">
			<p>
				<a>by shivam</a>
			</p>
		</footer>
	</body>
</html>
<?php 
    mysqli_close($conn);
?>	



