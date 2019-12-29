<?php

include('config/connection.php');
include('functions/inc/session.php');
include('functions/inc/header.php');


?>
    <section id="results">
        <div class="container">
        <?php
            if ($_SESSION['userType'] > 1) {
                echo '
                <div class="center" style="padding-bottom: 50px;">
                    <button id="showbtn" class="uk-button uk-button-primary center">SHOW NAMES</button>
                </div>
                        ';
            }
            
        ?>
            <table class="uk-table uk-table-small uk-table-striped" style="width: 700px; margin: 0 auto;">
            <thead>
                <tr>
                    <th>Candidate Name</th>
                    <th>PartyList</th>
                    <th class="uk-table-shrink center">Votes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($con, "SELECT * FROM positions");
                    while ($result = mysqli_fetch_array($query)) {
                        $key = $result['id'];

                        $get = mysqli_query($con, "SELECT * FROM candidates WHERE positionID = '$key' ORDER BY votes DESC");
                        while ($row = mysqli_fetch_array($get)) {
                            extract($row);

                            echo '
                            <tr>
                                <td><span class="name hidden">'. $firstname .' '. $lastname .'</span><span class="tempo"">Anonymous Candidate</span></td>
                                <td>'. $result['position'] .'</td>
                                <td class="center">'. $votes .'</td>
                            </tr>
                                ';
                        }
                    }
                ?>
                
            </tbody>
            </table>
            
            
        </div>
    </section>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">


    const showbtn = document.querySelector('#showbtn').addEventListener('click', _ => {
        names = document.querySelectorAll('.name')
        tempo = document.querySelectorAll('.tempo')
        for (i = 0, sple = names.length; i < sple; i++) {
            names[i].classList.remove('hidden')
            tempo[i].classList.add('hidden')
        }
    })

    
</script>
</body>
</html>