
	<?php
		//==========Get data===================
		$student_id=$_POST['student_id'];
		
		//===================================
		//=============sql connect===========
		include'connection.php';
	  	//===========================================
?>
<div class="w3-container  " style="max-width:800px;margin-top:80px; ">  
	<div class="w3-container " style="padding-left: 0;padding-right: 0; z-index: +1; position:relative;background-color: white;">    
	<!-- The Grid -->
			 <div class="w3-card-4 w3-padding-64 w3-border " style="padding-left: 30px;">
			<h2 class="w3-jumbo">Courses</h2>
		</div>
		<ul id="courselist " class="w3-ul " >
				<?php	
				$query ="SELECT * FROM `course` WHERE teacher_id='$teacher_id';";
				$result = mysqli_query($conn, $query);
			    $row = mysqli_fetch_all($result);
			    printf("<br/>");
		    foreach ($row as  $value) {
		    	# code...
		    	?>
	    	<li  class='student w3-padding-16 w3-btn' style="width:100%; text-align: left;" onclick='fun(this)' > 
	    		&nbsp &nbsp <span id='course_id'><?php echo$value[0]?> </span>
	    		&nbsp <span id='course_name'><?php echo$value[1]?></span> 
	    		&nbsp <span id='course_year'><?php echo$value[3]?></span>
	    		&nbsp sem:&nbsp<span id='sem'><?php echo$value[4]?></span>
	    		<br/>
	    	</li>
		
		
				<?php
		    } 
		    	?>
	    	<li></li>
		</ul>
	</div>
</div>