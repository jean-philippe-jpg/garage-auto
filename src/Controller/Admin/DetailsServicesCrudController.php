<?php

namespace App\Controller\Admin;

use App\Entity\DetailsServices;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class DetailsServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetailsServices::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       // yield from parent::configureFields($pageName);
          
           // IdField::new('id');
           // TextField::new('service');
           yield TextField::new('titre');
           yield TextField::new('description');
            yield NumberField::new('tarifs');
           
        
             yield AssociationField::new('id_service');
    }
    
}
