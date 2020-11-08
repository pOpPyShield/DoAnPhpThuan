<?php 

    require '../core/Init.php';
    //require '../classes/Admin.php';
    require '../classes/Input.php';

?>
<?php include_once 'header.php'; ?>
    <!-------Account-->
    <div class="account-page">
        <div class="container">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Đăng nhập</span>
                    <span onclick="register()">Đăng ký</span>
                    <hr id="Indicator">
                </div>

                <form id="LoginForm" method="POST" action="">
                    <input type="text" placeholder="Tên đăng nhập" name="username" required autocomplete="username">
                    <input type="password" placeholder="Mật khẩu" name="pwd" required>
                    <input type="hidden" name = "token" value="<?php echo token::generate();?>">
                    <a href="#"><i>Quên mật khẩu</i></a>
                    <button type="submit" class="btn-login">Đăng nhập</button>
                </form>
                <form id="RegForm" method="POST">
                    <input type="text" placeholder="Tên đăng nhập">
                    <input type="text" placeholder="Email">
                    <input type="password" placeholder="Mật khẩu">
                    <input type="password" placeholder="Nhập lại mật khẩu">
                    <button type="submit" class="btn-login">Đăng ký</button>

                </form>
            </div>

        </div>
    </div>
    <!-------END-Account-->


 <?php include_once 'footer.php' ?>

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