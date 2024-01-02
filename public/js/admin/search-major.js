var input = document.getElementById("simple-search");
var table = document.getElementById("my-table");
var tr = table.getElementsByTagName("tr");

input.addEventListener("keyup", function () {
    var filter = input.value.toLowerCase();
    for (var i = 0; i < tr.length; i++) {
        var td1 = tr[i].getElementsByTagName("td")[0];
        var td2 = tr[i].getElementsByTagName("td")[1];
        var td3 = tr[i].getElementsByTagName("td")[2];

        if (td1 || td2 || td3) {
            var text1 = td1.textContent || td1.innerText;
            var text2 = td2.textContent || td2.innerText;
            var text3 = td3.textContent || td3.innerText;

            if (
                text1.toLowerCase().indexOf(filter) > -1 ||
                text2.toLowerCase().indexOf(filter) > -1 ||
                text3.toLowerCase().indexOf(filter) > -1
            ) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    // Reset display if input is empty
    if (filter === "") {
        for (var i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
    }
});
