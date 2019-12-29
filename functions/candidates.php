<?php

include ('config/connection.php');

class GetCandidate {
    public $data;

    public function __construct($data) {
        global $con;

        $sql = "SELECT 
                    candidates.*, 
                    pos.position, 
                    pos.available, 
                    plist.name
                FROM candidates 
                INNER JOIN positions as pos ON candidates.positionID = pos.id
                INNER JOIN partylist as plist ON candidates.partylist = plist.id
                WHERE positionID = '$data'";
        
        $query = mysqli_query($con, $sql);
        while ($result = mysqli_fetch_array($query)) {
            $count = mysqli_num_rows($query);
            extract($result);
            
            echo $count < 8 ? '<div class="col s12 m6">' : '<div class="col s12 m4 l3" style="max-width: 220px; height: 300px;">';   // adjust the cols depending on count
            echo '<div class="ui segment center aligned">';
            echo '<h3 class="ui dividing header grey-text text-darken-3"> '. $position .'</h3>';
            echo '<p><span>'. $firstname .' '. $lastname .'</span><br />';
            echo $name .' ('. $yearLevel .')</p>';
           
            // decides which input type to be used depending on the position
            if ($available != 1) {
                echo '<label><input class="uk-checkbox" type="checkbox" name="'. $id .'" value="'. $id .'" tabindex="0" class="hidden"></label> ';
            }
            else {
                echo '<div class="field">
                        <input class="uk-radio" type="radio" name="'. $position .'" value="'. $id .'">
                    </div>';
            }

            echo '</div>';
            echo '</div>';
        }
    }

    
}