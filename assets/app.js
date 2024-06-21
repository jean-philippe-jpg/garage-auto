
import './bootstrap.js';
import Filtres from './filtres.js';
import F_annonces from './annonces.js';
const display = document.getElementById('atelier');

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';





//annonces.getElement('atelier').addEventListener('click', (event) => {
 
  

//});






 const filtres = new Filtres();
 filtres.filterHide('vmarque');
filtres.filterHide('vmodele');
filtres.filterHide('marque');
filtres.filterHide('modele');
filtres.filterHide('motorisation');
filtres.filterHide('service');
//filtre.filterHide('vmarque');
//filtre.filterHide('vmodele');
//filtres.filterHide('cards-annonces');
 

  filtres.getElement('atelier').addEventListener('click', (event) => {
    event.preventDefault();
  filtres.filterShow('marque');
  filtres.filterHide('cards-annonces');
  filtres.filterHide('filters-annonces');
  filtres.filterHide('bienvenue');
});

filtres.getElement('filter-marque').addEventListener('click', (event) => {

  event.preventDefault();
  filtres.filterShow('modele');
  filtres.filterHide('marque'); 
  
  
});

filtres.getElement('filter-model').addEventListener('click', (event) => {
  event.preventDefault();
  filtres.filterShow('motorisation');
  filtres.filterHide('modele');
  
});

filtres.getElement('filter-motor').addEventListener('click', (event) => {
  event.preventDefault();
  filtres.filterHide('motorisation');
  filtres.filterShow('service');
});

filtres.getElement('annonces').addEventListener('click', (event) => {
  
  event.preventDefault();
  filtres.filterShow('vmarque');
  //filtres.filterHide('vmodele');
  filtres.filterHide('f-presta');
  filtres.filterShow('cards-annonces');
  filtres.filterHide('bienvenue');
});


filtres.getElement('filter-vmarque').addEventListener('click', (event) => {
  
  event.preventDefault();
  filtres.filterShow('vmodele');
  filtres.filterHide('vmarque');
  });
  
  //filtres.getElement('filters-annonces').addEventListener('click', (event) => {
    //filtres.filterHide('f-presta');
  
  //});




clock();

function clock() {

const date = new Date();
   const hours = ((date.getHours() + 11) % 12 + 1);
   const minutes = date.getMinutes();
   const seconds = date.getSeconds();
   const hour = hours * 30;
   const minute = minutes * 6;
   const second = seconds * 6;

  document.querySelector('.heure').style.transform = `rotate(${hour}deg)`;
  document.querySelector('.minute').style.transform = `rotate(${minute}deg)`;
  document.querySelector('.seconde').style.transform = `rotate(${second}deg)`;

  setTimeout(clock, 1000);
}