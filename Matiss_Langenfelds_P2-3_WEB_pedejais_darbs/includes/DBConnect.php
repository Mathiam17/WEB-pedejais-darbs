<?php


include('dbConfig.php');

$conn = new mysqli(SKALRUNI_ADRESE, SKALRUNI_LIETOTAJS, SKALRUNI_PAROLE, SKALRUNI_DB);


if ($conn->connect_error) {
    die("Savienojums neizdevās: " . $conn->connect_error);
} 


?> 
