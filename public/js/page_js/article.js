function getQueryString(name) {
    let reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    let r = window.location.search.substr(1).match(reg);
    if (r != null) {
        return decodeURIComponent(r[2]);
    };
    return false;
 }

 function Follow(id){
    if(!gettoken()){
        alert('Please Login First');
        window.location.href = "login.html";
    }
    $.get('/api/relation/follow?user='+id,function (data) {
        if(data.code == 200) {
            alert("Follow Success");
        } else {
            alert("Follow Error");
        }
    })
 }

 function like(id){
    if(!gettoken()){
        alert('Please Login First');
        window.location.href = "login.html";
    }
    $.get('/api/like/like?article='+id,function (data) {
        if(data.code == 200) {
            alert("Like Success");
        } else {
            alert("Like Error");
        }
    })
 }

 function comment(){

    if(!gettoken()){
        alert('Please Login First');
        window.location.href = "login.html";
    }
    var Data = new FormData;
    Data.append("article",getQueryString('article'));
    Data.append("comment",$("#comment_input").val());

    $.ajax({
        async: false,
        processData: false,
        type: "POST",
        url:'/api/comment/new',
        data:Data,
        contentType : false,
        dataType: "json",
        success: function (data) {
            if(data.code == 200){
                alert("Comment Submit Success");
                window.location.reload();
            } else {
                alert("Comment Submit Error");
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Comment Submit Error");
        }
    });
 }


$().ready(function () {
    if(getQueryString('article')){
        var article = getQueryString('article');
    } else {
        window.location.href = "/main.html"
    }

    $.get('/api/article/info?article='+article,function (data) {
        str = `
        <div class="content-media">
        <div class="post-thumb" style="text-align: center;">
            <img src="${data.data.path}">
        </div>
    </div>

    <div class="primary-content">

        <h1 class="page-title" id="title">${data.data.title}</h1>

        <ul class="entry-meta">
            <li class="date" id="timestrap">${data.data.created_at}</li>
            <li class="cat" id="username">${data.data.username}</li>
            <li class="cat" id="username"><i onclick="Follow(${data.data.author});" onselectstart="return false;" style="color: red;">Follow It!</i></li>
        </ul>
        <article id="content">
                ${data.data.content}
        </article>

        <p class="tags">
               <span>Tag :</span>
                <a id="tag-name" href="/main.html?tag=${data.data.tag_id}">${data.data.tag}</a>
                <a onclick="like(${data.data.id});" style="float: right;">
                    <img src="images/icon/heart.svg" alt="Like">
                </a>
         </p>
            <div>
            </div>
    </div>
        `;
        $("#article_content").empty();
        $("#article_content").append(str);
    });

    $.get('/api/comment/comments?article='+article,function (data) {
        var str = ``;
        for(var i = 0; i < data.data.length; i++){
            str += `
            <div class="comments">
                <img src="${data.data[i].path}" alt="" width="50px">
                <i onclick="Follow(${data.data[i].author});" onselectstart="return false;">${data.data[i].name}</i>
                <center>
                    <p>
                        ${data.data[i].comment}
                    </p>
                </center>
                <span style="float: right;">${data.data[i].created_at}</span>
                <center>
                    <hr width="70%">
                </center>
            </div>
            `;
        }
        $("#comment_content").empty();
        $("#comment_content").append(str);
    });

})
