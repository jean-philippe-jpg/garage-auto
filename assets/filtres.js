export default class Filtres {
    



   //getDive(id) {


   // return document.getElementById(id).parentNode;
  // }
    
   getElement(id){

    return document.getElementById(id);
   }

    filterHide(id) {
         this.getElement(id).classList.add('hide');
    }

    filterShow(id){

        this.getElement(id).classList.add('show');
    }
}