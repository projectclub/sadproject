<!--Nav bar-->
<?php
	
	function get_gender($roll,$query_part){
		$str="SELECT gender  FROM ".$query_part;
		$val= mysqli_fetch_row(mysqli_query($GLOBALS['conn'], $str))[0];
		return $val;
	}

	class usr{
		function usr($id,$usr_type){
			$this->id = $id;
			$query ="SELECT `first_name`,`last_name` FROM ";
			$key_attrib;
			$no;

			if($usr_type=="teacher"){
				$key_attrib=$usr_type." WHERE id= ".$this->id.";";
				$no=(get_gender($this->id,$key_attrib)=="Male"? 3:4);
				$this->home="thome.php";
			}
			else{
				$key_attrib=$usr_type." WHERE roll= ".$this->id.";";
				$no=(get_gender($this->id,$key_attrib)=="Male"? 2:5);
				$this->home="shome.php";
			}

			$result = mysqli_query($GLOBALS['conn'], ($query.$key_attrib));
		  	$name=mysqli_fetch_row($result);
			$this->name = $name[0]." ".$name[1];
			$this->image = "'../w3/w3images/avatar".$no.".png'";
			
		}
	}
	$user;
	if($account_type=="teacher")
		$user=new usr($teacher_id,$account_type);
	if($account_type=="student")
		$user=new usr($student_id,"student");
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
		    	<a href=<?php echo $user->home;?>  class="w3-bar-item w3-button">Home</a>
		      <a href="logout.php" class="w3-bar-item w3-button">Log out</a>
		    </div>
		</div>
        
   	</div>
</div>