<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }


    public function configureFields(string $pageName): iterable
    {
//        yield from parent::configureFields(($pageName));
        yield IdField::new('id')->hideOnForm();
        yield EmailField::new('email', 'Courriel');
        yield TextField::new('first_name', 'Prénom');
        yield TextField::new('last_name', 'Nom');
        yield TextField::new('password', 'Mot de passe');
        yield BooleanField::new('is_admin', 'Admin');
        yield AssociationField::new('garage');
        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }

}
