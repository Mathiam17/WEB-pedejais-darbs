<!DOCTYPE html>
<html>
<head>
	<title>Lietotāju kontu saraksts</title>
	<meta charset="utf-8">
	<style type="text/css">
		.frame {
			border: 1px solid black;
			margin: 20px auto;
			width: 90%;	
			padding: 20px;
			box-sizing: border-box;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.4.1.js"   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="   crossorigin="anonymous"></script>
</head>
<body>

	<div class="frame">
		
		<table class="userList" id="output">
			<tr>
				<th>Lietotāja ID</th>
				<th>Lietotāja vārds</th>
				<th>Labot</th>
				<th>Dzēst</th>
			</tr>
		</table>

	</div>

</body>
	<script type="text/javascript">
   		$.get("selectAllUsers.php", function(data, status){
    		var dati = JSON.parse(data);
    		var output = "<tr>";
    		for (x=0; x<dati.length; x++) {

    			output += "<td>";
    			output += dati[x]['lietotajiID'];
    			output += "</td>";
    			output += "<td>";
    			output += dati[x]['lietotajiVards'];
    			output += "</td>";
    			output += "<td><button onclick='updateUser("+ dati[x]['lietotajiID'] +")'>Labot</button></td>";
    			output += "<td><button onclick='deleteUser("+ dati[x]['lietotajiID'] +")'>Dzēst</button></td>";   			
    			output += "</tr>";

    		}

    		$("#output").append(output);

  		});


   		function updateUser(lietotajiID) {

   			window.location.href="updateUser.php?userId=" + lietotajiID;

   		}

   		function deleteUser(lietotajiID) {

        if (confirm("Vai tiešām vēlaties izdzēst šo lietotāju? \n DATI TIKS NEATGRIEZENISKI IZDZĒSTI!!!") == true) {
          $.get("deleteUser.php", { lietotajiID : lietotajiID } ).done(function(data){


            alert("Lietotāja konts tika veiksmīgi izdzēsts!");
            window.location.reload();

          });
        } 

        else {

          alert("Darbība tika atcelta.");

        }

   		}

	</script>
</html>