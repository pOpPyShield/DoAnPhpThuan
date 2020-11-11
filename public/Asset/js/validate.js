function validate() {
    const username = document.getElementById("username").innerText;
    const password = document.getElementById("pwd").innerText;

    if(username.value <= 8) {
        alert("UserName must have more than 8 characters, try again");
        return false;
    }
}