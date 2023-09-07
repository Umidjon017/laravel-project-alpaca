// Modal
const modal_btn = document.querySelector("#modal__btn")
const modal__close = document.querySelector(".modal__close")
const modal__close__x = document.querySelector(".modal__close__x")
const modal = document.querySelector(".my__modal")

let winWidth = window.innerWidth

window.addEventListener("resize", function(e){
    // console.log(e.target.innerWidth)
    winWidth = e.target.innerWidth
});

if (modal_btn) {
    modal_btn.onclick = () =>{
        modal.classList.add("my__modal__open")
        if (winWidth < 800) {
            document.body.style = "overflow: hidden"
        } else {
            document.body.style = "overflow: hidden; width:calc(100% - 0.4em);"
        }
    }
}

function modalClose() {
    modal.classList.remove("my__modal__open")
    document.body.style = "overflow: visible"
}
if (modal__close) {
    modal__close.onclick = modalClose
}
if (modal__close__x) {
    modal__close__x.onclick = modalClose
}
