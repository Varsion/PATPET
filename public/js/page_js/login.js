$(function () {
    $("#create").click(function () {
        check_register();
        return false;
    })
    $("#login").click(function () {
        check_login();
        return false;
    })
    $('.message a').click(function () {
        $('form').animate({
                            height: 'toggle',
                            opacity: 'toggle'
                        }, 'slow');
    });
})


function login(){
    $.ajax({
        async: false,
        type: "POST",
        url:'/api/auth/login',
        data:decodeURIComponent(jQuery("#login_form").serialize()),
        contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
            if(data.code == 200){
                console.log(data.data.token);
                Setcookie("token",data.data.token)
                location.href = "index.html"
            }else{
                alert("Email or Password Error");
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        }
    });
}

function register(){
    $.ajax({
        async: false,
        type: "POST",
        url:'/api/auth/registered',
        data:decodeURIComponent(jQuery("#register_form").serialize()),
        contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
            if(data.code == 200){
                alert("Register Success");
                window.location.reload();
            }else{
                alert("Register Error");
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        }
    });
}
