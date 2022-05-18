
const animElems = document.querySelectorAll(".lines");

/*
 * Исправление ошиби не изменения кнопки меню
 * при закрытии выпадающего списка при нажатии вне списка
 */
document.onclick = function(e){
    if ( e.target.className !== 'dropdown-menu' && !e.target.classList.contains("cl")) {
        console.log( e.target.className);
        if (animElems.length > 0) {
            for (let i = 0; i < animElems.length; i++) {
                const animItem = animElems[i];
                animItem.classList.remove("active");
            }
        }
    }
};
function clickMenu() {
    if (animElems.length > 0) {
        console.log(2);
        for (let i = 0; i < animElems.length; i++) {
            const animItem = animElems[i];
            animItem.classList.toggle("active");
        }
    }
}

/* работа таймера */

function tick() {

}
function submit() {

}




