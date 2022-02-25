<?php

//Diese Datei erstellt die Variable $conn, welche für die verbindung zur DB gebraucht wird.

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword= "";
$dbName = "mitgliederverwaltungdb";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
$test ="hallo";