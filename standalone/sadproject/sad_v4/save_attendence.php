
<?php
//header("HTTP/1.0 418 hoooot");

	$id=$_POST['id'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$attendence=$_POST['attendence'];
	
	$course_id=$_POST['course_id'];
	$date=$_POST['date'];
	$teacher_id=$_POST['teacher_id'];
	$periodcode=$_POST['periodcode'];
	
	$sem=$_POST['sem'];
	
	$insert_query ="INSERT INTO `attendence_table`( `roll`, `date`, `course_id`, `teacher_id`, `periodcode`, `attendence`,  `sem`) VALUES (".$id.",'".$date."',".$course_id.", ".$teacher_id.",'".$periodcode."','".$attendence."',".$sem.");";
	
	$update_query="UPDATE `attendence_table` SET `attendence`='".$attendence."' WHERE 
		id=".$id." AND
		date='".$date."' AND
		course_id=".$course_id." AND
		teacher_id=".$teacher_id." AND
		periodcode='".$periodcode."' AND
		sem=".$sem.
	";";

	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}
	if(mysqli_query($conn, $insert_query)==1){
		echo "1 inserted ";
	}
	else if(mysqli_query($conn, $update_query)==1){
		echo "2 updated ";
	}
	else{
		echo "0 error ";
	}
	echo $id." ".$first_name.$last_name.$attendence. " ".$course_id. " ".$teacher_id. " ".$date.$periodcode.$sem ;
?>