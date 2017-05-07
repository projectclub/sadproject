<?php

//include 'studentlist.php';

		/*$teacher_id=$_POST['teacher_id'];
		$course_id=$_POST['course_id'];  
		$course_year=$_POST['course_year'];
		$sem=$_POST['sem'];
		$periodcode=$_POST['periodcode'];  
		$date=$_POST['date'];*/

		//get_students_att_total();

		/*function get_students_att_total($roll){
			$connect = mysqli_connect("localhost","root","","ams");
			$str="SELECT periodcode, `date`, count(*) as rows FROM `attendence_table` WHERE 
			roll = ".$_POST['roll']." AND 
			course_id=".$_POST['course_id']." AND 
			teacher_id=".$_POST['teacher_id']." AND 
			`sem`=".$_POST['sem']." AND
			attendence='Present'
			GROUP BY periodcode, `date`;";
			//if($GLOBALS['total']>0)
			$val= mysqli_num_rows(mysqli_query($connect, $str	));
			//else $val=0;
			return $val;
		}*/
		session_start();
$teacher_id=$_SESSION["usr_id"];
	$course_id=$_GET['course_id']; 
	$course_name=$_GET['course_name'];  
	$course_year=$_GET['course_year']; 
	$sem=$_GET['sem'];

	include 'connection.php';
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
	/*$output = '';
	$connect = mysqli_connect("localhost","root","","ams");
	$query = "SELECT * FROM student ";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_all($result);*/
	//====================================================================


	$total_sel_query="SELECT periodcode, `date`, count(*) as attendies FROM `attendence_table` WHERE 
		course_id=".$course_id." AND 
		teacher_id=".$teacher_id." AND 
		`sem`=".$sem; 
	$total_const=" GROUP BY periodcode, `date`;";
	//$filter="AND class_type=".$classtype_const;
	$class_days=mysqli_fetch_all(mysqli_query($conn,$total_sel_query.$total_const ));
	

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
		$t=count($rows);
		$t+=count($rows2);
		$p=($t>0)?($c*100/$t):0;

		$student_list[$value[0]]=array($value[1],$value[2],$value[3], $students_attendence,$c,$t,$p);
		
	}	
	//=====================================================================
	//$query2 = "SELECT count(*) FROM attendence_table WHERE attendence="

	foreach ($student_list as $roll=>$value) {
		# code...
		$output .= '
			<tr>
				<td>'.$roll.'</td>
				<td>'.$value[0].'</td>
				<td>'.$value[1].'</td>
				<td>'.$sem.'</td>
				<td>'.$value[4].'/'.$value[5].'</td>
				<td>'.$value[6].'</td>
				
				
			</tr>
		';
	}
	/*while ($row = mysqli_fetch_all($result)) {
		# code...
		$output .= '
			<tr>
				<td>'.$row[0].'</td>
				<td>'.$row[1].'</td>
				<td>'.$row[2].'</td>
				<td>'.$row[3].'</td>
				<td>'.$row[4].'</td>
			</tr>
		';
	}*/
	return $output;
}

//if(isset($_POST["create_pdf"]))
//{
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
				<th width="15%">Roll</th>
				<th width="20%">First Name</th>
				<th width="25%">Last Name</th>
				<th width="8%">Sem</th>
				<th width="10%">Attendance</th>
				<th width="10%">Percentage</th>
			</tr>
				
	'; 

	$content .= fetch_data();
	$content .= '</table>';

	$obj_pdf->writeHTML($content);

	$obj_pdf->Output("sample.pdf","I");

//}

?>