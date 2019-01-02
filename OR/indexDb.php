<html>
<head>
<meta http-equiv="refresh" content="1;URL='index.html'" />
</head>

<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$institution=$_POST["institution"];
$designation=$_POST["designation"];
$dept=$_POST["department"];
$address=$_POST["address"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$iste=$_POST["iste"];


	$link = mysqli_connect("localhost","id3452094_student","student","id3452094_student");
	
	if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
	
	// Check connection
	if($link === false){
		echo '<div class="col-md-11 work-right-w3-agileits">
						<h3><span>Unable to send Message.</span></h3></div>';
	}

	// Attempt insert query executio
	$sql = "INSERT INTO students (fname,lname,institution,designation,dept,address,email,phone,iste) VALUES ('".$fname."', '".$lname."', '".$institution."', '".$designation."', '".$dept."', '".$address."', '".$email."', '".$phone."', '".$iste."')";

	if(mysqli_query($link, $sql)){
		$to_email = $email;
		$subject = 'Python & R Programming Registeration';
		$message = 'Thank you for registering. Please read our brochure for more details.';
		$headers = 'From: chetan78@gmail.com';
		mail($to_email,$subject,$message,$headers);
		echo '<div class="col-md-11 work-right-w3-agileits">
						<h3><span>Registered Successfully</span></h3></div>';
	} else{
		echo '<div class="col-md-11 work-right-w3-agileits">
						<h3><span>Message sending failed.</span></h3></div>';
	}
	 
	// Close connection
	mysqli_close($link);

?>