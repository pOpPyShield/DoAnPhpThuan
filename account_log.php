
<?php include_once './View/header.php';?>
<?php if(isset($_GET['regUser']) == 'success') { ?>
        <script>alert('Register user success,  login to use');</script>
<?php } ?>

    <!-------Account-->
    <link rel="stylesheet" type="text/css" href="public/Asset/style/account_log.css">
    <div class="account-page">
        <div class="container">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Đăng nhập</span>
                    <span onclick="register()">Đăng ký</span>
                    <hr id="Indicator">
                </div>
                
                <form id="LoginForm" method="POST" action="includes/display.php" onsubmit="return validate_login()">
                    <label>Tên đăng nhập:</label>
                    <input type="text" placeholder="Tên đăng nhập" name="username" required autocomplete="username" id='name'>
                    <div id="user_error"></div>
                    <label>Mật khẩu:</label>
                    <input type="password" placeholder="Mật khẩu" name="pwd" required id='pwd'>
                    <div id="pwd_error"></div>
                    <input type="hidden" name = "token" value="">
                    <a href="forgotpwd.php"><i>Quên mật khẩu</i></a>
                    <button type="submit" class="btn-login" name="login" value="login">Đăng nhập</button>
                </form>
                <form id="RegForm" method="POST" action="includes/register.php" onsubmit="return validate_reg()">
                    <label>Tên đăng nhập:</label>
                    <input type="text" placeholder="Tên đăng nhập" name="username" required autocomplete="username" id='name_reg'>
                    <div id="user_error_reg"></div>
                    <label>Email:</label>
                    <input type="email" placeholder="Email" required name="email" id="email_reg">
                    <div id="email_error_reg"></div>
                    <label>Mật khẩu:</label>
                    <input type="password" placeholder="Mật khẩu" name="pwd" required id="pwd_reg">
                    <div id="pwd_error_reg"></div>
                    <label>Nhập lại mật khẩu:</label>
                    <input type="password" placeholder="Nhập lại mật khẩu"name="pwdAgain" required id="pwdAgain_reg">
                    <div id="pwd2_error_reg"></div>
                    <button type="submit" class="btn-login" name="reg" value="reg">Đăng ký</button>

                </form>
            </div>
            <script defer src="public/Asset/js/validate_log.js"></script>

        </div>
    </div>
    <!-------END-Account-->


 <?php include_once './View/footer.php' ?>


</body>

</html>