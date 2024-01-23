// Déclaration des variables pour la récupération des valeurs à afficher
let kilometerMinSlider = document.querySelector('#min-km');
let kilometerMaxSlider = document.querySelector("#max-km");
let priceMinSlider = document.getElementById('min-price');
let priceMaxSlider = document.getElementById('max-price');
let yearMinSlider = document.getElementById('min-year');
let yearMaxSlider = document.getElementById('max-year');

// Déclaration des variables pour l'affichage des valeurs
let minKmOutput = document.querySelector('#km-min-value');
let maxKmOutput = document.querySelector('#km-max-value');
let priceOutputMin = document.getElementById('min-price-value');
let priceOutputMax = document.getElementById('max-price-value');
let yearOutputMin = document.getElementById('year-min-value');
let yearOutputMax = document.getElementById('year-max-value');

// Initialisation des valeurs affichées au chargement de la page
minKmOutput.textContent = kilometerMinSlider.value;
maxKmOutput.textContent = kilometerMaxSlider.value;
priceOutputMin.textContent = priceMinSlider.value;
priceOutputMax.innerHTML = priceMaxSlider.value;
yearOutputMin.textContent = yearMinSlider.value;
yearOutputMax.textContent = yearMaxSlider.value;

// Ajout des écouteurs :
kilometerMinSlider.addEventListener('input', kilometerHandle);
kilometerMaxSlider.addEventListener('input', kilometerHandle);
priceMinSlider.addEventListener('input', priceHandle);
priceMaxSlider.addEventListener('input', priceHandle);
yearMinSlider.addEventListener('input',yearHandle);
yearMaxSlider.addEventListener('input',yearHandle);


// Création des functions à éxécuter lorsque l'événement se produit :
function kilometerHandle(event){
    if(event.target === kilometerMinSlider){
        minKmOutput.textContent = kilometerMinSlider.value;
    }
    else if(event.target === kilometerMaxSlider){
        maxKmOutput.textContent = kilometerMaxSlider.value;
    }
};

function priceHandle(event){
    if(event.target === priceMinSlider){
        priceOutputMin.textContent = priceMinSlider.value;
    }
    else if (event.target === priceMaxSlider){
        priceOutputMax.innerHTML = priceMaxSlider.value;
    }
};

function yearHandle(e){
    if(e.target === yearMinSlider){
        yearOutputMin.textContent = yearMinSlider.value;
    }
    else if(e.target === yearMaxSlider){
        yearOutputMax.textContent = yearMaxSlider.value;
    }
};
