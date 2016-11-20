
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ACASTER SITE</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">List</a>
                </li>
                <li>
                    <a href="#">Game</a>
                </li>
            </ul>
            <?php if(empty($_SESSION['user'])){ ?>
            <a href="/register" class="pull-right btn-login">Sign up</a>
            <a href="/login" class="pull-right btn-login">Login</a>
            <?php }else{ ?>
            <a href="/cast" class="btn btn-success pull-right btn-live">go live</a>
            <a href="/logout" class="pull-right btn-login">Logout</a>
            <div class="pull-right btn-login"><?php echo $_SESSION['user']['name'] ?></div>
            <?php } ?>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
