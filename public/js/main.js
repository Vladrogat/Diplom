function clickMenu() {
    const animElems = document.querySelectorAll(".lines");
    if (animElems.length > 0) {
        for (let i = 0; i < animElems.length; i++) {
            const animItem = animElems[i];
            animItem.classList.toggle("active");
        }
    }
}
