<?php
		function count_P($list){
		$i=intval(0);
		foreach ($list as $value) {
			# code...
			if($value[2]=="Present"){
				$i++;
			}
		}
		return $i;
	}
	function create_list($course_id=null,$teacher_id=null,$sem=null){
		if(is_null($course_id))
      		$course_id=$GLOBALS['course_id'];
      	if(is_null($teacher_id))
      		$teacher_id=$GLOBALS['teacher_id'];
      	if(is_null($sem))
      		$sem=$GLOBALS['sem'];

		include 'connection.php';
		$total_sel_query="SELECT periodcode, `date`, count(*) as attendies FROM `attendence_table` WHERE 
			course_id=".$course_id." AND 
			teacher_id=".$teacher_id." AND 
			`sem`=".$sem; 
		$total_const=" GROUP BY periodcode, `date`;";
		$class_days=mysqli_fetch_all(mysqli_query($conn,$total_sel_query.$total_const ));

		$result=mysqli_query($conn, $total_sel_query." And `class_type`='lab'".$total_const);
		$total=count($class_days)+mysqli_num_rows($result);

	  	$query ="SELECT roll, first_name, last_name, gender FROM `student` WHERE sem=".$sem;
		
		$result = mysqli_fetch_all(mysqli_query($conn,$query));
		

		$student_list = array();
		foreach ($result as $value) {
			# code...
			$get_student_attendance_query="SELECT `periodcode`, `date`, `attendence` FROM `attendence_table` WHERE `roll`=".$value[0]." AND `sem`=".$sem." AND `course_id`=".$course_id;

			$rows=mysqli_fetch_all(mysqli_query($conn,$get_student_attendance_query));
			$rows2=mysqli_fetch_all(mysqli_query($conn,$get_student_attendance_query." AND class_type='lab'"));
			$students_attendence=array();
			foreach ($rows as  $key=>$Presenty) {
				# code...
				$students_attendence[$key]=array($Presenty[0],$Presenty[1],$Presenty[2]);
			}
			$c=count_P($rows);
			$c+=count_P($rows2);
			//$t=count($rows);
			//$t+=count($rows2);
			$t=$total;
			$p=($t>0)?($c*100/$t):0;
			$p=number_format((float)$p,2,'.','');

			$student_list[$value[0]]=array($value[1],$value[2],$value[3], $students_attendence,$c,$t,$p);
			
		}
		return array($student_list,$class_days);
	}	
?>