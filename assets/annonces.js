


export default class F_annonces {
    
    
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