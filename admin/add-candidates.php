<?php
    require ('../functions/admin/admin.php');

    if (isset($_POST['candidatebtn'])) {
        $candidate = new Candidate($_POST);
        $message = $candidate->validateForm();

    }


    include('../functions/inc/admin-header.php');
?>

    <section id="admin">
        <div class="ui very padded container">
            <div class="container">
                <div class="ui warning message">
                    <div class="header">Notice</div>
                    You must create the partylists and positions before adding candidates.
                </div>
                <form action="" class="ui very padded form segment raised" method="post">
                    <h3 class="ui dividing header">Add Candidates</h3>
                    <div class="two fields">
                        <div class="field">
                            <label>Firstname</label>
                            <input type="text" name="firstname" required>
                        </div>
                        <div class="field">
                            <label>Lastname</label>
                            <input type="text" name="lastname" required>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Position</label>
                            <select name="position">
                                <option value="">Select...</option>
                            <?php
                                $query = mysqli_query($con, "SELECT * FROM positions");
                                while ($row = mysqli_fetch_array($query)) {
                                    echo '<option value="'. $row['id'] .'">'. $row['position'] .'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="field">
                            <label>Party List</label>
                            <select name="partylist">
                                <option value="">Select...</option>
                            <?php
                                $query = mysqli_query($con, "SELECT * FROM partylist");
                                while ($row = mysqli_fetch_array($query)) {
                                    echo '<option value="'. $row['id'] .'">'. $row['name'] .'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="two fields">
                            <div class="field">
                                <label>Year Level</label>
                                <input type="text" name="yearLevel" required>
                            </div>
                            <div class="field">
                                <label>Photo</label>
                                <input type="text" name="photo" required>
                            </div>
                        </div>
                    <?php 
                        include('../functions/inc/messages.php');
                    ?>
                    <button type="submit" name="candidatebtn" value="1" class="ui primary button">Add Candidate</button>
                </form>
            </div>
        </div>
    </section>
    
        
</body>
</html>