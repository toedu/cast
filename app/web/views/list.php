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

        <div class="col-md-3">
            <p class="lead">Shop Name</p>
            <div class="list-group">
                <a href="#" class="list-group-item active">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row channel-list">
                <div class="col-lg-4 col-md-6">
                    <div class="thumbnail">
                        <a href="/1">
                            <img src="img/1.gif">
                        </a>
                        <div>
                            <p class="pull-right"><span class="glyphicon glyphicon-bell"></span>25</p>
                            <p class="pull-left"><span class="glyphicon glyphicon-apple"></span>好的</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="thumbnail">
                        <img src="img/2.jpg">
                        <div>
                            <p class="pull-right"><span class="glyphicon glyphicon-bell"></span>25</p>
                            <p class="pull-left"><span class="glyphicon glyphicon-apple"></span>好的</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="thumbnail">
                        <img src="img/3.jpg">
                        <div>
                            <p class="pull-right"><span class="glyphicon glyphicon-bell"></span>25</p>
                            <p class="pull-left"><span class="glyphicon glyphicon-apple"></span>好的</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="thumbnail">
                        <img src="img/4.jpg">
                        <div>
                            <p class="pull-right"><span class="glyphicon glyphicon-bell"></span>25</p>
                            <p class="pull-left"><span class="glyphicon glyphicon-apple"></span>好的</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="thumbnail">
                        <img src="img/5.jpg">
                        <div>
                            <p class="pull-right"><span class="glyphicon glyphicon-bell"></span>25</p>
                            <p class="pull-left"><span class="glyphicon glyphicon-apple"></span>好的</p>
                        </div>
                    </div>
                </div>
            </div>
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
<script>
    $(":input[type='text'],[type='password']").change(function () {
        resetStatus($(this));
    })

    $(":input[type='button']").click(function () {
        var ok = true;
        var nameInput = $(":input[name='name']");
        var name = nameInput.val();
        if (name.length < 3) {
            ok = false;
            showStatus(nameInput, "The name must be at least 3.");
        }
        if (name.length > 16) {
            ok = false;
            showStatus(nameInput, "The name can not be more than 16.");
        }

        var emailInput = $(":input[name='email']");
        var email = emailInput.val();
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(!myreg.test(email)){
            ok = false;
            showStatus(emailInput, "The email format is invalid.");
        }

        var pwdInput = $(":input[name='password']");
        var pwd = pwdInput.val();
        if (pwd.length < 6) {
            ok = false;
            showStatus(pwdInput, "The password must be at least 6.");
        }

        var repwdInput = $(":input[name='repwd']");
        var repwd = repwdInput.val();
        if (pwd != repwd) {
            ok = false;
            showStatus(repwdInput, "The password not match.");
        }

        if(ok){
            $("#signForm").submit();
        }
    })

    function showStatus(element, msg) {
        resetStatus(element);
        element.parent().addClass('has-error');
        var txt = "<span class=\"help-block\"><strong>" + msg + "</strong></span>";
        element.parent().append(txt);
    }

    function resetStatus(element) {
        element.siblings("span").remove();
        element.parent().removeClass('has-error');
    }

</script>

</body>

</html>
