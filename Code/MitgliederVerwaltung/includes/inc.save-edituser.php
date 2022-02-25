<?php
include 'inc.connect.php';
if (isset($_POST["submit"])) {
    $MitID =  $_POST["MitID"];
    $vorname =  $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $geburtsdatum = $_POST["geburtsdatum"];

    $sql = "UPDATE tmitglieder SET MitVorname=?, MitNachname=?, MitGeburtstag=? WHERE MitID=$MitID;";
    echo $sql;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit("Something went wrong!");
    } else {

        mysqli_stmt_bind_param($stmt, "sss", $vorname, $nachname, $geburtsdatum);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php");
    }

    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
