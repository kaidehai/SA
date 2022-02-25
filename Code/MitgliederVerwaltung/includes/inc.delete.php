<?php
if (isset($_POST['function'])) {
    require_once 'inc.connect.php';
    $index = $_POST['delete_Post'];

    $sql = 'DELETE FROM tmitglieder WHERE MitID=?;';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit('Something went wrong!');
    } else {
        mysqli_stmt_bind_param($stmt, 's', $index);
        mysqli_stmt_execute($stmt);
        exit('success' . $sql . $index);
        header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
}
