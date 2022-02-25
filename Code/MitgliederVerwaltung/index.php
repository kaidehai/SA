<?php
include_once 'includes/inc.connect.php';
include_once 'includes/inc.functions.php';
require_once 'modal.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mitgliederverwaltung</title>
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
</head>

<body>

    <?php
    if (isset($_GET["error"])) {
        $message = $_GET["error"];
        if ($message == "emptyfields") {
            echo "<script type='text/javascript'>alert('Sie müssen Vor- und Nachname ausgefüllt haben');</script>";
        }
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Mitgliederverwaltung</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form action="login.php" method="POST" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Liste</h1>
        <!-- Button trigger modal -->
        <div>
            <button style="float: right;" type="button" class="btn btn-primary text-right " data-bs-toggle="modal" data-bs-target="#addUser">
                hinzufügen
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">MitID</th>
                    <th scope="col">MitVorname</th>
                    <th scope="col">MitNachname</th>
                    <th scope="col">MitGeburtstag</th>
                    <!-- <th scope="col">VerID</th> -->
                    <th scope="col">Löschen</th>
                    <th scope="col">Editieren</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM TMitglieder;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "MySQL Error";
                } else {
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        $MitID = $row["MitID"];
                        $MitVorname = $row["MitVorname"];
                        $MitNachname = $row["MitNachname"];
                        $MitGeburtstag = $row["MitGeburtstag"];
                        /* $VerID = $row["VerID"]; */

                        echo '
                <tr>
                <th scope="row">' . $MitID . '</th>
                <td>' . $MitVorname . '</td>
                <td>' . $MitNachname . '</td>
                <td>' . $MitGeburtstag . '</td>
                <td><button class="btn btn-danger delete-button" id="' . $MitID . '">Löschen</button></td>
                <td><button class="btn btn-warning edit-button" id="' . $MitID . '" data-bs-toggle="modal" data-bs-target="#LoadEditData">Editieren</button></td>
                </tr>
              ';
                    }
                }

                ?>
            </tbody>
        </table>

        <footer class="pt-4 my-md-5 pt-md-5">
            <div style="float: right; position: sticky;1 bottom: 10px;" class="row">
                <div>
                    <ul class="list-unstyled text-small text-right flaot-right">
                        <p>Semester-Arbeit</p>
                        <p>Kantonsschule Frauenfeld</p>
                        <p>Christian Köhler</p>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('.delete-button').click(function() {
            var button_id = $(this).attr('id');
            $.ajax({
                url: "includes/inc.delete.php",
                type: "POST",
                dataType: 'text',
                data: {
                    function: 1,
                    delete_Post: button_id
                },
                success: function(response) {
                    location.reload(true);
                }
            });
            console.log("success");
        });

        $('.edit-button').click(function() {
            var button_id = $(this).attr('id');
            $.ajax({
                url: "includes/inc.edit.php",
                type: "POST",
                dataType: 'text',
                data: {
                    function: 1,
                    delete_Post: button_id
                },
                success: function(data) {
                    $('.modalEdit').html(data);
                    var myModal = document.getElementById('LoadEditData')
                }
            });
            console.log("success");
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>