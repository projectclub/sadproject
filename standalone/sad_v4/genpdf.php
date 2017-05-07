<?php
		session_start();
	$teacher_id=$_SESSION["usr_id"];
	$course_id=$_GET['course_id']; 
	$course_name=$_GET['course_name'];  
	$course_year=$_GET['course_year']; 
	$sem=$_GET['sem'];

	
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
function fetch_data()
{
	include 'connection.php';
	$total_sel_query="SELECT periodcode, `date`, count(*) as attendies FROM `attendence_table` WHERE 
		course_id=".$GLOBALS['course_id']." AND 
		teacher_id=".$GLOBALS['teacher_id']." AND 
		`sem`=".$GLOBALS['sem']; 
	$total_const=" GROUP BY periodcode, `date`;";
	$class_days=mysqli_fetch_all(mysqli_query($conn,$total_sel_query.$total_const ));
	

  	$query ="SELECT roll, first_name, last_name, gender FROM `student` WHERE sem=".$GLOBALS['sem'];
	
	$result = mysqli_fetch_all(mysqli_query($conn,$query));
	

	$student_list = array();
	foreach ($result as $value) {
		# code...
		$get_student_attendance_query="SELECT `periodcode`, `date`, `attendence` FROM `attendence_table` WHERE `roll`=".$value[0]." AND `sem`=".$GLOBALS['sem']." AND `course_id`=".$GLOBALS['course_id'];

		$rows=mysqli_fetch_all(mysqli_query($conn,$get_student_attendance_query));
		$rows2=mysqli_fetch_all(mysqli_query($conn,$get_student_attendance_query." AND class_type='lab'"));
		$students_attendence=array();
		foreach ($rows as  $key=>$Presenty) {
			# code...
			$students_attendence[$key]=array($Presenty[0],$Presenty[1],$Presenty[2]);
		}
		$c=count_P($rows);
		$c+=count_P($rows2);
		$t=count($rows);
		$t+=count($rows2);
		$p=($t>0)?($c*100/$t):0;
		$p=(float)

		$student_list[$value[0]]=array($value[1],$value[2],$value[3], $students_attendence,$c,$t,$p);
		
	}	
	$output="";
	foreach ($student_list as $roll=>$value) {
		# code...
		$output .= '
			<tr>
				<td>'.$roll.'</td>
				<td>'.$value[0].' '.$value[1].'</td>
				<td>'.$GLOBALS['sem'].'</td>
				<td>'.$value[4].'/'.$value[5].'</td>
				<td>'.number_format((float)$value[6],1,'.','').'%</td>
			</tr>
		';
	}
	return $output;
}

	require_once("tcpdf/tcpdf.php");
	$obj_pdf = new tcpdf('P', PDF_UNIT, PDF_PAGE_FORMAT,true, 'UTF-8', false);
	$obj_pdf->AddPage('P','A4');
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->SetTitle("Student Attendance Record");
	$obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
	$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'', PDF_FONT_SIZE_MAIN));
	$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'', PDF_FONT_SIZE_DATA));
	$obj_pdf->SetDefaultMonospacedFont('helvetica');
	$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$obj_pdf->SetMargins(PDF_MARGIN_LEFT,'5', PDF_MARGIN_RIGHT);
	$obj_pdf->setPrintHeader(false);
	$obj_pdf->setPrintFooter(false);
	$obj_pdf->SetAutoPageBreak(true,10);
	$obj_pdf->SetFont('helvetica','',12);

	$content = '';

	$content .= '
		<h3 align="center">Student Attendance Record</h3></br>
		<table border="1" cellspacing="0" cellpadding="5">
			<tr>
				<th width="15%" >Roll</th>
				<th width="45%">Name</th>
				<th width="8%">Sem</th>
				<th width="14%">Attendance</th>
				<th width="14%">Percentage</th>
			</tr>
				
	'; 

	$content .= fetch_data();
	$content .= '</table>';

	$obj_pdf->writeHTML($content);

	$obj_pdf->Output("sample.pdf","I");

?>