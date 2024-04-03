<?php

namespace App\Controller\Admin;

use App\Entity\VMarques;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VMarquesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VMarques::class;
    }

    
   public function configureFields(string $pageName): iterable
    {
      

        yield TextField::new('marques');
        yield AssociationField::new('modele');
    }
    
}
