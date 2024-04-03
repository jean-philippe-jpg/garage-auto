<?php

namespace App\Controller\Admin;

use App\Entity\DetailsServices;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DetailsServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetailsServices::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield from parent::configureFields($pageName);
         # [
            //IdField::new('id'),
           // TextField::new('title'),
            //TextEditorField::new('description'),
           
        #];
       yield AssociationField::new('id_service');
    }
    
}
