<?php
	$teacher_id=$_POST['teacher_id'];
	$course_id=$_POST['course_id'];  
	$course_year=$_POST['course_year'];
	$sem=$_POST['sem'];
	$periodcode=$_POST['periodcode'];  
	$date=$_POST['date'];

	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		die();
  	}
  	$query ="SELECT roll, first_name, last_name FROM `student` WHERE sem=".$sem;
	$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result);
 
    foreach ($row as  $value) {
    	# code...
    	?>
    	<div class='student'>  
    		&nbsp &nbsp <span id='roll'><?php echo $value[0]?></span>
    		&nbsp <span id='first_name'><?php echo $value[1]?></span> 
    		&nbsp <span id='last_name'><?php echo $value[2]?></span> 
    		&nbsp <input checked data-toggle='toggle' type='checkbox'  value=1 or value="true"  id='attendence' class="attcheck"></div>
    	<?php
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<br/><h3 type="text" id="SaveForm"  value="Save">Save</h3>