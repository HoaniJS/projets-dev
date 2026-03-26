const qs = (el) => document.querySelector(el);
const qsa = (el) => Array.from(document.querySelectorAll(el));

/*************
 * VARIABLES *
 *************/

const joueurs = [];
let nbBilles = 15;
const billeInitiale = nbBilles;
let coupPrecedent = 0;
let coup;
let joueurActif = 1;
let pj1 = "Joueur 1";
let pj2 = "Joueur 2";
let image;

qs("#submit").addEventListener("click", (e) => {
    if (qs("#prenom1").value != ""){
        pj1 = qs("#prenom1").value;
    }
    if (qs("#prenom2").value != ""){
        pj2 = qs("#prenom2").value;
    }
    
    e.preventDefault();

    //tester la validité des données

    joueurs.push(
        {prenom: pj1, nom: qs("#nom1").value},
        {prenom: pj2, nom: qs("#nom2").value}
    );

    qs("#form").classList.add("d-none");
    qs("#jeu").classList.remove("d-none");

    info();
});

qsa("button").forEach(btn => {
    btn.addEventListener("click", (e) => {
        coup = e.target.getAttribute("data-bille");
        nbBilles -= coup;
        coupPrecedent = coup;

        joueurActif = (joueurActif + 1) % joueurs.length;

        e.target.setAttribute("disabled", true);

        qsa("button").forEach(btnAct => {
            if (btnAct.getAttribute("data-bille") !== coupPrecedent){
                btnAct.removeAttribute("disabled");
            };

            if (nbBilles < btnAct.getAttribute("data-bille")){
                btnAct.setAttribute("disabled", true);
            };
        })

        info();
    })
});

function info(){
    if(nbBilles == billeInitiale){
        image = "";
        for(let i=0; i<nbBilles; i++){
            rand = Math.floor(Math.random() * 1001)
            if(rand<=333){
                image += "🟢";
            }
            else if(rand>333 && rand<=666){
                image += "🔴";
            }
            else if(rand>666 && rand <=999){
                image += "🟡";
            }
            else{
                image += "⚾";
            }
        }
    }
    else{
        console.log(coupPrecedent);
        image = image.substring(0, image.length-coupPrecedent*2);
    }
    
    qs("#billes").innerHTML = image;

    qs("#joueurActif").innerHTML = joueurs[joueurActif].prenom;
    if(coupPrecedent == null) {coupPrecedent = 0;};
    qs("#cp").innerHTML = `Coup précédent : ${coupPrecedent}`;
    qs("#br").innerHTML = `Billes restantes : ${nbBilles}`;

    barreProgress();
};

function barreProgress(){
    let p = (nbBilles/billeInitiale) * 100;
    qs("#progress").style.width = `${p}%`;

    gagnant();
};

function gagnant(){
    if((nbBilles == 0) || (coupPrecedent == 1 && nbBilles == 1)){
        qs("#fin").classList.remove("d-none");
        qs("#gagnant").innerHTML = joueurs[(joueurActif + 1) % joueurs.length].prenom;
    };
};