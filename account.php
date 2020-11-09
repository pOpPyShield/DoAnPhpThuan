
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

                <form id="LoginForm" method="POST" action='display.php'>
                    <input type="text" placeholder="Tên đăng nhập" name="username" required autocomplete="username">
                    <input type="password" placeholder="Mật khẩu" name="pwd" required>
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

        </div>
    </div>
    <!-------END-Account-->


 <?php include_once './View/footer.php' ?>

    <script >
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function register() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
            
        }

        function login() {
            RegForm.style.transform = "translateX(400px)";
            LoginForm.style.transform = "translateX(400px)";
            Indicator.style.transform = "translateX(0px)";
        }
    </script>
</body>

</html>