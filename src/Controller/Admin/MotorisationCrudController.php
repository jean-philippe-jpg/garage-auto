<?php

namespace App\Controller\Admin;

use App\Entity\Motorisation;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class MotorisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Motorisation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       // yield from parent::configureFields($pageName);
        yield TextField::new('motorisation');
        yield TextField::new('id_modele');

       //yield AssociationField::new('id_service');
        yield AssociationField::new('id_modele');
     }
    }