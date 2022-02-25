<?php
include 'inc.connect.php';
if (isset($_POST["submit"])) {

    $vorname =  $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $geburtsdatum = $_POST["geburtsdatum"];

    if (empty($vorname) || empty($nachname)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }

    $vorname = mysqli_real_escape_string($conn, $_POST["vorname"]);
    $nachname = mysqli_real_escape_string($conn, $_POST["nachname"]);
    $geburtsdatum = mysqli_real_escape_string($conn, $_POST["geburtsdatum"]);

    echo "Ausgabe: " . $vorname . " " . $nachname . " " . $geburtsdatum;

    $query;

    if (empty($geburtsdatum)) {
        $query = "INSERT INTO TMitglieder(MitVorname, MitNachname) VALUES('$vorname', '$nachname')";
    } else {
        $query = "INSERT INTO TMitglieder(MitVorname, MitNachname, MitGeburtstag) VALUES('$vorname', '$nachname', '$geburtsdatum')";
    }

    if (mysqli_query($conn, $query)) {
        echo 'Data Inserted';
    }
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
