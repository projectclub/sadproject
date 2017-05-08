<?php
	session_start();
		if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$teacher_id=$_SESSION["usr_id"];
	$course_id=$_GET['course_id'];  $course_name=$_GET['course_name'];  $course_year=$_GET['course_year']; $sem=$_GET['sem'];
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
      <link rel='stylesheet' href='../font-awesome-4.7.0/css/font-awesome.min.css'>
		<script src="../jquery/jquery-3.2.1.min.js"></script>
	    <style>
	    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	    </style>		

		<script type="text/javascript" id="responsive" >
			var resp = function (div){ ;}
			function savestudent(div){
					var $id=div.find("#roll").html();
					var $first_name= div.find("#first_name").html();
					var $last_name= div.find("#last_name").html();
					var $attendence= div.find("#present_btn").html();
					var $periodcode=$("#periodcodeselect").val();
					var $date =$("#date").val() ;
					var $class_type=$("#class_type").val();
					$.post("save_attendence.php",
				        {
				          id:$id,
				          first_name:$first_name,
				          last_name:$last_name,
				          attendence:$attendence,
				          course_id:$course_id,
				          teacher_id:$teacher_id,
				          sem:$sem,
				          periodcode:$periodcode,
				          date:$date,
				          class_type:$class_type
				        },
				        function(data,status){
				        	alert("Data: " + data + "\nStatus: " + status);
				            console.log("Data: " + data + "\nStatus: " + status);
			        });
				};
			var $course_id=<?php echo $course_id?> ;
			var $teacher_id=<?php echo $teacher_id?>; 
			var $sem=<?php echo $sem?> ;
			var $periodcode=$("#periodcodeselect").val();
			var $date =$("#date").val() ;
			var $course_year=<?php echo $course_year ?>;
		</script>
		<script type="text/javascript">
			function loadlist(){
					resp = function (div){ ;};
					t=false;

					refresh_contents();
				};
				function refresh_contents(){
					$periodcode=$("#periodcodeselect").val();
					$date =$("#date").val() ;
					alert($periodcode+" "+$date);
					$("#StudentList").load("studentlist.php",
						{
				          	teacher_id : $teacher_id,
				          	course_id : $course_id,
					        course_year:$course_year,
				          	sem : $sem,
				          	periodcode : $periodcode,
					        date : $date
						},
						function(data,status){
				            alert("Data: " + data + "\nStatus: " + status);
				        }
					);
					return 1;
				};
				function check_checkbox($div){
					var list =($div.find('span'));
					for (var i=0;i<list.length;i++){
						alert($(list[i]).attr('id')+$(list[i]).html())
						if($(list[i]).attr('id')=="present_btn")
							{
								if($(list[i]).html()=="Present")
								{
									$(list[i]).html("Absent");
									$(list[i]).attr('class',"w3-btn w3-white w3-xlarge w3-right w3-hover-red");
								}
								else
								{
									$(list[i]).html("Present");
									$(list[i]).attr('class',"w3-btn w3-white w3-xlarge w3-right w3-hover-green");
								}
							}
				    }
				}
		</script>
		<script type="text/javascript">
			var t=false;

			$(document).ready(function(){
				$(document).on("click","#SaveForm",function(){
					if(t==false)
					{
						//$("#responsive").load("responsive.txt");
						resp = savestudent;
						t=true;
					}
					if($("#date").val() >"2000-1-1" )
						{
							alert("index");
							$(".student").each(function(index){
								savestudent($(this));
							})
						}
					else
						alert("valid date not set");
		
						alert($("#SaveForm").attr('class','w3-btn  btn w3-hover-green w3-text-green'));
					
				});
				$(document).on("click","#present_btn",function(){
					var $div=$(this).closest("li");
					check_checkbox($div);
					resp($(this).closest("li"));
				});

				
			});
		</script>
		<script type="text/javascript">
			function myfunction() {
				var datestr = document.getElementById("date").value;
		        var d = [];
				d= datestr.split('-');
				var d = new Date(d[0],d[1]-1,d[2]);
				var weekday = new Array(7);
				weekday[0] =  "Sunday";
				weekday[1] = "Monday";
				weekday[2] = "Tuesday";
				weekday[3] = "Wednesday";
				weekday[4] = "Thursday";
				weekday[5] = "Friday";
				weekday[6] = "Saturday";
				var n= weekday[d.getDay()];
				document.getElementById("day").innerHTML =n;

				loadlist();	
			}


			$(document).ready(function(){
				$(document).on("change","#class_type",function(){
					if($('#class_type').val()=='lab')
					{
						$("#periodcodeselect option[value='m12']").hide();
						$("#periodcodeselect option[value='e4']").hide();
					}
					else
					{
						$("#periodcodeselect option[value='m12']").show();
						$("#periodcodeselect option[value='e4']").show();
					}
				});
			});
		</script>
		<script type="text/javascript" src="div_sorter.js">

		</script>
		<script type="text/javascript">

			var course_id=<?php echo $course_id?> ;
			var sem=<?php echo $sem?> ;
			var course_year=<?php echo $course_year ?>;
			var course_name=<?php echo "'".$course_name."'"; ?>;
			$(document).ready(function(){
				$(document).on("click","#table_link",function(){
					var link="attendance_table.php?course_id="+course_id+"&course_name="+course_name+"&course_year="+course_year+"&sem="+sem;
				    alert(link);
				    window.location=link;
				});
				$(document).on("click","#create_pdf",function(){
						window.location="genpdf.php?course_id="+course_id+"&course_name="+course_name+"&course_year="+course_year+"&sem="+sem;
					});
			});
		</script>
		<!--floating bar-->
		<style>
			

			.icon-bar {
			    width: 90px;
			    background-color: #555;
			}

			.icon-bar a {
			    display: block;
			    text-align: center;
			    padding: 16px;
			    transition: all 0.3s ease;
			    color: white;
			    font-size: 36px;
			}

			.icon-bar a:hover {
			    background-color: #000;
			}

			.active {
			    background-color: #4CAF50 !important;
			}
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
	    <!--main page container-->
	    <div id="main-content" class="w3-container  " style="max-width:800px;top:80px;position:relative;">    
			<div class="w3-panel  w3-theme-d2 w3-card-4" style="z-index: +1; position:relative;background-color: white;">
				<div id="table_link" class="w3-right w3-button w3-hover-black" ><br/>Table</div>
				<div id="create_pdf" class="w3-right w3-button w3-hover-black" ><br/>Create PDF</div>
				
				<h3>Class :
				<?php echo $course_id ." ".$course_name ." ". $course_year ." sem: ".$sem;	?>	
				</h3>
				<br/>
				<a>Date:</a> <input type="date" class="w3-theme-d2" id= date name="date" onchange="myfunction()">
				<a><span id="day" ></span>&nbsp&nbsp
				<select id="class_type" class="w3-right  w3-theme-d2">
					<option value="leq">lecture</option>
					<option value="lab">lab</option>
					<option value="tut">tutorial</option>
				</select></a>

				<select id="periodcodeselect" class="w3-select w3-theme-d2" onchange="loadlist()">
					<option value="m9">Morning 9 O'clock </option>
					<option value="m10">Morning 10 O'clock </option>
					<option value="m11">Morning 11 O'clock </option>
					<option value="m12">Morning 12 O'clock </option>
					<option value="e2">Noon 2 O'clock </option>
					<option value="e3">Evening 3 O'clock </option>
					<option value="e4">Evening 4 O'clock </option>
				</select><br/><br/>
			</div>	

			<div class="w3-card-4 w3-padding w3-border" style="z-index: +1; position:relative;background-color: white;"">
				<a >Student List</a>
				
				<ul class="w3-ul ">
				<li class='w3-padding-16'>
					<span>Sort By</span>
					<span class="w3-button w3-bar-item" id="byid" onclick="reorderdiv('by_id')"> Id</span>
					<span class="w3-button w3-bar-item" id="byalph"  onclick="reorderdiv('by_name')" >Name</span>
					<span class="w3-button w3-bar-item" id="bycheck"  onclick="reorderdiv('by_check')" >Presenty</span>
					<span class="w3-button w3-bar-item" id="byper"  onclick="reorderdiv('by_per')" >Percent</span>
				</li>
				<li></li>
				</ul>

				<div  id="StudentList">			
				</div>
			</div>

		</div>
		



			
		<br/>
		<!--Footer-->
		<?php include 'footer.php';?>
		</div>
	</body>
</html>