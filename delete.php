<?php

if ( isset( $_GET['id'] ) && $_GET['id'] != '' ) {
    $d_id = $_GET['id'];
    require 'db.php';

    $sql = "DELETE FROM rating WHERE id=$d_id";
    $query = $con->query( $sql );

    if ( $query ) {
        header( "location:index.php" );
    } else {
        echo 'Data Not Deleted';
    }

}
