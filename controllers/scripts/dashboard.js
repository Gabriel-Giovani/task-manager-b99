// Mudança de cores da badge de acordo com o status
let elementStatus = document.querySelectorAll(".status");

elementStatus.forEach(element => {

    let status = element.textContent.trim();

    if(status === "ATRASADO"){
        element.classList.add("bg-atr");
    }
    else if(status === "HOJE"){
        element.classList.remove("bg-atr");
        element.classList.add("bg-hj");
    }
    else{
        element.classList.remove("bg-atr");
        element.classList.add("bg-dat");
    }

});