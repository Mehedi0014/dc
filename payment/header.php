<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script>
    $(function () {
        var shrinkHeader = 300;
        $(window).scroll(function () {
            var scroll = getCurrentScroll();
            if (scroll >= shrinkHeader) {
                $('.navstick').addClass('shrink');
            }
            else {
                $('.navstick').removeClass('shrink');
            }
        });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    });
</script>

<?php
$base_url = 'http://crystalhomestay.com';
$_SESSION['base_url'] = $base_url;
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crystal Estate</title>

        <link rel="stylesheet" href="system/css/global.css">
        <link class="colour" rel="stylesheet" href="system/css/colour-blue.css">
        <link class="pattern" rel="stylesheet" href="system/css/pattern-china.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
         
        
    </head>
    <!--    <div id="header">-->



    <!-- Navigation | START -->
    <!--        <div class="wrapper">
                <div class="nav-container"> -->
    <div id="nav" class="navstick">
        <div class="centre">

            <a href="<?php echo $base_url; ?>" class="logo"><img alt="" src="system/images/logo.png" /></a>

            <nav>
                <ul>
                    <li class="mobile"><a href="booking.php" class="navbook">Book Online</a></li>
                    <li><a href="<?php echo $base_url; ?>">Home</a>
                    </li>
                    <li><a href="accommodation.php">Rooms</a>
                    </li>
                    <li><a href="gallery.php">Gallery</a>
                    </li>
                    <li><a href="activity.php">Activity</a>
                    </li>
                    <li><a href="list-holiday.php">Holiday List</a>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <a id="pull"><i class="fa fa-bars"></i></a>
            </nav>
            <a href="booking.php" class="book"><span data-hover="Book Online">Book Online</span> <i class="fa fa-check-circle"></i></a>
            <div class="shadow"></div>
        </div>

    </div>



