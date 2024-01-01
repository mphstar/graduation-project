const backdropp = document.getElementById("bg_modal");
const contentt = document.getElementById("konten_modal");

const handleModalQuestion = () => {
    if (backdropp.classList.contains("opacity-0")) {
        contentt.classList.replace("scale-0", "scale-100");
        backdropp.classList.replace("opacity-0", "opacity-30");

        backdropp.classList.replace(
            "pointer-events-none",
            "pointer-events-auto"
        );
    } else {
        contentt.classList.replace("scale-100", "scale-0");
        backdropp.classList.replace("opacity-30", "opacity-0");

        backdropp.classList.replace(
            "pointer-events-auto",
            "pointer-events-none"
        );
    }
};

const handleMessage = () => {
    Swal.fire({
        title: "Information",
        text: "You must have teacher to create question",
        icon: "warning",
    });
};
