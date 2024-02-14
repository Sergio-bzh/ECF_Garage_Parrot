window.addEventListener("load", function(event) {
    document.getElementById("filter").addEventListener("click", callback);
});

const axios = require("axios");
function callback(event){

    // Je récupère les valeurs des sliders du DOM pour les injecter en paramètre dans l'URL
//    let minKm       = parseInt(document.getElementById('km-min-value').textContent);
//    let maxKm       = parseInt(document.getElementById('km-max-value').textContent);
//    let minPrice    = parseInt(document.getElementById('min-price-value').textContent);
//    let maxPrice    = parseInt(document.getElementById('max-price-value').textContent);
//    let minYear     = parseInt(document.getElementById('year-min-value').textContent);
//    let maxYear     = parseInt(document.getElementById('year-max-value').textContent);

    let minKm = 1, maxKm = 1, minPrice = 1, maxPrice = 1, minYear = 1, maxYear = 1;
    const url = '/filteredVehicle/'+ minKm + '/' + maxKm + '/' + minPrice + '/' + maxPrice + '/' + minYear + '/' + maxYear;
    axios.get(url).then(respuesta => {
        datos = respuesta.data;
//        console.log(datos);
        if(datos === ''){
            window.alert("Aucune donnée présente !");
        }
        else {
            const jsContainer = document.querySelector('.js-container');
            jsContainer.textContent = '';
            datos.forEach(vehicle => {
                // Je créé les balises HTML
//                console.log((vehicle))
                const card = document.createElement("div");
                const cardLink = document.createElement('a');
                const cardTitle = document.createElement('h5');
                const cardImgContainer = document.createElement('div');
                const cardImage = document.createElement('img');
                const spanContainer = document.createElement('div');
                const span = document.createElement('span');
                const cardBody = document.createElement('div');
                const price = document.createElement('h6');
                const km = document.createElement('h6');
                const year = document.createElement('h6');
                // Je stylise les balises et lui donne le contenu
                card.style.width = '22rem';
                card.classList.add('card', 'my-3', 'mx-1');
// Je pense qu'il me faudra retravailler l'url pour afficher le véhicule l'Id
                cardLink.href = "/vehicle/" + vehicle['id'];
//                console.log(cardLink);
                cardTitle.classList.add('text-center', 'card-title');
                cardTitle.textContent = vehicle['nom'];
                cardImgContainer.classList.add('vehicle-list-img');
                cardImage.src = '/images/vehicles/' + vehicle['image'];
                cardImage.alt = 'image ' + vehicle['nom'];
                cardImage.classList.add('card-img-top');
// Injecter la div avec la classe text-center et le span "Cliquez ici"
                spanContainer.classList.add('text-center');
                span.textContent = 'Cliquez ici';
                cardBody.classList.add('card-body');
                price.classList.add('card-subtitle', 'mb-2', 'text-muted');
                price.innerText = 'Prix: '+vehicle['price'];
                km.classList.add('card-subtitle', 'mb-2', 'text-muted');
                km.innerText = 'Kilomètres: '+vehicle['kilometers'];
                year.classList.add('card-subtitle', 'mb-2', 'text-muted');
// Je dois voir s'il y a un moyen d'extraire l'année de la date ci dessous car les méthodes getFullYear et getUTCFullYear ne fonctionnent pas
                year.innerText = 'Mise en circulation: '+vehicle['year']['date'].slice(0, 4);
//                console.log(typeof vehicle['year']['date']);

// J'injecte les nodes dans le DOM
                jsContainer.appendChild(card);
                card.appendChild(cardLink);
                cardLink.appendChild(cardTitle);
                cardLink.appendChild(cardImgContainer);
                cardImgContainer.appendChild(cardImage);
                cardLink.appendChild(spanContainer);
                spanContainer.appendChild(span);
                card.appendChild(cardBody);
                cardBody.appendChild(price);
                cardBody.appendChild(km);
                cardBody.appendChild(year);
            });
//            console.log(jsContainer);
        }
    })
    .catch((error) => {
        console.error(url + " : " + error);
        window.alert("Une erreur s'est produite.");
    });
}