<!--Nav bar-->
<?php
	$query ="SELECT `first_name`,`last_name` FROM `teacher` WHERE id=";
	function get_gender($roll,$usr_type){
		$str="SELECT gender  FROM ".$usr_type." WHERE 
		id=".$GLOBALS['teacher_id')].";";
		$val= mysqli_fetch_row(mysqli_query($GLOBALS['conn'], $str))[0];
		return $val;
	}

	class usr{
		function usr($id,$usr_type){
			$result = mysqli_query($conn, ($query.$usr_type));
		  	$name=mysqli_fetch_row($result);
			$this->id = $id;
			$this->name = $name[0]." ".$name[1];
			$this->image = "'../w3/w3images/avatar".(get_gender($this->id,$usr_type)=="Male"? 3:4).".png'";
		}
	}
	$user;
	if(isset($teacher_id))
		$user=new usr($teacher_id,'teacher');
	//else if(isset($teacher_id))


?>
<div class="w3-top w3-card-4" style="height:200px; ">
   	<div class="w3-bar w3-theme-d2 w3-left-align w3-large" style="height:100%; z-index: -1; position:relative;overflow:visible;">
       	<a class=" w3-bar-item w3-left  w3-theme-d2" >
		  <b class="w3-opacity" style="font-size: 50px;">Attendance Management System</b>
		</a>
        <br/><br/>
        <div class="w3-dropdown-hover w3-bar-item w3-right" >
		    <a href="login.html" class=" w3-btn w3-hide-small w3-padding-large w3-hover-white" title="My Account">
	        <?php echo $user->name;?>&nbsp&nbsp
		        <img src=<?php echo $user->image; ?> class="w3-circle" style="height:80px;width:80px" alt="Avatar">
		    </a>
		    <div class="w3-dropdown-content w3-bar-block w3-card-4 "  >
		    	<a href="login.html"  class="w3-bar-item w3-button">Home</a>
		      <a href="login.html" class="w3-bar-item w3-button">Log out</a>
		    </div>
		</div>
        
   	</div>
</div>