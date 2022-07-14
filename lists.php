<?php

if ( isset( $_GET ) ) {
    require 'db.php';

    $sql = "SELECT * FROM rating";

    $query = $con->query( $sql );?>

<div class="box">
<table class="table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Rating</th>
        <th>Date</th>
        <th>Remove</th>
    </thead>
    <tbody>

<?php

    while ( $row = mysqli_fetch_assoc( $query ) ) {?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td class="rating" data-star-rate="<?php echo $row['rating'] ?>" >
            <b><?php echo $row['rating'] ?></b>
        </td>
        <td><?php echo $row['time'] ?></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>
 <?php }

    ?>
</tbody>
</table>
<script>

    $('td.rating').each(function(i){
        var $rating = $(this).attr('data-star-rate');
        for(var i = 1; i<=$rating; i++){
           $(this).append('<i class="star star_hover"></i>');
        }
    })
</script>
</div>
<?php
} else {
    echo 'you are not allow to access data from here!';
}
