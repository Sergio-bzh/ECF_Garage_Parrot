/*
window.addEventListener("load", function(event) {
    document.getElementById("filter").addEventListener("click", getVehicles);
});

function getVehicles (event) {
    event.preventDefault();
    axios.get(this.href).then(response => {
// Ici je commence le retravail sur ma page web
        const vehicleList = document.querySelector(".js-container");
        if(this.classList.contains("btn-primary")) {
            response.data.forEach(vehicle => {
// Je créé les balises HTML
                const card = document.createElement("div");
                const cardLink = document.createElement('a');
                const cardTitle = document.createElement('h5');
                const cardImgContainer = document.createElement('div');
                const cardImage = document.createElement('img');
                const cardBody = document.createElement('div');
                const price = document.createElement('h6');
                const km = document.createElement('h6');
                const year = document.createElement('h6');
// Je stylise les balises
                card.style.width = '22rem';
                card.classList.add('card', 'my-3', 'mx-1');
// Je pense qu'ici je devrais mettre l'url puisque elle est injectée dans le DOM et non pas dans le TWIG
                cardLink.href = "https://127.0.0.1:8000/vehicle/?id=numeroDeL-ID";
                cardTitle.classList.add('text-center', 'card-title');
// Idem qu'en ligne 25
                cardTitle.innerText = '{{ vehicle.vehicleName }}';
                cardImgContainer.classList.add('vehicle-list-img');
// idem qu'en ligne 25
                cardImage.src = "{{ vich_uploader_asset(vehicle) }}";
// idem qu'en ligne 25
                cardImage.alt = "image {{ vehicle.vehicleName }}";
                cardImage.classList.add('card-img-top');
                cardBody.classList.add('card-body');
                price.classList.add('card-subtitle', 'mb-2', 'text-muted');
// idem qu'en ligne 25
                price.innerText = 'Prix: {{ vehicle.price }}';
                km.classList.add('card-subtitle', 'mb-2', 'text-muted');
// idem qu'en ligne 25
                km.innerText = 'Kilomètres: {{ vehicle.kilometers }}';
                year.classList.add('card-subtitle', 'mb-2', 'text-muted');
// idem qu'en ligne 25 il faudra retravailler la date en javascript
                year.innerText = 'Mise en circulation: {{ vehicle.registrationDate|date(\'Y\') }}';

// J'injecte les nodes dans le DOM
                vehicleList.appendChild(card);
                card.appendChild(cardLink);
                card.appendChild(cardTitle);
                card.appendChild(cardImgContainer);
                cardImgContainer.appendChild(cardImage);
                card.appendChild(cardBody);
                cardBody.appendChild(price);
                cardBody.appendChild(km);
                cardBody.appendChild(year);

            });
            this.classList.replace("btn-primary", "btn-secondary");
            this.textContent = "Filtres appliqués";
    } else {
        vehicleList.innerHTML = "";
        this.classList.replace("btn-secondary", "btn-primary");
        this.textContent = "Filtrer";
    }
    }).catch(error => {
        console.error(error);
        window.alert("Une erreur s'est produite.");
    });
}
*/