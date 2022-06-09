function clickAcordeon(obj)
{
    let accordions = document.querySelectorAll(".accordion-body");
    let doc = document.querySelector(".doc-word");

    accordions.forEach(accordion => {
        accordion.classList.remove("active");
    })

    doc.src = "https://drive.google.com/file/d/" + obj.id + "/preview";
    obj.classList.add("active");
}
