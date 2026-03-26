const qs = (el) => document.querySelector(el);

let imageEl = qs("#slider img");
let figcaption = qs("#slider figcaption");
let timer = null;

const images = [
    {path: "img/ball.jpg", titre: "Screaming Tennis Ball"},
    {path: "img/beer.jpg", titre: "Man with beer and chips watching TV at home"},
    {path: "img/guess.jpg", titre: "Senior man shrugging his shoulders"},
    {path: "img/harold.jpg", titre: "Mature man with computer smiling"},
    {path: "img/pointing.jpg", titre: "Teenager Pointing at himself"},
];

let pos = 0;

qs("#slider-previous").addEventListener('click', reculer);
qs("#slider-toggle").addEventListener('click', play);
qs("#slider-next").addEventListener('click', avancer);
qs("#slider-random").addEventListener('click', random);

qs("#toolbar-toggle").addEventListener('click', () => {
    qs("#toolbar").classList.toggle("d-none")
});

function refresh(){
    imageEl.src = images[pos].path;
    figcaption.innerHTML = images[pos].titre;
}

// document.onkeydown = function(e){
document.addEventListener('keyup', (e) => {
    switch (e.key){
        case "Enter":
            qs("#toolbar").classList.toggle("d-none");
            break;
        case "ArrowLeft":
            reculer();
            break;
        case " ":
            play();
            break;
        case "ArrowRight":
            avancer();
            break;
        case "r":
        case "R":
            random();
            break;
        default:
            break;
    }
//}    
});

function reculer(){
    pos--;
    if (pos < 0){
        pos = images.length-1;
    }

    refresh();
}

function play(){
    qs("#slider-toggle i").classList.toggle("fa-play");
    qs("#slider-toggle i").classList.toggle("fa-pause");
    
    if (timer == null){
        timer = setInterval(avancer, 5000);
    }

    if (qs("#slider-toggle i").classList.contains("fa-play")){
        clearInterval(timer);
        timer = null;
    }
}

function avancer(){
    pos++;
    if (pos >= images.length){
        pos = 0;
    }

    refresh();
}

function random(){
    const POSACTUELLE = pos;

    do{
        pos = Math.floor(Math.random() * images.length);
    }
    while(POSACTUELLE == pos);

    refresh();
}