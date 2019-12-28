<?php
    require ('../functions/admin/admin.php');

    if (isset($_POST['partylistbtn'])) {
        // add to db
        $partylist = new PartyList($_POST);
        $message = $partylist->validatePartylist();
    }

    if (isset($_POST['position'])) {
        // add to db
        $partylist = new Position($_POST);
        $message = $partylist->validatePosition();
    }


    include('../functions/inc/admin-header.php');
?>


    <section id="admin">
        <div class="ui very padded container">
            <div class="container">
            
                <form action="" class="ui very padded form segment raised" method="post"> 
                    <!-- partylist  -->
                    <h3 class="ui dividing header">Add PartyLists</h3>
                    <div class="field">
                        <label>PartyList Name</label>
                        <input type="text" name="partylist" required>
                    </div>
                    <?php 
                        include('../functions/inc/messages.php');
                    ?>
                    <button type="submit" name="partylistbtn" class="ui primary button">Add Partylist</button>
                </form>
                    <!-- positions -->
                <form action="" class="ui very padded form segment raised" method="post">
                    <h3 class="ui dividing header">Create Positions</h3>
                    <div class="two fields">
                        <div class="field twelve wide">
                            <label>Position</label>
                            <input type="text" name="position" required>
                        </div>
                        <div class="field four wide">
                            <label>Available</label>
                            <input type="number" name="available" value="1" required>
                        </div>
                    </div>
                    <?php 
                        include('../functions/inc/messages.php');
                    ?>
                    <button type="submit" name="positionbtn" class="ui primary button">Add Position</button>
                </form>
            </div>
        </div>
    </section>
    
        
</body>
</html>