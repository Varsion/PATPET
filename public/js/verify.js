$().ready(function(){
    var token = GetCookie("token")
    if(!token){
        alert("Please Login First")
        location.href="login.html"
    }
});

function logout() {
    DelCookie('token');
    location.href = "/login.html";
}
