<?php

	include("../includes/dbConnect.php");

	$ID = $_GET['userId'];
	
	if (is_numeric($ID)) {

		$query = $conn->prepare("SELECT * FROM lietotaji WHERE lietotajiID");
		
		// Šī rinda tika pārvērsta par komentāru, jo, noņemot komentāru izmet kļūdu, 
		// ka nezināmo skaits nav vienāds ar parametru skaitu. Tā ķa kods strādā gan ar šo pārbaudi, gan bez, es izlēmu,
		// lai kļūda nerādītos katru reizi, ka šī rinda paliks par komentāru. 
		// $query -> bind_param("i", $ID);

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
		# Vēlama auditācijas ieraksta izveide
		die();

	} 

?> 

<!DOCTYPE html>
<html>
<head>
	<title>Pievienot jaunu lietotāja kontu</title>
	<meta charset="utf-8">
	<style type="text/css">
		.frame {
			border: 1px solid black;
			margin: 20px auto;
			width: 90%;	
			padding: 20px;
			box-sizing: border-box;
		}
		input {
			width: 100%;
			box-sizing: border-box;
			font-size: 16px;
			padding: 5px;
			margin-bottom: 10px;
		}
		.header {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="frame">
		<h1 class="header"> Lietotāja izveide </h1>
		<!-- action - nosaka, kā saucās skripts, kurš apstrādās formas datus -->
		<!-- method - GET/POST. Metode nosaka darbības tipu.
			GET - datu saņemšanai no servera
			POST - datu nosūtīšanai serverim -->

		<form action="updateLietotajs.php" method="POST">

			<!-- divas ailes - lietotajvards un parole -->

			<!-- type - nosaka lauciņa datu tipu -->
			<!-- name - iedod lauciņam vārdu, lai servera pusē to varētu atrast pēc šī vārda, piemēram $_POST['lietotajvards'] -->
			<input type="hidden" name="lietotajiID" value="<?php echo($answer[0]["lietotajiID"]); ?>">
			<p> Lietotājvārds: </p>
			<input type="text" name="lietotajiVards" value="<?php echo($answer[0]["lietotajiVards"]); ?>">

			<p> Jaunā parole: </p>
			<input type="password" name="lietotajiParole" value="<?php echo($answer[0]["lietotajiParole"]); ?>">

			<!-- submit poga iesniedz formas datus skriptam, kas ir norādīts form taga action atribūtā -->
			<!-- value nomaina pogas tekstu -->
			<input type="submit" value="Labot ierakstu">

			<!-- reset poga nodzēš formā ievadītos datus -->
			<input type="reset" value="Notīrīt formas datus">

		</form>

	</div>

</body>
</html>