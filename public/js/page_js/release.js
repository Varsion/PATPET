function release(){
    var Data = new FormData;
    Data.append("title",$("#art_title").val())
    Data.append("tag",$("#art_tag").val());
    if($("#pic")[0].files[0]){
        Data.append("pic",$("#pic")[0].files[0]);
    }
    Data.append("content",ue.getContent());

    $.ajax({
        async: false,
        processData: false,
        type: "POST",
        url:'/api/article/new',
        data:Data,
        //decodeURIComponent(jQuery("#info_form").serialize())
        contentType:false,
        //contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
            if(data.code == 200){
                alert('Article Release Success!');
                window.location.href="/userPage.html";
            }else{
                alert("Article Release Success!");
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        }
    });
}

$().ready(function() {
    $.get('/api/tag/tags',function (data) {
        var tags = ``;
        for(var i = 0; i < data.data.length; i++) {
            tags +=`<option value="${data.data[i].id}">${data.data[i].name}</option>`;
        }
        $("#art_tag").empty();
        $("#art_tag").append(tags);
    })
})
