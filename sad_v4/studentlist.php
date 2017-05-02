
	<?php
		//==========Get data===================
		$teacher_id=$_POST['teacher_id'];
		$course_id=$_POST['course_id'];  
		$course_year=$_POST['course_year'];
		$sem=$_POST['sem'];
		$periodcode=$_POST['periodcode'];  
		$date=$_POST['date'];
		//===================================
		//=============sql connect===========
		$conn = mysqli_connect("localhost","root","","ams");
		if (mysqli_connect_errno())
	  	{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  		die();
	  	}
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
			$str="SELECT periodcode, `date`, count(*) as rows FROM `attendence_table` WHERE 
			roll=".$roll." AND
			course_id=".$GLOBALS['course_id']." AND 
			teacher_id=".$GLOBALS['teacher_id']." AND 
			`sem`=".$GLOBALS['sem']." AND
			attendence='Present'
			GROUP BY periodcode, `date`;";
			if($GLOBALS['total']>0)
			$val= mysqli_num_rows(mysqli_query($GLOBALS['conn'], $str	));
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
			`sem`=".$sem;
		$check_query="SELECT count(*) FROM `attendence_table` WHERE
			".$SelectConstraints;
	  	//===========================================
		//===total classes of course=============
		$total_query="SELECT periodcode, `date`, count(*) as rows FROM `attendence_table` WHERE 
			course_id=".$course_id." AND 
			teacher_id=".$teacher_id." AND 
			`sem`=".$sem." 
			GROUP BY periodcode, `date`;";
		$total=mysqli_num_rows(mysqli_query($conn,$total_query ));
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
		if($update_flag>0)
			echo "<p>Entry Already Present</p>";
		//============================================

		?>
		<!--student list-->
		<div id='StudentListContainer'>
			<ul class="w3-ul ">
				<?php
			 	//==============Loop to print all students====================
				$result = mysqli_query($conn, $query);
			    $row = mysqli_fetch_all($result);
			    foreach ($row as  $value) {
			    	# code...
			    ?>
			    	<li class='student w3-padding-16' id="ll"> 
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
			</ul>

		</div>
		<!-- student list end-->

		<!-- save button-->
		<ul class="w3-ul " style="align-items: right;">
		<li class=' w3-padding-16'> 
			<br/><h3 type="text" class="w3-btn  btn w3-hover-green w3-text-red" style="float: right;" id="SaveForm"  value="Save">Save</h3>
			</li>
		</ul>
					<br/>
			<br/>
			<br/>

		<!-- save end button-->
<?php 
	//===============================================Form printing End=======================================================
	//=============close connection============
	    mysqli_free_result($result);
	    mysqli_close($conn);
	//=========================================
?>