<?php
	$teacher_id=$_GET['usr_id'];

	#include ("thome_top.php");
	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		die();
  	}
  	$query ="SELECT `first_name`,`last_name` FROM `teacher` WHERE id='$teacher_id';";
  	$result = mysqli_query($conn, $query);
  	$teacher_name=mysqli_fetch_row($result);
		function get_gender($roll){
			$str="SELECT gender  FROM `teacher` WHERE 
			id=".$GLOBALS['teacher_id'].";";
			$val= mysqli_fetch_row(mysqli_query($GLOBALS['conn'], $str))[0];
			return $val;
		}
?>		
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>AMS</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
      </style>
		<style>
			footer {
		        height: 50px;
				width: 100%;
				left: 0;
		        right: 0;
				bottom: 0;
				text-align: center;
			    position: absolute;
			}
		    #main-wrapper{
		    	top:100px;
		        min-height: 100%;
			    padding: 0 0 100px;
			    position: relative;
		    }
		</style>
				<script type='text/javascript'>
			function fun(div){
				var atributes=[];
			    atributes.push("attendence_page.php?teacher_id="+
			    	<?php echo $teacher_id?>);
			    var list =(div.getElementsByTagName('span'));
			    for (var i=0;i<list.length;i++){
				atributes.push(list[i].getAttribute('id')+'='+list[i].innerHTML);
			    }
			    var link=atributes.join('&');
			    alert(link);
			    window.location=link;
			}
		</script>
	</head>

	<body>
		<!--Nav bar-->
		    <div class="w3-top w3-card-4" style="height:200px; ">
		       	<div class="w3-bar w3-theme-d2 w3-left-align w3-large" style="height:100%; z-index: -1; position:relative;overflow:visible;">
			       	<a class=" w3-bar-item w3-left  w3-theme-d2" >
					  <b class="w3-opacity" style="font-size: 50px;">Attendence Management System</b>
					</a>
			        <br/><br/>
			        <div class="w3-dropdown-hover w3-bar-item w3-right" >
					    <a href="http://localhost/sad-proj/sad_v4/login.html" class=" w3-btn w3-hide-small w3-padding-large w3-hover-white" title="My Account">
				        <?php echo $teacher_name[0]." ".$teacher_name[1];?>&nbsp&nbsp
					        <img src="http://localhost/w3/w3images/avatar<?php echo get_gender($teacher_id)=="Male"? 3:4; ?>.png" class="w3-circle" style="height:80px;width:80px" alt="Avatar">
					    </a>
					    <div class="w3-dropdown-content w3-bar-block w3-card-4 "  >
					    	<a href="http://localhost/sad-proj/sad_v4/login.html"  class="w3-bar-item w3-button">Home</a>
					      <a href="http://localhost/sad-proj/sad_v4/login.html" class="w3-bar-item w3-button">Log out</a>
					    </div>
					</div>
			        
		       	</div>
		    </div>
	    <!--Nav bar end-->
	    <!--main page-->
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
	    } ?>
	    	<li></li>
			</ul>
			</div>
		</div>
		<br/>
		<footer class="w3-container w3-theme-d5 ">
			<p>
				<a>by shivam</a>
			</p>
		</footer>
	</body>
</html>
<?php 
    mysqli_free_result($result);
    mysqli_close($conn);
?>	



