<?php
	$usr_id =$_POST['usr_id'];
	$pass = $_POST['pass'];

	$conn = mysqli_connect("localhost", "root", "", "ams");
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySql: " . mysqli_connect_error(); 
	}

	$query = "SELECT account_type FROM `login` WHERE id='$usr_id' AND pass='$pass';";
	$result = mysqli_query($conn,$query);
	$account_type = mysqli_fetch_row($result)[0];
	if($account_type!=NULL)	
	{
		echo "Successfully loged in as " ;
		echo $account_type;
		$attributes='usr_id='.$usr_id;
		if($account_type=='teacher')
		{
			header("location:thome.php?".$attributes);
		}
		elseif ($account_type=='student')
		{
			header("location:shome.php?".$attributes);
		}
		elseif ($account_type=='admin')
		{
			header("location:../sadproject/student_entry.php?".$attributes);
		}
		else
		{
			echo "ERROR OCCURED IN THE DATABASE";
			echo "PLEASE CONTACT THE DEVELOPER";
		}
	}
	else
		echo "\nUser id and password does not macth any account";

?>