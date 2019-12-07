<?php


$ID = $_GET['lietotajiID'];

include('../includes/dbConnect.php');

if (is_numeric($ID)) {

		$query = $conn->prepare("SELECT * FROM lietotaji WHERE lietotajiID");

		$query -> bind_param("i", $ID);

		if(!$query->execute()) {

			echo "<p> Vaicājuma izpilde neizdevās! </p>";
			echo "<p> Kļūdas kods: DB-SELECT-003 </p>";
			echo (mysqli_error($conn));
			die();

		}

		$result = $query->get_result();

		while ($row = $result->fetch_assoc()) {

			$answer[] = $row;

		}

	}

	else {

		echo "<p> Vaicājuma parametrs nav vesels skaitlis! </p>";
		echo "<p> Kļūdas kods: DB-SELECT-002 </p>";
		die();

	}
	

$query = $conn->prepare("DELETE FROM lietotaji WHERE lietotajiID=?");

$query->bind_param("i", $ID);



if(!$query->execute()) {

	echo "<p> Vaicājuma izpilde neizdevās! </p>";
	echo "<p> Kļūdas kods: DB-DELETE-001 </p>";
	echo (mysqli_error($conn));
	die();

}

exit();

?>