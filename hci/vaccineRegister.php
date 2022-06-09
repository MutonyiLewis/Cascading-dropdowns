<?php 
require 'conn/conn.php';
if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$secondname = $_POST['secondname'];
	$phonenumber = $_POST['contact'];
	$email = $_POST['email'];
	if (!empty($_POST['county'])) {
		$county_id = $_POST['county'];
		$sql = "SELECT county_name FROM counties WHERE county_id='$county_id'";
		$res = mysqli_query($conn, $sql);
		while ($row = $res->fetch_assoc()) {
            $county_name = $row['county_name'];
         }
	}
    if (!empty($_POST['subcounty'])) {
		$subcounty_id = $_POST['subcounty'];
		$sql1 = "SELECT constituency_name FROM subcounties WHERE subcounty_id='$subcounty_id'";
		$res1 = mysqli_query($conn, $sql1);
		while ($row1 = $res1->fetch_assoc()) {
            $constituency_name = $row1['constituency_name'];
         }
	}
	if (!empty($_POST['station'])) {
		$station_id = $_POST['station'];
		$sql2 = "SELECT ward FROM station WHERE station_id='$station_id'";
		$res2 = mysqli_query($conn, $sql2);
		while ($row2 = $res2->fetch_assoc()) {
            $station_name = $row2['ward'];
         }
	}
	
	$vaccine_date = date('Y-m-d', strtotime($_POST['vaccine_date']));


	$sql3 = "INSERT INTO `vaccine_registrations`(`firstname`, `second name`, `phone_number`, `email`, `county`, `sub_county`, `station`, `vaccination_date`) VALUES ('$firstname','$secondname','$phonenumber','$email','$county_name','$constituency_name','$station_name','$vaccine_date')";

	$res3 = mysqli_query($conn, $sql3);

	echo "<br>";

	if ($res3 == true) {
		    $_SESSION['registered'] = "<div class=''>Registered Successfully</div>";
		    header('location:vaccine.php');
	}else{
		echo "failed";
	}

}








?>