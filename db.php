<?php

$con = new mysqli( 'localhost', 'root', '', 'star_rating' );

if ( $con->connect_error ) {
    echo $con->connect_error;
}
