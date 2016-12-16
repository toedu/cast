<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php' ?>
    <link rel="stylesheet" type="text/css" href="flash/history/history.css" />
</head>

<body>

<?php include 'include/nav.php' ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 cast-cam">
            <div id="flashContent">
                <p>
                    To view this page ensure that Adobe Flash Player version
                    11.1.0 or greater is installed.
                </p>
                <script type="text/javascript">
                    var pageHost = ((document.location.protocol == "https:") ? "https://" : "http://");
                    document.write("<a href='http://www.adobe.com/go/getflashplayer'><img src='"
                        + pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" );
                </script>
            </div>
        </div>
        <div class="col-md-4 cast-info">
            <h5>write the channel name:</h5>
            <input type="text"/>
            <div>
                <button class="btn btn-lg btn-primary">start</button>
            </div>


        </div>

    </div>

</div>
<!-- /.container -->

<div class="container">
    <hr>
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script type="text/javascript" src="flash/history/history.js"></script>
<script type="text/javascript" src="flash/swfobject.js"></script>
<script type="text/javascript">
    // For version detection, set to min. required Flash Player version, or 0 (or 0.0.0), for no version detection.
    var swfVersionStr = "11.1.0";
    // To use express install, set to playerProductInstall.swf, otherwise the empty string.
    var xiSwfUrlStr = "flash/playerProductInstall.swf";
    var flashvars = {};
    var params = {};
    params.quality = "high";
    params.bgcolor = "#000000";
    params.allowscriptaccess = "sameDomain";
    params.allowfullscreen = "true";
    var attributes = {};
    attributes.id = "Main";
    attributes.name = "Main";
    attributes.align = "middle";
    swfobject.embedSWF(
        "flash/Main.swf", "flashContent",
        "100%", "100%",
        swfVersionStr, xiSwfUrlStr,
        flashvars, params, attributes);
    // JavaScript enabled so display the flashContent div in case it is not replaced with a swf object.
    swfobject.createCSS("#flashContent", "display:block;text-align:left;");
</script>

</body>

</html>
