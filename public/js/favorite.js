const CHECK_LIKE = "images/rosso.png";
const UNCHECK_LIKE = "images/grey.png";
const CHECK_PREFERITO = "images/piena.png";
const UNCHECK_PREFERITO = "images/vuota.jpg";

function updateLikes(json, button) {
    console.log(json);

    button.textContent = json["nlikes"];
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

function jSon(json,cont)
{
    //console.log(json);
    const ora=document.createElement('p')
    ora.textContent=json;
    cont.appendChild(ora);
}

function jPre(json) {
    const x = document.querySelector(".count");
    x.innerHTML = "";
    x.textContent = "Preferiti: " + json["npreferiti"];
}

function unPrePost(event) {
    console.log("sono nel togli dai preferiti");
    // const formData = new FormData();
    const button = event.currentTarget;
    console.log("sto togliendo dai preferiti il post :  "+button.parentNode.parentNode.parentNode.parentNode.data);
    const post_id = button.parentNode.parentNode.parentNode.parentNode.data;
    /*formData.append(
    "postid",
    button.parentNode.parentNode.parentNode.parentNode.data
  );*/
    event.currentTarget.childNodes[0].classList.add("hide");
    event.currentTarget.childNodes[1].classList.remove("hide");
    event.currentTarget.removeEventListener("click", unPrePost);

    fetch("favorite/" + encodeURIComponent(post_id))
        .then(fetchResponse)
        .then(jPre);
    //window.location.reload();
    const center = document.getElementById("center");
    center.innerHTML="";
    fetchPosts();
}

function likePost(event) {
    const button = event.currentTarget;
    //console.log(button.parentNode.parentNode.parentNode.parentNode.data);
    console.log("ho messo like al post "+button.parentNode.parentNode.parentNode.parentNode.data);
    post_id = button.parentNode.parentNode.parentNode.parentNode.data;

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

    //console.log(button.parentNode.parentNode.parentNode.parentNode.data); //mando id alla pagina php tramte fetch
    console.log("ho tolto il like al post "+button.parentNode.parentNode.parentNode.parentNode.data);
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

function fetchPostJson(json) {
    console.log("fetching...");
    console.log(json);
    const center = document.getElementById("center");
    const name =  document.querySelector('header').dataset.user;
    //console.log(name);

    for (let i of json) {
        if (i.favorites != 0) {
            for (let y of i.favorites)
                if (y.username == name) {
                    const contenitore = document.createElement("div");
                    contenitore.classList.add("oggetto");
                    contenitore.data = i.id;
                    contenitore.l = false;
                    // console.log(i.postid);

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

                    
                    emptyf.classList.add("hide");
                   pref.classList.remove("hide");
                 

                    box1.appendChild(pref);
                    box1.appendChild(emptyf);

                    
                    box1.addEventListener("click", unPrePost);

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
    }
}

function fetchResponse(response) {
    console.log(response);
    if (!response.ok) {
        return null;
    }
    return response.json();
}

function fetchPosts() {
    fetch("posts").then(fetchResponse).then(fetchPostJson);
}

fetchPosts();
