
	<?php
		$teacher_id=$_POST['teacher_id'];
		$course_id=$_POST['course_id'];  
		$course_year=$_POST['course_year'];
		$sem=$_POST['sem'];
		$periodcode=$_POST['periodcode'];  
		$date=$_POST['date'];

		$conn = mysqli_connect("localhost","root","","ams");
		if (mysqli_connect_errno())
	  	{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  		die();
	  	}

	  	$query ="SELECT roll, first_name, last_name FROM `student` WHERE sem=".$sem;
	  	$SelectConstraints="`date`='".$date."' AND 
			course_id=".$course_id." AND 
			teacher_id=".$teacher_id." AND 
			periodcode='".$periodcode."' AND
			`sem`=".$sem;
		$check_query="SELECT count(*) FROM `attendence_table` WHERE
			".$SelectConstraints;
		$tmp=mysqli_query($conn, $check_query);
		if($tmp>null)
			$update_flag = mysqli_fetch_row($tmp);
		else
			$update_flag=0;
		if($update_flag>0)
			echo "<p>Entry Already Present</p>";
		echo "<div id='StudentListContainer'>";

		function get_attendence($roll){
			if($GLOBALS['update_flag'] > 0){
				$att= mysqli_fetch_row(mysqli_query($GLOBALS['conn'],"SELECT attendence FROM `attendence_table` 
					WHERE roll=".$roll." AND ".$GLOBALS['SelectConstraints']))[0];
			}
			else 
				$att="Present";
			return ($att=="Present")?"checked":"unchecked";
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

		if($update_flag>0)
		$total=mysqli_num_rows(mysqli_query($conn, 
			"SELECT periodcode, `date`, count(*) as rows FROM `attendence_table` WHERE 
			course_id=".$course_id." AND 
			teacher_id=".$teacher_id." AND 
			`sem`=".$sem." 
			GROUP BY periodcode, `date`;"
			));
		else
			$total=0;

		$result = mysqli_query($conn, $query);
	    $row = mysqli_fetch_all($result);
	 
	    foreach ($row as  $value) {
	    	# code...
	    	?>
	    	<div class='student'>  
	    		&nbsp &nbsp <span id='roll'><?php echo $value[0]?></span>
	    		&nbsp <span id='first_name'><?php echo $value[1]?></span> 
	    		&nbsp <span id='last_name'><?php echo $value[2]?></span> 
	    		&nbsp <input <?php echo get_attendence($value[0])?> data-toggle='toggle' type='checkbox'  value=1 or value="true"  id='attendence' class="attcheck">
	    		<?php
	    		if($update_flag>0 && $total>0){ 
	    		?>
		    		&nbsp <span id='attended'><?php echo get_students_att_total($value[0])." / ".$total ?></span>
		    		&nbsp <span id='present'>
		    		<?php echo number_format((float) (get_students_att_total($value[0])*100/$total),2,'.','') ?></span>%
	    		<?php
	    		}
	    		?>
	    	</div>
	    	<?php
	    }
	    mysqli_free_result($result);
	    mysqli_close($conn);
	?>
</div>
<div>
	<br/><h3 type="text" id="SaveForm"  value="Save">Save</h3>
</div>
