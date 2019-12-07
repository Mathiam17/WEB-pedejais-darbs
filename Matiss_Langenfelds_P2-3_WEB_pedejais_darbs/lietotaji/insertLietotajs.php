<?php


include('../includes/dbConnect.php');


$lietotajiVards = $conn->real_escape_string($_POST['lietotajiVards']);
$lietotajiParole = $conn->real_escape_string($_POST['lietotajiParole']);


$query = $conn->prepare("INSERT INTO lietotaji (lietotajiVards, lietotajiParole) 
				VALUES (?,?)");

$query->bind_param("ss", $lietotajiVards, $lietotajiParole);



if(!$query->execute()) {

	echo "<p> Vaicājuma izpilde neizdevās! </p>";
	echo "<p> Kļūdas kods: DB-INSERT-001 </p>";
	echo (mysqli_error($conn));
	die();

}

echo ("	<script LANGUAGE='JavaScript'>
    	window.alert('Lietotājs ir veiksmīgi izveidots!');
    	window.location.href='newLietotajsForm.php';
    	</script>
   	");

?>