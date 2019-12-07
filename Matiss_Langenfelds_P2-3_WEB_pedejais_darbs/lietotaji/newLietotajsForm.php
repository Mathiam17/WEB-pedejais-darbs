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
		
		<form action="insertLietotajs.php" method="POST">

			<p> Lietotājvārds: </p>
			<input type="text" name="lietotajiVards">

			<p> Parole: </p>
			<input type="password" name="lietotajiParole">

			
			<input type="submit" value="Saglabāt ierakstu">

	
			<input type="reset" value="Notīrīt formas datus">

		</form>

	</div>

</body>
</html>