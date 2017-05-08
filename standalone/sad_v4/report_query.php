<?php
	include 'student_list_make.php';
	//=================
	$teacher_id=111;
	$course_id=101; 
	$course_name="oopd";  
	$course_year=2017; 
	$sem=4;
	//=================
	function print_all($course_name){
		

		?>
			<div class="w3-card-4 w3-padding w3-border" style="z-index: +1; position:relative;background-color: white;">
			<h2><?php echo $course_name." Attendence"; ?></h2>

						
						<div style="overflow-x:auto;">
						<?php

								list($student_list,$class_days)=create_list();
								//print_r($student_list);	

						?>
						<table class="w3-table " >
								<thead>
									<tr >
										<th class="rotate" ><div ><span >Info</span></div></th>
										<?php
												///Attendence
												foreach ($class_days as $value) {
													# code...
													echo "<th class='rotate date'><div><span>".$value[0]."-".$value[1]."</span></div></th>";
												}

										?>
										<th class="rotate"><div><span>classes Attended</span></div></th>
										<th class="rotate"><div><span>Percentage</span></div></td>
									</tr>					
								</thead>
							<tbody ><tr><td>&nbsp</td></tr><?php
									foreach ($student_list as $roll => $value) {
										# code...
										
										?>
									
									<tr>  <!-- style="width:100%; text-align: left;"> -->
										<td>
											<div style="width: 300px;height: 50px"></div>
											<div class="info" >
											<img src="../w3/w3images/avatar<?php echo ($value[2]=='Male')? 2:6; ?>.png" class="w3-left w3-circle w3-margin-right" style="width:50px"> 
										    	<span id='roll'><?php echo $roll ;?></span>
										    	<br/>
									    		<span id='first_name'><?php echo $value[0]?></span> 
									    		<span id='last_name'><?php echo $value[1]?></span> 
					    					</div>
										</td>
										<?php
										///Attendence
										foreach ($class_days as $Pval) {
											# code...
											$att_val="Absent";
											foreach ($value[3] as $Periodc) {
												# code...
												if($Periodc[0]==$Pval[0]&&$Periodc[1]==$Pval[1])
													$att_val=$Periodc[2];
											}
											if($att_val=="Present")	
												echo "<td class='w3-text-green'> P</td>";
											else
												echo "<td class='w3-text-red' >A</td>";
										}

										?>
										<td>
											<?php
												echo $value[4]."/".$value[5];
											?>
										</td>
										<td>
											<?php
											echo number_format((float)$value[6],2,".","")."%";
											?>
										</td>
									</tr>
										<?php
									}
										?>
							
								</tbody>

							</table>
						</div>
					</div>
			<?php	
	}
	//==========
	print_all($course_name);
	?><br/><?php 
	print_all($course_name);
?>