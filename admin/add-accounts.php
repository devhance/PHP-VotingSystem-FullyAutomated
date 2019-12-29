<?php
    require ('../functions/admin/admin.php');

    if (isset($_POST['submitbtn'])) {
        // add to db
        $account = new Account($_POST);
        $message = $account->validateStudent();
    }
    include('../functions/inc/admin-session.php');
    include('../functions/inc/admin-header.php');
    include('../functions/inc/navbar.php');
?>


    <section id="admin">
        <div class="ui very padded container">
            <div class="container">
            <h3 class="ui dividing header">Add Accounts</h3>
                <form action="" class="ui very padded form segment" method="post"> 
                    <!-- login information  -->
                    <div class="two fields">
                        <div class="field">
                            <label>Student ID</label>
                            <input type="text" name="studentID" required>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>
                    </div>
                    <!-- personal information  -->
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
                    <div class="field">
                        <label>User Type</label>
                        <select name="userType">
                            <option value="1">Voter</option>
                            <option value="2">Administrator</option>
                        </select>
                    </div>
                    <?php 
                        include('../functions/inc/messages.php');
                    ?>
                    <button type="submit" name="submitbtn" class="ui primary button">Register</button>
                </form>
            </div>
        </div>
    </section>
    
        
</body>
</html>