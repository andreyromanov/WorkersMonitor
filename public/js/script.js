var know = {
    "hello": "hi",
    "how ru?": "ok",
    "ok": "))"
};

function talk(event) {
    var user = document.getElementById('userBox').value;
    document.getElementById('chatBox').innerHTML += user + "<br>";
    if (user in know) {
        document.getElementById('chatBox').innerHTML += know[user] + "<br>";
    } else {
        document.getElementById('chatBox').innerHTML += "Don't know <br>";
    }
}
