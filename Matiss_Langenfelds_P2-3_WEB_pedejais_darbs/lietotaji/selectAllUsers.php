<?php

include('../includes/dbConnect.php');

$query = $conn->query("SELECT * FROM lietotaji;");



while ($row = $query->fetch_assoc()) {
	$answer[] = $row;
}


$answer = json_encode($answer);

echo($answer);

?>