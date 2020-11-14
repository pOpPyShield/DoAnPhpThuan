
<?php include_once './View/header.php';?>
    <!-------Account-->
    <div class="account-page">
        <div class="container">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Đăng nhập</span>
                    <span onclick="register()">Đăng ký</span>
                    <hr id="Indicator">
                </div>
                
<<<<<<< HEAD
                <form id="LoginForm" method="POST" action='display.php' onsubmit="return validate()">
                    <input type="text" placeholder="Tên đăng nhập" name="username" required autocomplete="username" id='name'>
=======
                <form id="LoginForm" method="POST" action="display.php" onsubmit="return validate()">
                    <input type="text" placeholder="Tên đăng nhập" name="username" required autocomplete="username" id='name'>
                    <div id="user_error"></div>
>>>>>>> thienBranch
                    <input type="password" placeholder="Mật khẩu" name="pwd" required id='pwd'>
                    <input type="hidden" name = "token" value="">
                    <a href="#"><i>Quên mật khẩu</i></a>
                    <button type="submit" class="btn-login" name="login" value="login">Đăng nhập</button>
                </form>
                <form id="RegForm" method="POST" action="register.php">
                    <input type="text" placeholder="Tên đăng nhập" name="username" required autocomplete="username">
                    <input type="email" placeholder="Email" required name="email">
                    <input type="password" placeholder="Mật khẩu" name="pwd" required>
                    <input type="password" placeholder="Nhập lại mật khẩu"name="pwdAgain" required>
                    <button type="submit" class="btn-login" name="reg" value="reg">Đăng ký</button>

                </form>
            </div>
            <script defer src="public/Asset/js/validate.js"></script>

        </div>
    </div>
    <!-------END-Account-->


 <?php include_once './View/footer.php' ?>


</body>

</html>