
var input = document.getElementById("simple-search");
var table = document.getElementById("my-table");
var tr = table.getElementsByTagName("tr");
input.addEventListener("keyup", function () {
    var filter = input.value.toLowerCase();
    for (var i = 0; i < tr.length; i++) {
        var td1 = tr[i].getElementsByTagName("td")[0];
        var td2 = tr[i].getElementsByTagName("td")[1];
        var td3 = tr[i].getElementsByTagName("td")[2];
        var td4 = tr[i].getElementsByTagName("td")[3];
        var td5 = tr[i].getElementsByTagName("td")[4];
        var td6 = tr[i].getElementsByTagName("td")[5];
        if (td1 || td2 || td3 || td4 || td5 || td6) {
            var text1 = td1.textContent || td1.innerText;
            var text2 = td2.textContent || td2.innerText;
            var text3 = td3.textContent || td3.innerText;
            var text4 = td4.textContent || td4.innerText;
            var text5 = td5.textContent || td5.innerText;
            var text6 = td6.textContent || td6.innerText;
            if (text1.toLowerCase().indexOf(filter) > -1 || text2.toLowerCase().indexOf(filter) > -1 ||
                text3.toLowerCase().indexOf(filter) > -1 || text4.toLowerCase().indexOf(filter) > -1 ||
                text5.toLowerCase().indexOf(filter) > -1 || text6.toLowerCase().indexOf(filter) > -1
            ) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
});
