
if (matchMedia) {
    const mq = window.matchMedia("(max-width: 1200px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
}

// media query change
function WidthChange(mq) {
    element = $('.input-group-text');



    if (mq.matches) {
        //window width is at least 500px

        for (i = 0; i < element.length; i++) {
            ele = element[i];
            ele.style.maxHeight = "29px";
        }



        if (matchMedia) {
            const wt = window.matchMedia("(max-width: 900px)");
            wt.addListener(changestyle);
            changestyle(wt);
        }





    } else {
        for (i = 0; i < element.length; i++) {
            ele = element[i];
            ele.style.maxHeight = "36px";
        }

    }

}




function changestyle(wt) {
    elements = $('.input-group-text');

    if (wt.matches) {
        for (i = 0; i < elements.length; i++) {
            ele = elements[i];
            ele.style.maxHeight = "27px";
        }
    } else {
        if (wt.matches) {
            for (i = 0; i < elements.length; i++) {
                ele = elements[i];
                ele.style.maxHeight = "22px";
            }
        }
    }

}


