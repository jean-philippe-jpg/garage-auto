<?php

namespace App\Controller\Admin;

use App\Entity\Modeles;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ModelesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Modeles::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        #yield from parent::configureFields($pageName);
        yield TextField::new( 'modele');
        yield IntegerField::new( 'annee');
        //yield IntegerField::new( 'id_motorisation');
    
        yield AssociationField::new('id_marque');
       // yield AssociationField::new('id_motorisation');
    }
    
}
