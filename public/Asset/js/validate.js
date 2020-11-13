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

function validate() {
    var name = document.getElementById("name").value;
    if (name.length <= 8) {
        document.getElementById("user_error").innerHTML = "Tên đăng nhập phải 8 ký tự trở lên";
        return false;
    }
}
// error