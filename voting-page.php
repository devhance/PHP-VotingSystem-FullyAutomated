<?php
    session_start();
    
    require('functions/candidates.php');
    require('functions/vote.php');
    
    if (isset($_POST['votebtn'])) {
        $vote = new Vote($_POST);
    }
    
    include('functions/inc/header.php');
?>


    <section id="voting">
        <div class="container center">
            <form action="" class="ui very padded form segment raised" method="post"> 
                <?php
                    $getPositions = mysqli_query($con, "SELECT * FROM positions");
                    while ($row = mysqli_fetch_array($getPositions)) {
                        echo '<div class="row">';
                        $getCandidate  = new GetCandidate($row['id']);
                        echo '</div>';
                    }
                ?>
                <button type="submit" name="votebtn" class="ui negative button">Submit Your Vote</button> 
            </form>
        </div>
    </section>
       
</body>
</html>