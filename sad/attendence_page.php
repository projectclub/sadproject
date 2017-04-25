<!DOCTYPE HTML>
<html lang="en">
	<head>
	</head>

	<body>
		<h2>Attendence Management System</h2><br/>

<?php
	$teacher_id=$_GET['teacher_id'];
	$course_id=$_GET['course_id'];  $course_name=$_GET['course_name'];  $course_year=$_GET['course_year']; $sem=$_GET['sem'];
	#include ("thome_top.php");
	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
?>
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
			}
		</script>
		
		<select>
			<option value="m9">Morning 9 O'clock</option>
			<option value="m10">Morning 10 O'clock</option>
			<option value="m11">Morning 11 O'clock</option>
			<option value="m12">Morning 12 O'clock</option>
			<option value="e2">Noon 2 O'clock</option>
			<option value="e3">Evening 3 O'clock</option>
			<option value="e4">Evening 4 O'clock</option>
		</select><br/><br/>


		<a>Student List</a>
		<form  id="studentlist">
<?php
	
		
	$query ="SELECT roll, first_name, last_name FROM `student` WHERE sem=4";
	$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result);
    printf("<br/>");
    foreach ($row as  $value) {
    	# code...
    	printf("<div class='student'>  &nbsp &nbsp <span id='roll'>%s</span> &nbsp <span id='first_name'>%s</span> &nbsp <span id='last_name'>%s</span> &nbsp 
    		<input checked data-toggle='toggle' type='checkbox' value='1' or value='true' name='mycheckbox' ></div><br/>"
			, $value[0] ,$value[1],$value[2]  );
    }
    mysqli_free_result($result);
    mysqli_close($conn);

	#include("thome_bottom.php");
?>
			<br/><h3 type="text" onclick="mark_present()" value="Save">Save</h3>
		</form>
		<script type="text/javascript" > 
		function mark_present(){
			var link=[]
		    //atributes.push('save_attendence.php');
		    link.push('save_attendence.php?');
		    var studentList=document.getElementsByClassName('student');
		    for(var i =0; i<studentList.length;i++)
		    {
		    	
		    }

		    link= link.join('&');
		    alert(link);
		     var createA = document.createElement('a');
		        createA.setAttribute('href', link[0]);
		        createA.click();
			}
		</script>
		<br/>
		<br/> <h4>made by shivam</h4>
	</body>
</html>