<?php

namespace App\Controller\Admin;

use App\Entity\Marques;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class MarquesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Marques::class;
    }

    
    //public function configureFields(string $pageName): iterable
    //{
        //yield from parent::configureFields($pageName);
        //return [
            //IdField::new('id'),
            //TextField::new('title'),
            //TextEditorField::new('description'),
        //];
        //yield NumberField::new('annee');
       //yield AssociationField::new('id_modele');
   // }
    
}
