<?php

namespace App\Controller\Admin;

use App\Entity\Model;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ModelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Model::class;
    }


    public function configureFields(string $pageName): iterable
    {
//        yield from parent::configureFields($pageName);
//        yield AssociationField::new('brand');


        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('model_name', 'Nom de modèle'),
            DateField::new('release_date', 'Date de sortie'),
            TextField::new('energy_type', 'Énérgie'),
            TextField::new('motorization', 'Motorisation'),
            NumberField::new('horse_power', 'Nbre de chevaux'),
            AssociationField::new('brand', 'Marque'),
//            TextEditorField::new('description'),
        ];
    }
}
