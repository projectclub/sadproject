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
			    position: relative;
			}
		    #main-wrapper{
		    	top:100px;
		        min-height: 100%;
			    padding: 0 0 100px;
			    position: relative;
		    }

		</style>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<link rel="stylesheet" type="text/css" href="../calender/codebase/fonts/font_roboto/roboto.css"/>
		<link rel="stylesheet" type="text/css" href="../calender/codebase/dhtmlxcalendar.css"/>
		<script src="../calender/codebase/dhtmlxcalendar.js"></script>
		

		<script src="../jquery/jquery-3.2.1.min.js"></script>
		<style type="text/css" src="style.css"></style>
		<script type="text/javascript" id="responsive" >
			var resp = function (div){ ;}
			function savestudent(div){
					var $id=div.find("#roll").html();
					var $first_name= div.find("#first_name").html();
					var $last_name= div.find("#last_name").html();
					var $attendence= div.find("#present_btn").html();
					var $periodcode=$("#periodcodeselect").val();
					var $date =$("#date").val() ;
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
				          date:$date
				        },
				        function(data,status){
				            alert("Data: " + data + "\nStatus: " + status);
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
				function check_checkbox($div)
				{
					var list =($div.find('span'));
					for (var i=0;i<list.length;i++){
						alert($(list[i]).attr('id')+$(list[i]).html())
						if($(list[i]).attr('id')=="present_btn")
							{
								if($(list[i]).html()=="Present")
								{
									$(list[i]).html("Absent");
									$(list[i]).attr('class',"w3-button w3-white w3-xlarge w3-right w3-hover-red");
								}
								else
								{
									$(list[i]).html("Present");
									$(list[i]).attr('class',"w3-button w3-white w3-xlarge w3-right w3-hover-green");
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
		</script>
		<script type="text/javascript">
			var sorterfn ={
				by_id:function(a,b){
					return parseInt($(a).find("#roll").text(),10) >
						parseInt($(b).find("#roll").text(),10);
				},
				by_per:function(a,b){
					return $(a).find("#present").text() >
						$(b).find("#present").text();
				},
				by_name:function(a,b){
					return $(a).find("#first_name").text()+$(a).find("#last_name").text() >
						$(b).find("#first_name").text()+$(b).find("#last_name").text();
				},
				by_check:function(a,b){
					return ($(a).find("#present_btn").text()) >
						($(b).find("#present_btn").text());
				}
			};
			function sorter(comp_by){
				var sort=[].sort();
				var $StudentListContainer =$("li.student");
				var OrderedDivs =$StudentListContainer.sort(comp_by);
				$("#StudentListContainer").html(OrderedDivs);
			};
			function rev_sorter(comp_by){
				var $StudentListContainer =$("li.student");
				var OrderedDivs =$StudentListContainer.sort(function(a,b){
					return !comp_by(a,b)
				});
				$("#StudentListContainer").html(OrderedDivs);
			};
			var order='DSC';

			function reorderdiv(BY){
				if(BY==order)
				{
					alert("reordering "+order+"=>"+'DSC');
					rev_sorter(sorterfn[BY]);
					order='DSC';
				}
				else
				{
					alert("reordering "+order+"=>"+BY);
					sorter(sorterfn[BY]);
					order=BY;
				}
			};
		</script>
	</head>

	<body>
		<!--Nav bar-->
		<?php
			$account_type="teacher";
			include 'nav_bar.php';
		?>
	    <!--Nav bar end-->
	    	    <!--main page-->
	    <div class="w3-container  " style="max-width:800px;margin-top:80px; ">    
			<div class="w3-panel  w3-theme-d2 w3-card-4" style="z-index: +1; position:relative;background-color: white;">
				<h3>Class :
				<?php echo $course_id ." ".$course_name ." ". $course_year ." sem: ".$sem;	?>	
				</h3>
				<br/>
				<a>Date:</a> <input type="date" class="w3-theme-d2" id= date name="date" onchange="myfunction()">
				<a id="day"></a>

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
				<a>Student List</a>
				
				<ul class="w3-ul ">
				<li class='w3-padding-16'>
					<span class="w3-button w3-bar-item" id="byid" onclick="reorderdiv('by_id')"> Id</span>
					<span class="w3-button w3-bar-item" id="byalph"  onclick="reorderdiv('by_name')" >Name</span>
					<span class="w3-button w3-bar-item" id="bycheck"  onclick="reorderdiv('by_check')" >Check</span>
					<span class="w3-button w3-bar-item" id="byper"  onclick="reorderdiv('by_per')" >Percent</span>
				</li>
				<li></li>
				</ul>

				<div  id="StudentList">			
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