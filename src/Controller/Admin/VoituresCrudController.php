<?php

namespace App\Controller\Admin;

use App\Entity\Voitures;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VoituresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Voitures::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
                

            yield TextField::new('marque', 'marque');
            yield TextField::new('modele', 'modele');
            yield NumberField::new('annee', 'annee');
            yield NumberField::new('kilometrage', 'kms');
            yield TextField::new('description', 'description');
            yield NumberField::new('prix', 'prix');
            yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
            yield AssociationField::new('id_marque');
             yield AssociationField::new('id_modele');
    }
    
}
