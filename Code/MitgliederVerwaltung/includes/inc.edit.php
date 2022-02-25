<?php
if (isset($_POST['function'])) {
    require_once 'inc.connect.php';
    $index = $_POST['delete_Post'];

    $sql = 'SELECT * FROM tmitglieder WHERE MitID=' . $index . ';';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $MitID = $row["MitID"];
            $MitVorname = $row["MitVorname"];
            $MitNachname = $row["MitNachname"];
            $MitGeburtstag = $row["MitGeburtstag"];
            $VerID = $row["VerID"];

            echo '
                <form action="includes/inc.save-edituser.php" method="POST">
                <div class="form-row">
                <div class="col" stlye="display:none !important;">
                        <input type="hidden" stlye="display:none !important;" name="MitID" class="form-control" placeholder="Vorname" value="' . $MitID . '">
                </div>
                    <div class="col">
                        <input type="text" name="vorname" class="form-control" placeholder="Vorname" value="' . $MitVorname . '">
                    </div>
                    <div class="col">
                        <input type="text" name="nachname" class="form-control" placeholder="Nachname" value="' . $MitNachname . '">
                    </div>
                    <input type="date" id="geburtsdatum" name="geburtsdatum" value="' . $MitGeburtstag . '">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Understood</button>
                </div>
            </form>';
        }
    }
} else {
    header('Location: ../index.php');
}
