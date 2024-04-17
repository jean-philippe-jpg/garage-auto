import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';




$(document).ready(function(){

  $('.filtre-marque, .filtre-modele, .filtre-motorisation, .filtre-service').hide();

    $('#atelier').click(function(event){
       event.preventDefault();
      //$('.filtre-marque').hide();
     $('.filtre-marque').show();
    });
   $('.marque').click(function(event){
       event.preventDefault();
      $('.filtre-modele').show();
    })
    $('.modele').click(function(event){
      event.preventDefault();
      $('.filtre-motorisation').show();
    })
    $('.motorisation').click(function(event){
      event.preventDefault();
      $('.filtre-service').show();
    })
})

$(document).ready(function(){

  $('.Vmarque, .Vmodele').hide();

  $('#annonces').click(function(event){
    event.preventDefault();
    $('.msg-bienvenue').hide();
    $('.Vmarque').show();
    
  })

  $('.vmarque').click(function(event){
    event.preventDefault();
    $('.Vmodele').show();
  })
  
})

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