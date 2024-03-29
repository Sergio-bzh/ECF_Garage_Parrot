<?php

namespace App\Controller\Admin;

use App\Entity\Garage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GarageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Garage::class;
    }


    public function configureFields(string $pageName): iterable
    {
//        yield from parent::configureFields(($pageName));
        yield NumberField::new('id')
            ->hideOnForm();
        yield TextField::new('garage_name', 'Garage');
        yield NumberField::new('street_number', 'Numéro');
        yield TextField::new('street', 'Nom de la rue');
        yield NumberField::new('zip_code', 'Code postal');
        yield TextField::new('city', 'Ville');
        yield TextField::new('country', 'Pays');
        yield TextField::new('phone_number', 'Téléphone');
        yield AssociationField::new('services');

        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }

    public function configureCrud(Crud $crud): Crud
    {
//        return parent::configureCrud($crud); // TODO: Change the autogenerated stub
        return $crud
            ->setEntityLabelInPlural('Garages')
            ->setEntityLabelInSingular('Garage')
            ->setPageTitle('new', 'Ajouter un garage')
            ->setPageTitle('edit', 'Modifier');
    }
}
