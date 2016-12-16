<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php' ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/5.10.2/alt/video-js-cdn.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/ie8/1.1.1/videojs-ie8.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/5.10.2/video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/3.0.2/videojs-contrib-hls.js"></script>
</head>

<body>

<?php include 'include/nav.php' ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <video id="my_video_1" class="video-js vjs-default-skin" controls preload="auto" width="847" height="500"
                   data-setup='{}'>
                <source src="rtmp://cast.toedu.com/livepkgr/livestream" type="rtmp/mp4">
            </video>
        </div>
        <div class="col-lg-3">
            <div class="chatContent">
                <ul id="messages"></ul>
            </div>
            <div class="chatInput">
                <input type="text" id="input"/>
                <button class="btn btn-info" id="send">Chat</button>
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

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="http://192.168.33.20:3000/socket.io/socket.io.js"></script>
<script>
    var userName = "<?php echo($userName); ?>";
    var roomId = "<?php echo($roomId); ?>";
    var url = "http://192.168.33.20:3000/chat";

    if(userName){
        var socket = io(url);

        socket.on('connect', function () {
            console.log('connected')
            socket.emit('online',JSON.stringify({user:userName}));
        });

        socket.on('disconnect',function(){
            var msg = '<span style="color:#f00">disconnect from the server</span>';
            addMsg(msg)
        });

        socket.on('reconnect',function(){
            var msg = '<span style="color:#23ff00">reconnect successful</span>';
            addMsg(msg)
        });

        socket.on('join', function(user, list){
            console.log('join', user, list);
            var msg = '<span style="color:#3995ff">welcome '+ user +'!</span>';
            addMsg(msg);
        });

        socket.on('leave', function(user, list){
            console.log('leave', user, list);
            var msg = '<span style="color:#3995ff">'+ user +' left!</span>';
            addMsg(msg);
        });

        socket.on('msg', function(name, message){
            console.log('msg', name, message);
            addMsg(message, name);
        });

        $('#input').keydown(function (event) {
            if(event.which == 13){
                send();
            }
        });

        $('#send').click(function () {
            send();
        });

        function send() {
            var txt = $('#input').val();
            if(txt.length > 0){
                socket.emit('msg', txt);
                $('#input').val('');
                addMsg(txt, userName);
            }
        }

        function addMsg(msg, name="") {
            var nameHtml = "";
            if(name.length > 0){
                nameHtml = "<span class=\"name\" style=\"color:#5689ff\">"+name+":</span>";
            }
            var html = nameHtml+"<span class=\"msg\">"+msg+"</span>";
            $('#messages').append("<li>"+html+"<li>");
        }
    }

</script>

</body>

</html>
