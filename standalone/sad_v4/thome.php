<?php
	session_start();
		if(!isset($_SESSION["usr_id"]))
		{	$_SESSION['logedout'] = true;
			header("location:login.php");
		}
	$teacher_id=$_SESSION["usr_id"];

	include 'connection.php';
?>		
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>AMS</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../w3/w3css/4/w3.css">
      	<link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
    	<link rel='stylesheet' href='../css/opensan.css'>
      <link rel='stylesheet' href='../css/font-awesome.min.css'>
    	<style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
      	</style>
		<script type='text/javascript'>
			/*function fun(div){
				var atributes=[];
			    atributes.push("attendence_page.php?teacher_id="+
			    	< ?php echo $teacher_id?>);
			    var list =(div.getElementsByTagName('span'));
			    for (var i=0;i<list.length;i++){
				atributes.push(list[i].getAttribute('id')+'='+list[i].innerHTML);
			    }
			    var link=atributes.join('&');
			    alert(link);
			    window.location=link;
			}*/
			function fun(div){
				var atributes=[];
			    atributes.push("attendence_page.php?");
			    var list =(div.getElementsByTagName('span'));
			    for (var i=0;i<list.length;i++){
				atributes.push(list[i].getAttribute('id')+'='+list[i].innerHTML);
			    }
			    var link=atributes.join('&');
			    alert(link);
			    window.location=link;
			}

		</script>
		<link rel="stylesheet" href="pg_frame.css">
	</head>

	<body >
	<div id="main-wrapper">
		<!--Nav bar-->
		<?php
			$account_type="teacher";
			include 'nav_bar.php';
		?>
	    <!--Nav bar end-->
	    <!--main page-->
	    <div id="main-content" class="w3-container  " style="max-width:800px;top:80px;position:relative;">
		    <div class="w3-container " style="padding-left: 0;padding-right: 0; z-index: +1; position:relative;">    
	      <!-- The Grid -->
	      		 <div id="title" class="w3-card-4 w3-padding-64 w3-border " style="padding-left: 30px;background-color: white;">
					<h2 class="w3-jumbo">Courses</h2>
				</div>
				<br/>
				<div class ="w3-card" style="background-color: white;">
				
				<ul id="courselist " class=" w3-ul " >
						<?php	
						$query ="SELECT * FROM `course` WHERE teacher_id='$teacher_id';";
						$result = mysqli_query($conn, $query);
					    $row = mysqli_fetch_all($result);
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
				</ul>
				</div>
			</div>
		</div>
		<br/>
		<!--Footer-->
		<?php include 'footer.php';?>
	</div>
	</body>
</html>
<?php 
    mysqli_free_result($result);
    mysqli_close($conn);
?>	



