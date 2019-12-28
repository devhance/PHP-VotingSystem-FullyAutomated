<?php

error_reporting(0);
if ($message['error']) {
    echo '<div class="ui negative message">'. $message['error'] .'</div>';
}
else if ($message['success']) {
    echo '<div class="ui positive message">'. $message['success'] .'</div>';
}