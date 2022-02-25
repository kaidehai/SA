<?php

function fetchData($sql)
{
    include 'inc.connect.php';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $output = [];

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($output, $row);
        }
        return $output;
        exit();
    } else {
        echo '<p style="color:red">Die Datenbank hat keine Daten.</p>';
    }
}
