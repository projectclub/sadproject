<?php
	$conn = mysqli_connect("localhost","root","","ams");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
		
	$q="SELECT roll, first_name, last_name FROM `student`" ;
	$result = mysqli_query($conn, $q);
    $row = mysqli_fetch_all($result);

    foreach ($row as  $value) {
    	# code...
    	printf("%s\t\t %s\t %s <br>", $value[0] ,$value[1],$value[2] );
    }
    mysqli_free_result($result);
    mysqli_close($conn);

?>