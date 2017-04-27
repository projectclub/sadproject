<?php
	$id=$_POST['id'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$attendence=$_POST['attendence'];
	
	$course_id=$_POST['course_id'];
	$date=$_POST['date'];
	$teacher_id=$_POST['teacher_id'];
	$periodcode=$_POST['periodcode'];
	
	$sem=$_POST['sem'];
	
	$query ="INSERT INTO `attendence_table`( `roll`, `date`, `course_id`, `teacher_id`, `periodcode`, `attendence`,  `sem`) VALUES ('$id','$date','$course_id','$teacher_id','$periodcode','$attendence','$sem')";

	$conn = mysqli_connect("localhost","root","","ams");
		if (mysqli_connect_errno())
	  	{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}
		$result = mysqli_query($conn, $query);
	echo $result." ".$id." ".$first_name.$last_name.$attendence. " ".$course_id. " ".$teacher_id. " ".$date.$periodcode.$sem;
?>