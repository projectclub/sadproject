<?php
	$teacher_id=$_GET['teacher_id'];
	$course_id=$_GET['course_id'];  $course_name=$_GET['course_name'];  $course_year=$_GET['course_year']; $sem=$_GET['sem'];
	#include ("thome_top.php");
	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		die();
  	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<script src="http://localhost/jquery/jquery-3.2.1.min.js"></script>
		<style type="text/css" src="style.css"></style>
		<script type="text/javascript" id="responsive" >
			var resp = function (div){ ;}
			function savestudent(div){
					var $id=div.find("#roll").html();
					var $first_name= div.find("#first_name").html();
					var $last_name= div.find("#last_name").html();
					var $attendence= div.find("#attendence").is(':checked')?"Present":"Absent";
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
				};
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				var t=false;
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
				});
				$(document).on("click",".attcheck",function(){
					var $div=$(this).closest("div");
					resp($div);
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
					return ($(a).find("#attendence").is(":checked")) >
						($(b).find("#attendence").is(":checked"));
				}
			};
			function sorter(comp_by){
				var sort=[].sort();
				var $StudentListContainer =$("div.student");
				var OrderedDivs =$StudentListContainer.sort(comp_by);
				$("#StudentListContainer").html(OrderedDivs);
			};
			function rev_sorter(comp_by){
				var $StudentListContainer =$("div.student");
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
		<style >
			#first_name: {
				float: left;
				width: 80px;
			}
			#last_name: {
				float: left;
				width: 80px;
			}
		</style>
	</head>

	<body>
		<h2>Attendence Management System</h2><br/>
		<h3>Class :
		<?php echo $course_id ." ".$course_name ." ". $course_year ." sem: ".$sem;	?>	
		</h3>
		<a>Date:</a> <input type="date" id= date name="date" onchange="myfunction()"><br/><br/>
		<!--<script>
		    $(function(){           
		        if (!Modernizr.inputtypes.date) {
		            $('input[type=date]').datepicker({
		                  dateFormat : 'yy-mm-dd'
		                }
		             );
		        }
		    });
		</script>-->
		<a id="day"></a>

		<select id="periodcodeselect">
			<option value="m9">Morning 9 O'clock</option>
			<option value="m10">Morning 10 O'clock</option>
			<option value="m11">Morning 11 O'clock</option>
			<option value="m12">Morning 12 O'clock</option>
			<option value="e2">Noon 2 O'clock</option>
			<option value="e3">Evening 3 O'clock</option>
			<option value="e4">Evening 4 O'clock</option>
		</select><br/><br/>
		<input type="button" id="byid" name="byid" value="byid" onclick="reorderdiv('by_id')">
		<input type="button" id="byper" name="byper" value="byper" onclick="reorderdiv('by_per')">
		<input type="button" id="byalph" name="byalph" value="byalph" onclick="reorderdiv('by_name')">
		<input type="button" id="bycheck" name="bycheck" value="bycheck" onclick="reorderdiv('by_check')">
		<br/>
		<a>Student List</a>
		<div  id="StudentList">			
		</div>

		<br/>
		<br/> <h4>made by shivam</h4>
	</body>
</html>