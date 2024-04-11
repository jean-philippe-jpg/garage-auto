<?php

namespace App\Controller\Admin;

use App\Entity\VModeles;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VModelesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VModeles::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('modeles');
        yield AssociationField::new('marque');
    }

}
