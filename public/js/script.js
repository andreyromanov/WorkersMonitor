var know = {
    "hello": "hi",
    "how ru?": "ok",
    "ok": "))"
};

function talk(event) {
    var user = document.getElementById('userBox').value;
    var userm = document.getElementById('userBox').value;

    document.getElementById('chatBox').innerHTML += "<div class='text-right'><label class='u-msg text-left p-2'>"+user + "</label></div>";
    var res = userm.search(/\b(\w*work\w*)\b/g);
if (res!=-1) {
    user = 'hello';
  } else {
    alert('nit');
  }
    if (user in know) {
        document.getElementById('chatBox').innerHTML += "<div><label class='b-msg p-2'>"+know[user] + "</label></div>";
    } else {
        document.getElementById('chatBox').innerHTML += "<div><label class='b-msg p-2'>Incorrect maeesage. Try again!</label></div>";
    }
    document.getElementById("userBox").value = "";
    updateScroll();
}
function updateScroll(){
    var element = document.getElementById("chatBox");
    element.scrollTop = element.scrollHeight;
}