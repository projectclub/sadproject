<?php
	session_start();
	if(isset($_SESSION['logedout']) && $_SESSION['logedout']) {

		$GLOBALS['login_message']="<h4 style='color:red;'>Please Login!</h4>";
	}
	else if(isset($_SESSION['logedout_success']) && $_SESSION['logedout_success']) {
			$GLOBALS['login_message']="<h4 style='color:red;'>Loged out successfully!</h4>";
	}
	else if(isset($_SESSION['incorrect_cred']) && $_SESSION['incorrect_cred']){
			$GLOBALS['login_message']="<h4 style='color:red;'>User id and password does not macth any account!</h4>";
		;
	}
	else{
		;
	}
		// remove all session variables
	session_unset();

	// destroy the session 
	session_destroy(); 

?>

<!DOCTYPE html>


<html>
<head>
	<title>AMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../w3/w3css/4/w3.css">
      <link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
      <link rel='stylesheet' href='../css/opensan.css'>
      <link rel='stylesheet' href='../font-awesome-4.7.0/css/font-awesome.min.css'>

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

		

	</style>

	<link rel="stylesheet" href="float_input.css">
	<link rel="stylesheet" href="pg_frame.css">
</head>
	<body>
		<div id="main-wrapper">
		<!-- Navigation bar-->
		<?php 
			$account_type="student";
			include 'nav_bar.php'; 
		?>		
		<!-- Main content -->
		<div class="w3-container w3-content" style="max-width:1400px;top:100px;position:relative;">    

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
		<!--Footer-->
		<?php include 'footer.php';?>
	</div>
	</body>
</html>


