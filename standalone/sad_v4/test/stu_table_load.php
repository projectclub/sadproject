
	<?php
		//==========Get data===================
		session_start();
		$teacher_id=$_SESSION['usr_id'];
		$course_id=$_POST['course_id'];  
		$course_year=$_POST['course_year'];
		$sem=$_POST['sem'];
		$periodcode=$_POST['periodcode'];  
		$date=$_POST['date'];
		//===================================
		//=============sql connect===========
		include 'connection.php';
	  	//===========================================

	  	//==============functions======================
		function get_attendence($roll){
			if($GLOBALS['update_flag'] > 0){
				$att= mysqli_fetch_row(mysqli_query($GLOBALS['conn'],"SELECT attendence FROM `attendence_table` 
					WHERE roll=".$roll." AND ".$GLOBALS['SelectConstraints']))[0];
			}
			else 
				$att="Present";
			return ($att=="Present")?'class="w3-button w3-white w3-xlarge w3-right w3-hover-green" >Present':'class="w3-button w3-white w3-xlarge w3-right w3-hover-red" >Absent';
		}
		function get_students_att_total($roll){
			$sel="SELECT periodcode, `date`, count(*) as rows FROM `attendence_table` WHERE 
			roll=".$roll." AND
			course_id=".$GLOBALS['course_id']." AND 
			teacher_id=".$GLOBALS['teacher_id']." AND 
			`sem`=".$GLOBALS['sem']." AND
			attendence='Present' ";

			$constraint=" GROUP BY periodcode, `date`";
			if($GLOBALS['total']>0){
				$val= mysqli_num_rows(mysqli_query($GLOBALS['conn'], $sel.$constraint));

				$result=mysqli_query($GLOBALS['conn'], $sel."And `class_type`='lab'".$constraint);
				if($result)
				$val+=mysqli_num_rows($result);
			}
			else $val=0;
			return $val;
		}

		function get_gender($roll){
			$str="SELECT gender  FROM `student` WHERE 
			roll=".$roll.";";
			$val= mysqli_fetch_row(mysqli_query($GLOBALS['conn'], $str))[0];
			return $val;
		}
		//====================================

	  	//==sql query=================================
	  	$query ="SELECT roll, first_name, last_name FROM `student` WHERE sem=".$sem;
	  	$SelectConstraints="`date`='".$date."' AND 
			course_id=".$course_id." AND 
			teacher_id=".$teacher_id." AND 
			periodcode='".$periodcode."' AND
			`sem`=".$sem ;

		$check_query="SELECT count(*) FROM `attendence_table` WHERE
			".$SelectConstraints;
		$class_type_qry="SELECT DISTINCT `class_type`   FROM `attendence_table` WHERE
			".$SelectConstraints;
	  	//===========================================
		//===total classes of course=============
		$total_sel_query="SELECT periodcode, `date`, count(*) as rows FROM `attendence_table` WHERE 
			course_id=".$course_id." AND 
			teacher_id=".$teacher_id." AND 
			`sem`=".$sem; 
		$total_const=" GROUP BY periodcode, `date`;";
		$total=mysqli_num_rows(mysqli_query($conn,$total_sel_query.$total_const ));

		$result=mysqli_query($conn, $total_sel_query." And `class_type`='lab'".$total_const);
		//if($result)
		$total+=mysqli_num_rows($result);
		if(!($total>0))
			$total=0;
		//=========================================

		//============Find if entry is present=======	
		$update_flag=intval(mysqli_fetch_row(mysqli_query($conn, $check_query))[0]);

		//if($tmp>null)
		//	$update_flag = mysqli_fetch_row($tmp);
		//else
		//	$update_flag=0;

		//===============================================Form printing===========================================================
		if($update_flag>0){
			echo "<p>Entry Already Present</p>";
			
			$class_type=mysqli_fetch_row(mysqli_query($conn, $class_type_qry))[0];
			
		}
		//============================================

		?>
		<!--student list-->
		<div id='StudentListContainer'>
			<tbody class="w3-ul ">
				<?php
			 	//==============Loop to print all students====================
				$result = mysqli_query($conn, $query);
			    $row = mysqli_fetch_all($result);
			    foreach ($row as  $value) {
			    	# code...
			    ?>
			    	<tr class='student w3-padding-16' id="ll"> 
			    	<span id="present_btn"  <?php echo get_attendence($value[0]) ?></span>
				    <img src="../w3/w3images/avatar<?php echo get_gender($value[0])=='Male'? 2:6; ?>.png" class="w3-left w3-circle w3-margin-right" style="width:50px"> 
				    	&nbsp <span id='roll'><?php echo $value[0]?></span>
				    	<br/>
			    		
			    		&nbsp <span id='first_name'><?php echo $value[1]?></span> 
			    		&nbsp <span id='last_name'><?php echo $value[2]?></span> 
			    		
			    		<?php
			    		if($total>0){ 
			    		?>
				    		&nbsp <span id='attended'><?php echo get_students_att_total($value[0])." / ".$total ?></span>
				    		&nbsp <span id='present'>
				    		<?php echo number_format((float) (get_students_att_total($value[0])*100/$total),2,'.','') ?></span>%
			    <?php
			    		}
			    ?>	
		 	<?php
		    }
			    //==============Loop End========================
			?>
			</tbody>

		</div>
		<!-- student list end-->
					<br/>
			<br/>
						

			<br/>		
			<script >
				$( document ).ready(function() {
				  // Handler for .ready() called.
				$($("#class_type").val(<?php echo "'".$class_type."'"; ?>));
				});
				//$("#class_type").val();
			</script>

		<!-- save end button-->
<?php 
	//===============================================Form printing End=======================================================
	//=============close connection============
	    mysqli_free_result($result);
	    mysqli_close($conn);
	//=========================================
?>