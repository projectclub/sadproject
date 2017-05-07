
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
	$class_type=$_POST['class_type'];
	$sem=$_POST['sem'];
	
	include 'connection.php';

	$insert_query ="INSERT INTO `attendence_table`( `roll`, `date`, `course_id`, `teacher_id`, `periodcode`, `attendence`,  `sem`, `class_type`) VALUES (".$id.",'".$date."',".$course_id.", ".$teacher_id.",'".$periodcode."','".$attendence."',".$sem.",'".$class_type."');";
	
	$update_query="UPDATE `attendence_table` SET `attendence`='".$attendence."' WHERE 
		id=".$id." AND
		date='".$date."' AND
		course_id=".$course_id." AND
		teacher_id=".$teacher_id." AND
		periodcode='".$periodcode."' AND
		sem=".$sem.
	";";
	$check_exits="SELECT DISTINCT `course_id` FROM `attendence_table` 
	WHERE id=".$id." AND
		date='".$date."' AND
		periodcode='".$periodcode."' AND
		sem=".$sem.
	";";


	if(mysqli_query($conn, $insert_query)==1){
		echo "1 inserted ";		
	}
	else{
		if( mysqli_errno($conn) == 1062 ) {
	    // Duplicate key
			$result=mysqli_query($conn, $check_exits);
			if(mysqli_num_rows($result)>=0&&mysqli_fetch_row($result)[0]==$course_id){
				if(mysqli_query($conn, $update_query)==1)
					echo "2 updated ";
			}
			else
				echo "student attended some other class at this time!";
		} 
		else {
		    // ZOMGFAILURE
		    echo "0 error";
		}
	}
	echo $id." ".$first_name.$last_name.$attendence. " ".$course_id. " ".$teacher_id. " ".$date.$periodcode.$sem." ".$class_type;
 
?>