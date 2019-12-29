<?php
  
    include('functions/inc/session.php');
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
                <button type="submit" name="votebtn" class="uk-button uk-button-primary">Submit Your Vote</button> 
            </form>
        </div>        
    </section>
       
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
     	var limit = 3;
		$('input.uk-checkbox').on('change', function() {
		   if($("input[type='checkbox']:checked").length > limit) {
		       this.checked = false;
               alert('You can only select ' + limit +' candidates.');
		   }
		});
</script>
</body>
</html>