<?php

namespace App\Controller\Admin;

use App\Entity\Scheldule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SchelduleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Scheldule::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield from parent::configureFields(($pageName));
        yield AssociationField::new('garage');
        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }

}
