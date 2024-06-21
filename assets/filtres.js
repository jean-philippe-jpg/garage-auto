export default class Filtres {
    
    
   getElement(id){

    return document.getElementById(id);
   }

    filterHide(id) {
         this.getElement(id).classList.add('masque');
    }

    filterShow(id){

        this.getElement(id).classList.add('show');
    }
}