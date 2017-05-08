<?php
		session_start();
		if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$teacher_id=$_SESSION["usr_id"];
	$course_id=$_GET['course_id']; 
	$course_name=$_GET['course_name'];  
	$course_year=$_GET['course_year']; 
	$sem=$_GET['sem'];

require_once 'student_list_make.php';
function fetch_data()
{
	list($student_list,)=create_list();

	$output="";
	foreach ($student_list as $roll=>$value) {
		# code...
		$output .= '
			<tr>
				<td>'.$roll.'</td>
				<td>'.$value[0].' '.$value[1].'</td>
				<td>'.$GLOBALS['sem'].'</td>
				<td>'.$value[4].'/'.$value[5].'</td>
				<td>'.$value[6].'%</td>
			</tr>
		';
	}
	return $output;
}

	require_once("../tcpdf/tcpdf.php");
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
		<h3 align="center">'.$course_name.' Student Attendance Record</h3></br>
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