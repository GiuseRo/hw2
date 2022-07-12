const CHECK_LIKE = "images/rosso.png";
const UNCHECK_LIKE = "images/grey.png";
const CHECK_PREFERITO = "images/piena.png";
const UNCHECK_PREFERITO = "images/vuota.jpg";

function jSon(json,cont)
{
    console.log(json);
    const ora=document.createElement('p')
    ora.textContent=json;
    cont.appendChild(ora);
}
function fetchPostJson(json) {
    console.log("fetching...");
    console.log(json);
    const center = document.getElementById("center");
    const name =  document.querySelector('header').dataset.user;
    //console.log(name);
    for (let i of json) {
        const contenitore = document.createElement("div");
        contenitore.classList.add("oggetto");
        contenitore.data = i.id;
        contenitore.l = false;

        const contenitorino = document.createElement("div");
        contenitorino.classList.add("c");

        const contenitoririnono = document.createElement("div");

        const utente = document.createElement("h3");
        //const ora = document.createElement("p");
        utente.textContent = "@" + i.user.username;
        //ora.textContent = i.time;
        const img = document.createElement("img");
        img.src = i.content.url;

        const box = document.createElement("div");
        const box1 = document.createElement("div");
        const box2 = document.createElement("div");
        box.textContent = i.nlikes;
        const anno = document.createElement("div");
        anno.textContent = "ANNO:" + i.content.anno;
        anno.classList.add("interazione");

        const like = document.createElement("img");
        const empty = document.createElement("img");
        like.src = CHECK_LIKE;
        empty.src = UNCHECK_LIKE;

        if (i.nlikes != 0) {
            for (let y of i.likes) {
                if (y.username === name) {
                    empty.classList.add("hide");
                    like.classList.remove("hide");
                    contenitore.l = true;
                    break;
                } else {
                    like.classList.add("hide");
                    empty.classList.remove("hide");
                }
            }
        } else {
            like.classList.add("hide");
            empty.classList.remove("hide");
        }

        box.appendChild(like);
        box.appendChild(empty);

        if (contenitore.l == true) box.addEventListener("click", unlikePost);
        else box.addEventListener("click", likePost);

        const pref = document.createElement("img");
        const emptyf = document.createElement("img");
        pref.src = CHECK_PREFERITO;
        emptyf.src = UNCHECK_PREFERITO;
        
        if (i.favorites != 0) {
            for (let y of i.favorites)
                if (y.username == name) {
                    emptyf.classList.add("hide");
                    pref.classList.remove("hide");
                    break;
                } else {
                    pref.classList.add("hide");
                    emptyf.classList.remove("hide");
                }
        } else {
            pref.classList.add("hide");
            emptyf.classList.remove("hide");
        }

        box1.appendChild(pref);
        box1.appendChild(emptyf);

        if (i.preferito == true) box1.addEventListener("click", unPrePost);
        else box1.addEventListener("click", PrePost);

        box2.appendChild(box);
        box2.appendChild(box1);
        anno.appendChild(box2);

        const stats = document.createElement("div");
        stats.innerHTML =
            "posizione: " +
            i.content.posizione +
            ",  punti:" +
            i.content.punti +
            "<br>" +
            "vittorie: " +
            i.content.vittorie +
            "sconfitte: " +
            i.content.sconfitte +
            "pareggi: " +
            i.content.pareggi +
            "<br>" +
            "goal fatti: " +
            i.content.goal_fatti +
            ",goal subiti: " +
            i.content.goal_subiti +
            ", differenza reti: " +
            i.content.differenza;

        contenitoririnono.appendChild(anno);
        contenitoririnono.appendChild(stats);

        contenitorino.appendChild(utente);
        //contenitorino.appendChild(ora);
        fetch("/home/tempo/"+encodeURIComponent(i.created_at)).then(fetchResponse).then(function (json) {
            return jSon(json, contenitorino);
        });
        contenitore.appendChild(contenitorino);
        contenitore.appendChild(img);
        contenitore.appendChild(contenitoririnono);
        center.appendChild(contenitore);
    }
}

//converte in json
function fetchResponse(response) {
    if (!response.ok) {
        return null;
    }
    return response.json();
}

function updateLikes(json, button) {
    //console.log(json);
    button.textContent = json["nlikes"]; //mettere qui il numero aggiornato di like
    const like = document.createElement("img");
    const empty = document.createElement("img");
    like.src = CHECK_LIKE;
    empty.src = UNCHECK_LIKE;
   // console.log(button.parentNode.parentNode.parentNode.parentNode.l);
    if (button.parentNode.parentNode.parentNode.parentNode.l == true) {
        button.parentNode.parentNode.parentNode.parentNode.l = false;
        like.classList.add("hide");
        empty.classList.remove("hide");
        button.removeEventListener("click", unlikePost);
        button.addEventListener("click", likePost);
    } else {
        button.parentNode.parentNode.parentNode.parentNode.l = true;
        empty.classList.add("hide");
        like.classList.remove("hide");
        button.removeEventListener("click", likePost);
        button.addEventListener("click", unlikePost);
    }
    button.appendChild(like);
    button.appendChild(empty);
}

function jPre(json) {
    //console.log(json);
    const x = document.querySelector(".count");
    x.innerHTML = "";
    x.textContent = "Preferiti: " + json["npreferiti"];
}

function PrePost(event) {
    const button = event.currentTarget;
    console.log("ho messo nei preferiti il post "+button.parentNode.parentNode.parentNode.parentNode.data);
    const post_id = button.parentNode.parentNode.parentNode.parentNode.data;
 
    event.currentTarget.childNodes[1].classList.add("hide");
    event.currentTarget.childNodes[0].classList.remove("hide");
    event.currentTarget.removeEventListener("click", PrePost);
    event.currentTarget.addEventListener("click", unPrePost);
    
    fetch("favorite/" + encodeURIComponent(post_id))
        .then(fetchResponse)
        .then(jPre);
}

function unPrePost(event) {
    
    const button = event.currentTarget;
    //const formData = new FormData();
    console.log("ho tolto dai preferiti il post "+button.parentNode.parentNode.parentNode.parentNode.data);
    const post_id = button.parentNode.parentNode.parentNode.parentNode.data;
    /*formData.append(
        "postid",
        button.parentNode.parentNode.parentNode.parentNode.data
    );*/
    event.currentTarget.childNodes[0].classList.add("hide");
    event.currentTarget.childNodes[1].classList.remove("hide");
    event.currentTarget.removeEventListener("click", unPrePost);
    event.currentTarget.addEventListener("click", PrePost);

    /*fetch("unPre_post.php", { method: "post", body: formData })
        .then(fetchResponse)
        .then(jPre);*/

    fetch("favorite/" + encodeURIComponent(post_id))
        .then(fetchResponse)
        .then(jPre);
}

function likePost(event) {
    const button = event.currentTarget;
    //const formData = new FormData();
    console.log("ho messo like al post "+button.parentNode.parentNode.parentNode.parentNode.data);
    const post_id = button.parentNode.parentNode.parentNode.parentNode.data;
    fetch("like/" + encodeURIComponent(post_id))
        .then(fetchResponse)
        .then(function (json) {
            return updateLikes(json, button);
        });

    event.currentTarget.childNodes[2].classList.add("hide");
    event.currentTarget.childNodes[1].classList.remove("hide");
    //aggiorna i listener
    event.currentTarget.removeEventListener("click", likePost);
    event.currentTarget.addEventListener("click", unlikePost);
}

function unlikePost(event) {
    const button = event.currentTarget;
    const formData = new FormData();
    console.log("ho tolto like al post "+button.parentNode.parentNode.parentNode.parentNode.data);
    post_id = button.parentNode.parentNode.parentNode.parentNode.data;
    fetch("like/" + encodeURIComponent(post_id))
        .then(fetchResponse)
        .then(function (json) {
            return updateLikes(json, button);
        });

    event.currentTarget.childNodes[1].classList.add("hide");
    event.currentTarget.childNodes[2].classList.remove("hide");
    event.currentTarget.removeEventListener("click", unlikePost);
    event.currentTarget.addEventListener("click", likePost);
}

function fetchPosts() {
    fetch("posts").then(fetchResponse).then(fetchPostJson);
}

function nascondi(event) {
    
    document.querySelector(".hidden").classList.remove("hidden");
    event.currentTarget.parentNode.parentNode.classList.add("hidden");
}

function onClick(event) {
    document.querySelector(".hidden").classList.remove("hidden");
    event.currentTarget.classList.add("hidden");
    document.querySelector("#nascondi").addEventListener("click", nascondi);
}

//usando il valore di input si prendono i dati di interesse
function onJson(json) {
    console.log(json);
    const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
    ).content;
    const squadra = document.getElementById("squadra").value;
    const elenco = document.querySelector("#center");
    console.log(squadra);
    const results = json.data.standings;
    for (let result of results) {
        if (
            result.team.name == squadra ||
            result.team.shortDisplayName == squadra ||
            result.team.abbreviation == squadra
        ) {
            const anno = document.querySelector("#anno").value;
            const img = document.createElement("img");
            img.src = result.team.logos[0].href; // qua c'è url da passare per salvarlo nel database
            const formData = new FormData();
            formData.append("squadra", img.src);
            formData.append("anno", document.querySelector("#anno").value);
            formData.append("posizione", result.stats[8].value);
            formData.append("vittorie", result.stats[0].value);
            formData.append("pareggi", result.stats[2].value);
            formData.append("sconfitte", result.stats[1].value);
            formData.append("goal_fatti", result.stats[4].value);
            formData.append("goal_subiti", result.stats[5].value);
            formData.append("differenza", result.stats[9].value);
            formData.append("punti", result.stats[6].value);

            //fare la fetch non ad una pagina php ma ad una roote
            fetch('/home/crea', {
                method: 'POST',
                headers: {
                    "X-CSRF-Token": csrfToken
                },
                body: formData,
            }); 
        }
    }
    // window.location.reload();
    const center = document.getElementById("center");
    center.innerHTML="";
    fetchPosts();
}

//compone l'url in base ai due campi select e fa una fetch
function creaPost(event) {
    event.preventDefault();

    const tipo = document.querySelector("#campionato").value;
    const encoded = encodeURIComponent(tipo);
    console.log("eseguo ricerca di " + encoded);
    const url =
        "https://api-football-standings.azharimm.site/leagues/" +
        encoded +
        "/standings?season=" +
        document.querySelector("#anno").value +
        "&sort=asc";
    console.log(url);

    document.querySelector(".hidden").classList.remove("hidden");
    event.currentTarget.parentNode.classList.add("hidden");
    fetch(url).then(fetchResponse).then(onJson);
}

//evento per aprire il menu di ricerca
const condividi = document.querySelector("button");
condividi.addEventListener("click", onClick);

//event sul submit del form
const invio = document.querySelector("form");
invio.addEventListener("submit", creaPost);

//appena si apre  carica i post gia inseriti nel database
fetchPosts();
