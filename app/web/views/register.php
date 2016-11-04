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
                <h3 class="sign-head">Sign up</h3>
                <form role="form" method="POST" action="/register">
                    <div class="form-group <?php if(isset($err)&&isset($err['name'])){ echo 'has-error';} ?> ">
                        <label for="name">User</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter User Name" required autofocus>
                        <?php if(isset($err)&&isset($err['name'])){ ?>
                            <span class="help-block">
                            <strong><?php echo $err['name'] ?></strong>
                            </span>
                        <?php } ?>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label for="repwd">Retype Password</label>
                        <input type="text" class="form-control" name="password_confirmation" placeholder="Retype Password" required>
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
