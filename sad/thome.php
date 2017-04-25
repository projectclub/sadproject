<!DOCTYPE HTML>
<html lang="en">
	<head>
	</head>

	<body>
		<h2>Attendence Management System</h2><br/>
		<h3>TEACHER : 
<?php
	$teacher_id=$_POST['usr_id'];

	#include ("thome_top.php");
	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	$query ="SELECT `first_name`,`last_name` FROM `teacher` WHERE id='$teacher_id';";
  	$result = mysqli_query($conn, $query);
  	$teacher_name=mysqli_fetch_row($result);
	printf( "%s %s", $teacher_name[0], $teacher_name[1]);
?>		
		</h3>
		<a>Courses</a>
		<div id="courselist">
<?php
	
		
	$query ="SELECT * FROM `course` WHERE teacher_id='$teacher_id';";
	$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result);
    printf("<br/>");
    foreach ($row as  $value) {
    	# code...
    	printf("<div  onclick='fun(this)''  > 
    		&nbsp &nbsp <span id='course_id'>%s</span> 
    		&nbsp <span id='course_name'>%s</span> 
    		&nbsp <span id='course_year'>%s</span>
    		&nbsp sem:&nbsp<span id='sem'>%s</span>
    		</div><br/>", $value[0] ,$value[1],$value[3],$value[4]  );
    	printf("<script type='text/javascript'>
			function fun(div){
				var atributes=[];
			    atributes.push('attendence_page.php?teacher_id=".$teacher_id."');
			    var list =(div.getElementsByTagName('span'));
			    for (var i=0;i<list.length;i++){
				atributes.push(list[i].getAttribute('id')+'='+list[i].innerHTML);
			    }
			    var link=atributes.join('&');
			    //document.getElementById('demo').innerHTML=link;
			    alert(link);
			     var createA = document.createElement('a');
			        createA.setAttribute('href', link);
			        createA.click();
			}
			</script>");
    }
    mysqli_free_result($result);
    mysqli_close($conn);

	#include("thome_bottom.php");
?>

		</div>
		<!--<script type="text/php" src="courselist.php"> </script>-->
		<br/>
		<br/>
		<!--<p id="demo"></p>-->
		<br/>
		<br/>

		<br/> <h4>made by shivam</h4>
	</body>
</html>






