const qs = (el) => document.querySelector(el)
const qsa = (el) => Array.from(document.querySelectorAll(el))

const newQuoteBody = qs("#newQuoteBody")
const quoteList = qs("#quoteList")

let curQuoteId
let curQuote
let favListAlrdyOpnd = false

async function getQuote() {
    try{
        const res = await fetch("https://api.quotable.io/random")
        if(!res.ok){
            throw new Error(res.status);
        };
        let quote = await res.json();

        qs("#newButton").innerHTML = "Nouvelle citation"

        curQuoteId = quote._id
        curQuote = {
            quote: quote.content,
            author: quote.author
        }
        
        if (qs("#newQuoteFigure") == null) {
            const newQuote = document.createElement("figure")
            newQuote.setAttribute("id", "newQuoteFigure")
            newQuote.innerHTML = `<blockquote class="blockquote text-start">
                    <p id="newQuote">${curQuote.quote}</p>
                </blockquote>
                <figcaption class="blockquote-footer text-end" id="newAuthor">
                    ${curQuote.author}
                </figcaption>`

            const btnAdd2Favs = document.createElement("div")
            btnAdd2Favs.className = "d-grid gap-2"
            btnAdd2Favs.innerHTML = `<button type="button" class="btn btn-primary" id="add2Favs">
                    Ajouter aux favoris
                </button>`
            const add2Favs = qs("#add2Favs")

            newQuoteBody.appendChild(newQuote)
            newQuoteBody.appendChild(btnAdd2Favs)
        }
        else {
            qs("#newQuote").innerHTML = curQuote.quote
            qs("#newAuthor").innerHTML = curQuote.author

        }

        if (localStorage.getItem(curQuoteId) != null) {
            disableAdd2Favs()
        }
        else {
            unableAdd2Favs()
        }
        
        add2Favs.addEventListener("click", (e) =>{
            localStorage.setItem(curQuoteId, JSON.stringify(curQuote))
            
            if (favListAlrdyOpnd) {
                addFav(curQuote)
            }

            disableAdd2Favs()
        })
    }
    catch(e){
        qs("#newButton").innerHTML = "Réessayer"
        newQuoteBody.innerHTML = e;
    }
}

function unableAdd2Favs() {
    add2Favs.classList.add("btn-primary")
    add2Favs.classList.remove("btn-secondary")
    add2Favs.removeAttribute("disabled")
    add2Favs.innerHTML = "Ajouter aux favoris"
}

function disableAdd2Favs() {
    add2Favs.classList.remove("btn-primary")
    add2Favs.classList.add("btn-secondary")
    add2Favs.setAttribute("disabled", "")
    add2Favs.innerHTML = "Déjà mis en favoris"
}

qs("#newButton").addEventListener("click", (e) => {
    getQuote();

    qs("#newQuoteCard").classList.remove("d-none")
})

qs("#showFavs").addEventListener("click", (e) => {
    qs("#quoteListCard").classList.toggle("d-none")
    if (qs("#quoteListCard").classList.contains("d-none")) {
        qs("#showFavs").innerHTML = "Afficher les favoris"
    }
    else {
        qs("#showFavs").innerHTML = "Cacher les favoris"
    }
    
    if (!favListAlrdyOpnd) {
        addFavs()
    }    
})

function addFavs() {
    let favIds = Object.keys(localStorage)

    if (favIds.length == 0) {
        quoteList.innerHTML = `<span class="my-2" id="noFav">Aucun favoris.</span>`
    }
    else {
        favIds.forEach(id => {
            let favItem = document.createElement("li")
            let fav = JSON.parse(localStorage.getItem(id))
            favItem.className = "list-group-item"
            favItem.innerHTML = `<figure>
                    <blockquote class="blockquote text-start">
                        <p>${fav.quote}</p>
                    </blockquote>
                    <figcaption class="blockquote-footer text-end">
                        ${fav.author}
                    </figcaption>
                </figure>

                <div class="d-grid gap-2">
                    <button class="btn btn-danger mb-2" type="button">Supprimer des favoris</button>
                </div>`
            quoteList.appendChild(favItem)
        });
        favListAlrdyOpnd = true
    }
}

function addFav(newFav) {
    if (qs("#noFav") != null) {
        quoteList.innerHTML = ""
    }

    let favItem = document.createElement("li")
    favItem.className = "list-group-item"
    favItem.innerHTML = `<figure>
            <blockquote class="blockquote text-start">
                <p>${newFav.quote}</p>
            </blockquote>
            <figcaption class="blockquote-footer text-end">
                ${newFav.author}
            </figcaption>
        </figure>

        <div class="d-grid gap-2">
            <button class="btn btn-danger mb-2" type="button">Supprimer des favoris</button>
        </div>`
    quoteList.appendChild(favItem)
}