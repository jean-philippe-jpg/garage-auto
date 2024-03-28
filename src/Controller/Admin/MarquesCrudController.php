<?php

namespace App\Controller\Admin;

use App\Entity\Marques;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use PHPUnit\Framework\Test;
use Symfony\Bundle\MakerBundle\Doctrine\RelationOneToOne;

class MarquesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Marques::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        //yield from parent::configureFields($pageName);
        yield TextField::new( 'marque');
       // yield IntegerField::new( 'id_modele');

        yield AssociationField::new('id_modele');
        
    }
    
}
