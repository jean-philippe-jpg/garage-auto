//import { filter } from 'core-js/core/array';
import './bootstrap.js';
import Filtres from './filtres.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';



export const filtre = new Filtres('filtre');
filtre.filterHide('marque');
filtre.filterHide('modele');
filtre.filterHide('motorisation');
filtre.filterHide('service');
filtre.filterHide('vmarque');
filtre.filterHide('vmodele');
//filtre.filterHide('card-annonces');
 

  filtre.getElement('atelier').addEventListener('click', () => {
  filtre.filterShow('marque');
  filtre.filterHide('card-annonces');
});

filtre.getElement('filter-marque').addEventListener('click', (event) => {

  event.preventDefault();
  filtre.filterHide('marque');
  filtre.filterShow('motorisation');
  
  
});

filtre.getElement('filter-motor').addEventListener('click', (event) => {
  event.preventDefault();
  filtre.filterHide('motorisation');
  filtre.filterShow('service');
  
});

//filtre.getElement('filter-motorisation').addEventListener('click', () => {
  //filtre.filterHide('motorisation');
  //filtre.filterShow('filter-service');
//});
 
filtre.getElement('annonces').addEventListener('click', (event) => {
 event.preventDefault();
  filtre.filterShow('vmarque');
  filtre.filterShow('card-annonces');
});


filtre.getElement('filter-vmarque').addEventListener('click', (event) => { 
  event.preventDefault();
  filtre.filterHide('vmarque');
  filtre.filterShow('vmodele'); 

});

//filtre.getElement('filter-vmodel').addEventListener('click', (event) => {
  //event.preventDefault();
  //filtre.filterHide('vmodele');
  //filtre.filterShow('voitures-cible');
//});




//$(document).ready(function(){

  //$('.Vmarque, .Vmodele').hide();

 // $('#annonces').click(function(event){
    //event.preventDefault();
    //$('.msg-bienvenue').hide();
    //$('.Vmarque').show();
    
  //})

  //$('.vmarque').click(function(event){
    //event.preventDefault();
    //$('.Vmodele').show();
  //})
  
//})

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