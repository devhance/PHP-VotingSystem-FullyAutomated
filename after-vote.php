<?php
    
    include('functions/inc/session.php');
    include('functions/inc/header.php');
    
?>

    <section id="after-vote">
        <div class="container center">
            <div class="card">
                <span uk-icon="check"></span>
                <h2 class="ui header">Vote Submitted!</h2>
                
                <p>Thank you for voting.</p>
                <p>Please wait for the end of the voting period for the results.</p>
                <a href="results.php" class="uk-button uk-button-primary">RESULTS</a><br /><br />
                <a href="functions/logout.php" class="uk-button uk-button-default">LOGOUT</a>
            </div>
        </div>
    </section>

    <script src="uikit/dist/js/uikit-icons.min.js"></script>
    </body>
    </html>
    