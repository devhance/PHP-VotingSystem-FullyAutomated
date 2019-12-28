<?php

    require('functions/validator.php');
    if (isset($_POST['submit'])) {

        $validation = new LoginValidator($_POST);
        $errors = $validation->validateForm();
    }


    include('functions/inc/header.php');
?>


    <section class="login">
        <div class="container center">
            <form action="" class="ui very padded form segment" method="post"> 
                <h2 class="ui header">Login</h2>
                <div class="field">
                    <label>Student ID</label>
                    <input type="text" name="username" autocomplete="off">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" autocomplete="off">
                </div>
                <?php  
                    if (!empty($errors)) {
                        
                        foreach($errors as $error) {
                            echo '<div class="ui negative message">'. $error .'</div>';
                        }
                    }
                ?>
                <button type="submit" name="submit" class="ui primary button">Login</button>
            </form>
        </div>
    </section>
    
        
</body>
</html>