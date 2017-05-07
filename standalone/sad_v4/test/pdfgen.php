<?php

function fetch_data()
{
	
		$output = '
			<tr>
				<td> 1 </td>
				<td>2</td>
				<td>3</td>
				<td>4</td>
				<td>5</td>
			</tr>
		';
	
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
		<h3 align="center">Student Attendance Record</h3></br>
		<table border="1" cellspacing="0" cellpadding="5">
			<tr>
				<th width="15%">A</th>
				<th width="20%">B</th>
				<th width="25%">C</th>
				<th width="10%">E</th>
				<th width="10%">F</th>
			</tr>
				
	'; 

	$content .= fetch_data();
	$content .= '</table>';

	$obj_pdf->writeHTML($content);

	$obj_pdf->Output("sample.pdf","I");

?>