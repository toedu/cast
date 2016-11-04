<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php' ?>
</head>

<body>

<?php include 'include/nav.php' ?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="row">
                <h3 class="sign-head">Login</h3>
                <form role="form" method="POST" action="/login">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                        <?php if(true){ ?>
                        <span class="help-block">
                            <strong></strong>
                        </span>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <?php if(true){ ?>
                        <span class="help-block">
                            <strong></strong>
                        </span>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">submit</button>
                </form>

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

</body>

</html>
