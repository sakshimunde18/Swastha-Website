const enter = document.getElementById("send-btn");

document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        document.getElementById("send-btn").click();
    }
});