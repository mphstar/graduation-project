const backdropp = document.getElementById("bg_modal");
const contentt = document.getElementById("konten_modal");
const content_student = document.getElementById("content_student");
const unselected_content_student = document.getElementById(
    "unselected_content_student"
);

const showModalSelectStudent = (selected, unselected) => {
    let kontenHtml = "";
    let kontenHtmlUnselected = "";

    selected.forEach((element) => {
        kontenHtml += `<div class="flex flex-row gap-3 flex-grow w-fit items-center">
                            <input checked id="${element.id}" type="checkbox" value="${element.id}" name="ids_selected[]">
                            <label for="${element.id}">${element.first_name} ${element.last_name}</label>
                        </div>`;
    });

    unselected.forEach((element) => {
        kontenHtmlUnselected += `<div class="flex flex-row gap-3 flex-grow w-fit items-center">
                            <input id="${element.id}" type="checkbox" value="${element.id}" name="ids_unselected[]">
                            <label for="${element.id}">${element.first_name} ${element.last_name}</label>
                        </div>`;
    });

    content_student.innerHTML = kontenHtml;
    unselected_content_student.innerHTML = kontenHtmlUnselected;

    handleSelectStudent();
};

const handleSelectStudent = () => {
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
