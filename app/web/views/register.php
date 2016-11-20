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
                <form role="form" id="signForm" method="POST" action="/register">
                    <div class="form-group <?php if (isset($err) && isset($err['name'])) {echo 'has-error';} ?>">
                        <label for="name">User</label>
                        <input type="text" class="form-control" name="name" id="name"
                               value="<?php if (isset($data) && isset($data['name'])) {echo $data['name'];} ?>"
                               placeholder="Enter User Name" required autofocus>
                        <?php if (isset($err) && isset($err['name'])) { ?>
                            <span class="help-block" id="name_tips">
                            <strong><?php echo $err['name'] ?></strong>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="form-group <?php if (isset($err) && isset($err['email'])) {echo 'has-error';} ?>">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                               value="<?php if (isset($data) && isset($data['email'])) {echo $data['email'];} ?>"
                               placeholder="Enter Email" required>
                        <?php if (isset($err) && isset($err['email'])) { ?>
                            <span class="help-block" id="email_tips">
                            <strong><?php echo $err['email'] ?></strong>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password"
                               value="<?php if (isset($data) && isset($data['password'])) {echo $data['password'];} ?>"
                               placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label for="repwd">Retype Password</label>
                        <input type="password" class="form-control" name="repwd"
                               value="<?php if (isset($data) && isset($data['repwd'])) {echo $data['repwd'];} ?>"
                               placeholder="Retype Password" required>
                    </div>
                    <button type="button" class="btn btn-primary form-control">submit</button>
                </form>
            </div>

        </div>
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<?php include 'include/footer.php' ?>

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
