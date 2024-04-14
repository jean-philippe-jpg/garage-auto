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
  $('#annonces').click(function(){
   
    $('.Vmarque').show();
   // $('.Vmodele').hide();
  })

  $('.vmarque').click(function(event){
    event.preventDefault();
    $('.Vmodele').show();
  })

  
})

