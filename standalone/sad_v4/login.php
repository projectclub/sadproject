<?php
	session_start();
	if(isset($_SESSION['logedout']) && $_SESSION['logedout']) {
		// remove all session variables
	session_unset();
		$GLOBALS['login_message']="<h4 style='color:red;'>Please Login!</h4>";
	}
	else if(isset($_SESSION['logedout_success']) && $_SESSION['logedout_success']) {
		// remove all session variables
	session_unset();
		$GLOBALS['login_message']="<h4 style='color:red;'>Loged out successfully!</h4>";
	}
	else{

		;
	}
	// destroy the session 
	session_destroy(); 

?>

<!DOCTYPE html>


<html>
	<title>AMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../w3/w3css/4/w3.css">
      <link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
      <link rel='stylesheet' href='../css/opensan.css'>
      <link rel="stylesheet" href="../css/font-awesome.min.css">

      <style>
	        html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	        input:hover{
		         outline: none;
		         border-color: green;
		    }
	        
	        /*
	        box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);}
			input:focus{  
			    outline: none;
			    border-color: green;
			}
			*/
      </style>
	<style>
		body{

		}
		header {
	        height: 70px;
		    width: 100%;
			top: 0;
		    left: 0;
		    right: 0;
		    bottom: 100px;
		    color: grey;
			text-align: center;
			position: absolute;
		}
	    #main-wrapper{
	    	top:100px;
	        min-height: 100%;
		    padding: 0 0 100px;
		    position: relative;
	    }
		.center {
		    margin: auto;
		    width: 40%;

		    padding: 10px;
		    align-items: center;
		}
		.btn{
			color: green;
			height:40px;
		}
		footer {
	        height: 50px;
			width: 100%;
			left: 0;
	        right: 0;
			bottom: 0;
			text-align: center;
		    position: absolute;
		}
		

	</style>
	<style type="text/css">
		
		/* form starting stylings ------------------------------- */
		.group 			  { 
		  position:relative; 
		  margin-bottom:45px; 
		}
		input 				{
		  font-size:18px;
		  padding:10px 10px 10px 5px;
		  display:block;
		  width:300px;
		  border:none;
		  border-bottom:1px solid #757575;
		}
		input:focus 		{ outline:none; }

		/* LABEL ======================================= */
		label 				 {
		  color:#999; 
		  font-size:18px;
		  font-weight:normal;
		  position:absolute;
		  pointer-events:none;
		  left:5px;
		  top:10px;
		  transition:0.2s ease all; 
		  -moz-transition:0.2s ease all; 
		  -webkit-transition:0.2s ease all;
		}

		/* active state */
		input:focus ~ label, input:valid ~ label 		{
		  top:-20px;
		  font-size:14px;
		  color:#5264AE;
		}

		/* BOTTOM BARS ================================= */
		.bar 	{ position:relative; display:block; width:300px; }
		.bar:before, .bar:after 	{
		  content:'';
		  height:2px; 
		  width:0;
		  bottom:1px; 
		  position:absolute;
		  background:#5264AE; 
		  transition:0.2s ease all; 
		  -moz-transition:0.2s ease all; 
		  -webkit-transition:0.2s ease all;
		}
		.bar:before {
		  left:50%;
		}
		.bar:after {
		  right:50%; 
		}

		/* active state */
		input:focus ~ .bar:before, input:focus ~ .bar:after {
		  width:50%;
		}



		/* active state */
		input:focus ~ .highlight {
		  -webkit-animation:inputHighlighter 0.3s ease;
		  -moz-animation:inputHighlighter 0.3s ease;
		  animation:inputHighlighter 0.3s ease;
		}

		/* ANIMATIONS ================ */
		@-webkit-keyframes inputHighlighter {
			from { background:#5264AE; }
		  to 	{ width:0; background:transparent; }
		}
		@-moz-keyframes inputHighlighter {
			from { background:#5264AE; }
		  to 	{ width:0; background:transparent; }
		}
		@keyframes inputHighlighter {
			from { background:#5264AE; }
		  to 	{ width:0; background:transparent; }
		}
	</style>

	<body>
	<!-- Navigation bar-->
			<div class="w3-top w3-card-4" style="height:200px; ">
		       <div class="w3-bar w3-theme-d2 w3-left-align w3-large" style="height:100%; z-index: -1; position:relative;">
		       <a class=" w3-bar-item w3-left  w3-theme-d2" >
				  <b class="w3-opacity" style="font-size: 50px;">Attendence Management System</b>
				</a>
		       </div>
		    </div>
		<!-- Main content -->
		<div class="w3-container w3-content" style="max-width:1400px;margin-top:100px;hover:border">    

			<div class="w3-container center" >
				<div class="w3-card-4  w3-border w3-cell-row" style="width: 500px; z-index: +1; position:relative;background-color: white;" >
					<div class="w3-theme-d5  w3-cell">
						<h2 class="w3-padding w3-opacity">Login</h2><br/>
					</div>
					<div class="w3-container w3-cell">
					<form action="loginauth.php" method="post" enctype="text" >
						   <br/>
						   	<div class="logedout" >
						   		    <?php 
								    	if(array_key_exists('login_message', $GLOBALS))
								    	echo $GLOBALS['login_message'];
								    ?>
						   	</div>
						   <br/>

							<div class="group">      
						      <input type="text" name="usr_id" required>
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>User Id</label>
						    </div>
						    <div class="group">      
						      <input type="text" name="pass" required>
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Password</label>
						    </div>

						    <p>
								&emsp;<button type="send" class="w3-btn w3-right w3-ripple btn w3-hover-green" name="Login" value="Login"> Login</button>
							</p>
						<br/>
					</form>
					</div>
				</div>
			</div>
		</div>
		<br/>
		<footer class="w3-container w3-theme-d5 ">
			<p>
				<a>By Shivam, Anand, Shivani, Anoop</a>
			</p>
		</footer>
	</body>
</html>


