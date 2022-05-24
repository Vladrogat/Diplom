
const animElems = document.querySelectorAll(".lines");

/*
 * Исправление ошиби не изменения кнопки меню
 * при закрытии выпадающего списка при нажатии вне списка
 */
document.onclick = function(e){
    if ( e.target.className !== 'dropdown-menu' && !e.target.classList.contains("cl")) {
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
        for (let i = 0; i < animElems.length; i++) {
            const animItem = animElems[i];
            animItem.classList.toggle("active");
        }
    }
}


/* работа таймера */
function timeFormat(time) {
    try {
        let minute = Math.floor(time / 60) > 0 ? (Math.floor(time / 60) + " мин ") : "";
        let second = time % 60 > 0 ? time % 60 + " сек" : "";
        return minute + second;
    } catch (Ex){
        return 0;
    }
}
if (document.querySelector(".time-td") != null) {
    let time = document.querySelector(".time-td");
    time.innerHTML = timeFormat( time.innerHTML);
}

if (document.querySelector(".time") != null) {

    let timer = document.querySelector(".timer-progress");
    timer.value = timer.max;
    let time_text = document.querySelector(".time");
    let time = sessionStorage.getItem("time") ? sessionStorage.getItem("time"): timer.value;
    timer.value = time;

    document.querySelector(".time").innerHTML = timeFormat(time);

    setInterval(tick, 1000)

    function tick() {
        try {

            if (timer.value > 0) {
                time--;
                let post_time = document.getElementById("time");
                post_time.value = timer.max - time;
                timer.value = time;

                time_text.innerHTML = timeFormat(time);

                sessionStorage.setItem("time", time)
            } else {
                //выполнять отправку формы
                clearInterval(tick)
                submit()
            }
        } catch (Ex){}
    }

    // function timeFormat(time) {
    //     try {
    //         let minute = Math.floor(time / 60) > 0 ? (Math.floor(time / 60) + " мин ") : "";
    //         let second = time % 60 > 0 ? time % 60 + " сек" : "";
    //         return minute + second;
    //     } catch (Ex){
    //         return 0;
    //     }
    // }

    function submit() {
        let form = document.getElementById("form-result");
        form.submit();
    }

} else {
    sessionStorage.clear()
    clearInterval(tick)
}
