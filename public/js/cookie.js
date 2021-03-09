function Setcookie (name, value){
    var expdate = new Date();   //init
    expdate.setTime(expdate.getTime() + 30 * 60 * 1000);   //time ms
    document.cookie = name+"="+value+";expires="+expdate.toGMTString()+";path=/";
}


function GetCookie(name){
if (document.cookie.length>0){
  c_start=document.cookie.indexOf(name + "=")
  if (c_start!=-1){
    c_start=c_start + name.length+1
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length
    return unescape(document.cookie.substring(c_start,c_end))
    }
  }
return false;
}

function DelCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var c = getCookie(name);
    if (c != null){
        document.cookie = name + "=" + c + ";expires=" + exp.toGMTString();
    }
}


function gettoken(){
    return GetCookie("token");
}


