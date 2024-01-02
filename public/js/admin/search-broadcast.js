var input = document.getElementById("simple-search");
var messages = document.querySelectorAll(".broadcast-message"); // Add a class to the list items

input.addEventListener("keyup", function () {
    var filter = input.value.toLowerCase();

    messages.forEach(function (message) {
        var title = message.querySelector(".message-title").textContent.toLowerCase();
        var content = message.querySelector(".message-content").textContent.toLowerCase();
        var createdAt = message.querySelector(".message-created-at").textContent.toLowerCase();

        if (
            title.indexOf(filter) > -1 ||
            content.indexOf(filter) > -1 ||
            createdAt.indexOf(filter) > -1
        ) {
            message.style.display = "";
        } else {
            message.style.display = "none";
        }
    });
});
