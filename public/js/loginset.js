$().ready(function () {
    $("#login_url").empty();
    if(gettoken()){
        $("#login_url").append(`<a href="userPage.html">USER</a>`)
    } else {
        $("#login_url").append(`<a href="login.html">USER</a>`)
    }
})