<?php
require 'db.php';

if ( isset( $_POST ) && $_POST['total_rating'] > 0 ) {
    $name = $_POST['name'];
    $rating = $_POST['total_rating'];

    // Insert Data to Database;
    $sql = "INSERT INTO `rating`(`name`, `rating`) VALUES ('$name','$rating')";

    $query = $con->query( $sql );

    if ( $query ) {
        echo 'Rating Added';
    } else {
        echo "data Not Setup";
    }

} else {
    echo 'Please fill the data';
}
