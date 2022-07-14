<!doctype html>
<html lang="en">
  <head>
    <title>PHP Jquery Star Rating System With Database</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .star{
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            color: #333333;
            text-decoration: none;
        }
        .star::before{
            content: "\f006";
        }
        .star_hover{
            color:#fb2a00;
        }
        .star_hover::before{
            content: "\f005";
        }
    </style>
  </head>
  <body class="bg-light p-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card text-start">
                  <div class="card-header">
                    <h2>Star Rating System</h2>
                  </div>
                  <div class="card-body">
                    <p>Add Rating on PHP From here</p>
                    <div class="rating">
                        <a href="#" data-rating="1" class="star"></a>
                        <a href="#" data-rating="2" class="star"></a>
                        <a href="#" data-rating="3" class="star"></a>
                        <a href="#" data-rating="4" class="star"></a>
                        <a href="#" data-rating="5" class="star"></a>
                    </div>
                    <form id="rating_form" action="" method="post">
                        <input type="text" name="name" id="" placeholder="Your name">
                        <input type="hidden" id="total_rating" name="total_rating" value="">
                        <button type="submit" class="btn btn-success">Add Rating</button>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-start">
                  <div class="card-header">
                    <h2>All Star Rating</h2>
                  </div>
                  <div class="card-body">
                    <div class="data_record"></div>
                    <button id="load_data" class="btn btn-info">Load Data</button>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.star').on( 'mouseenter', function(){
           var $data_rating = $(this).attr('data-rating') ;
               $_data_rating = parseInt($data_rating) - 1

            $(".star:lt(" +$data_rating +" )").addClass('star_hover');
            $(".star:gt(" +$_data_rating  +" )").removeClass('star_hover');
        }).on('click', function(e){
            e.preventDefault();
            var $data_rating = $(this).attr('data-rating')
            $('#total_rating').val($data_rating);
        })
        $('#rating_form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: (response) =>{
                    alert(response);
                    $(this).trigger('reset');
                    $('.star').removeClass('star_hover')
                }
            })
        })

        $.ajax({
                type: "GET",
                url: "lists.php",
                dataType: "html",
                success: function (response) {
                $(".data_record").html(response);
                }
            });
        $("#load_data").on('click', function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "lists.php",
                dataType: "html",
                success: function (response) {
                $(".data_record").html(response);
                }
            });
        })

    </script>

  </body>
</html>