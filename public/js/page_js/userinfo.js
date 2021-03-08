$().ready(function (){
    $.get('/api/auth/info',function (data){
        $("#userid").val(data.data.id);
        $("#name").val(data.data.name);
        $("#desc").val(data.data.introduction);
    })
})

function save(){
    var Data = new FormData;
    Data.append("id",$("#userid").val())
    Data.append("name",$("#name").val());
    if($("#avatar")[0].files[0]){
        Data.append("avatar",$("#avatar")[0].files[0]);
    }
    Data.append("desc",$("#desc").val());

    $.ajax({
        async: false,
        processData: false,
        type: "POST",
        url:'/api/auth/editinfo',
        data:Data,
        //decodeURIComponent(jQuery("#info_form").serialize())
        contentType:false,
        //contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
            if(data.code == 200){
                alert('Edit Success');
                window.location.reload();
            }else{
                alert("Edit Error");
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        }
    });
}
