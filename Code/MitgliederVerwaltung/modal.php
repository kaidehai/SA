<!-- Modal -->
<div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mitglied hinzufügen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="includes/inc.addUser.php" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="vorname" class="form-control" placeholder="Vorname">
                        </div>
                        <div class="col">
                            <input type="text" name="nachname" class="form-control" placeholder="Nachname">
                        </div>
                        <input type="date" id="geburtsdatum" name="geburtsdatum">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="LoadEditData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="LoadEditData" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LoadEditData">Mitglied editieren2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modalEdit">



            </div>
        </div>
    </div>
</div>