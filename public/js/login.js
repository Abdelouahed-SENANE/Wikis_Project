var urlParams = new URLSearchParams(window.location.search);
var message = urlParams.get("message");

if (message != null) {
    alert(message);
}