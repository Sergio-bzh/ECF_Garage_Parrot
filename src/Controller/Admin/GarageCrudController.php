<?php

namespace App\Controller\Admin;

use App\Entity\Garage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
        yield TextField::new('garage_name');
        yield NumberField::new('street_number');
        yield TextField::new('street');
        yield NumberField::new('zip_code');
        yield TextField::new('city');
        yield TextField::new('country');
        yield TextField::new('phone_number');
        yield AssociationField::new('services');


        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }

}
