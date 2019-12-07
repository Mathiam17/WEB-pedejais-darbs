<?php


include('../includes/dbConnect.php');


$ID = $_POST['lietotajiID'];
$lietotajiVards = $conn->real_escape_string($_POST['lietotajiVards']);
$lietotajiParole = $conn->real_escape_string($_POST['lietotajiParole']);


$query = $conn->prepare("UPDATE lietotaji SET lietotajiVards=?, lietotajiParole=? WHERE lietotajiID=?");

$query->bind_param("ssi", $lietotajiVards, $lietotajiParole, $ID);


if(!$query->execute()) {

	echo "<p> Vaicājuma izpilde neizdevās! </p>";
	echo "<p> Kļūdas kods: DB-UPDATE-001 </p>";
	echo (mysqli_error($conn));
	die();

}

echo ("	<script LANGUAGE='JavaScript'>
    	window.alert('Lietotāja dati ir veiksmīgi izlaboti!');
    	window.location.href='showAllLietotajs.php';
    	</script>
   	");

?>