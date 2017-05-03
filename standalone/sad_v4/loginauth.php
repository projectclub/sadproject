<?php
	session_start();
	$_SESSION["usr_id"] =$_POST['usr_id'];
	$pass = $_POST['pass'];

	include 'connection.php';

	$query = "SELECT account_type FROM `login` WHERE id=".$_SESSION["usr_id"]." AND pass='".$pass."';";
	$result = mysqli_query($conn,$query);
	$account_type = mysqli_fetch_row($result)[0];
	$_SESSION["account_type"]=$account_type;
	if($account_type!=NULL)	
	{
		echo "Successfully loged in as " ;
		echo $account_type;
		//$attributes='usr_id='.$_SESSION["usr_id"];
		if($account_type=='teacher')
		{
			header("location:thome.php");
		}
		elseif ($account_type=='student')
		{
			header("location:shome.php");
		}
		elseif ($account_type=='admin')
		{
			header("location:../sadproject/student_entry.php");
		}
		else
		{
			echo "ERROR OCCURED IN THE DATABASE";
			echo "PLEASE CONTACT THE DEVELOPER";
			// remove all session variables
			session_unset();

			// destroy the session 
			session_destroy(); 
		}
	}
	else
		echo "\nUser id and password does not macth any account";

?>