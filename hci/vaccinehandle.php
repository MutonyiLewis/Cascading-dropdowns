<?php require 'conn/conn.php';


if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$secondname = $_POST['secondname'];
	$phonenumber = $_POST['contact'];
	$email = $_POST['email'];

	if (!empty($_POST['county'])) {
			$county = "Nairobi";
	}else{
		echo 'please select a county';
	}	

	if (isset($_POST['subcounty'])) {
		$subcounty = $_POST['subcounty'];
	}else{
		$subcounty = "upperhill";
	}

	if (isset($_POST['station'])) {
		$station = $_POST['station'];
	}else{
		$station = "kenyatta Hospital";
	}

	$vaccine_date = date('Y-m-d', strtotime($_POST['vaccine_date']));


	$sql = "INSERT INTO vaccine_registrations SET 
	firstname = '$firstname',
	secondname = '$secondname',
	phone_number = '$phonenumber',
	email = '$email',
	county = '$county',
	sub_county = '$subcounty',
	station = '$station',
	vaccination_date = '$vaccine_date'
	";

	print_r($sql);
	$res = mysqli_query($conn, $sql);

	if ($res==true) {

		$_SESSION['registered'] = "registered successfully";
		header('location:vaccine.php');
	}


}




?>