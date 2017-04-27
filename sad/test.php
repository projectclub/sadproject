<!DOCTYPE HTML>
<html lang="en">
	<head>
		<script src="http://localhost/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" id="responsive" >
			function loadlist(){
					alert("loading list");
					$("#StudentList").load("studentlist.php",
						{
				          	sem :4
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
				$("#SaveForm").click(function(){
					if(t==false)
					{
						//$("#responsive").load("responsive.txt");
						
						t=true;
					}
					if($("#date").val() >"2000-1-1" )
						{
							alert("index");
						}
					else
						alert("valid date not set");
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
	</head>

	<body>
		<h2>Attendence Management System</h2><br/>
		<h3>Class :	
		</h3>
		<a>Date:</a> <input type="date" id= date name="date" onchange="myfunction()"><br/><br/>
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
		<a>Student List</a>
		<form  id="StudentList">
		<!--================================================-->
			<br/><h3 type="text" id="SaveForm"  value="Save">Save</h3>
		</form>

		<!--================================================-->

		<br/>
		<br/> <h4>made by shivam</h4>
	</body>
</html>